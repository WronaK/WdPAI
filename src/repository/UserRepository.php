<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users u LEFT JOIN 
        users_details ud ON u.id_users_details = ud.id_user_details 
        WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STMT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
            return null;
        }

        $user = new User(
            $data['email'],
            $data['password'],
            $data['name'],
            $data['surname'],
            $data['phone'],
            $data['salt'],
        );

        $user->setRole($data['id_role']);
        return $user;
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO users_details (name, surname, phone)
        VALUES (?, ?, ?)');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
        ]);

        $data = new DateTime();

        $stmt = $this->database->connect()->prepare('
        INSERT INTO users (email, password, id_users_details, salt, created_at)
        VALUES (?, ?, ?, ?, ?)');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user),
            $user->getSalt(),
            $data->format('Y-m-d'),
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');
        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user_details'];
    }

    public function setCookie(string $email, string $cookie) {
        $stmt = $this->database->connect()->prepare('
            UPDATE users SET cookie = :cookie WHERE email = :email
         ');

        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUserIdByCookie(string $cookie) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE cookie = :cookie
        ');

        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user'];
    }

    public function getOldPassword(string $cookie) {
        $stmt = $this->database->connect()->prepare('
            SELECT password, salt FROM public.users WHERE cookie = :cookie
        ');

        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return [$data['password'], $data['salt'] ];
    }

    public function updatePassword(string $cookie, string $password, string $salt) {
        $stmt = $this->database->connect()->prepare('UPDATE users SET password = :password,
        salt = :salt WHERE cookie = :cookie');
        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':salt', $salt, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function disableAccount(string $cookie)
    {
        $stmt = $this->database->connect()->prepare('UPDATE users SET enabled = FALSE
        WHERE cookie = :cookie');
        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->execute();
    }
}