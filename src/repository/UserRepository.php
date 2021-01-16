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

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone'],
            $user['salt'],
        );
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

    public function getUserByCookie(string $cookie) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE cookie = :cookie
        ');

        $stmt->bindParam(':cookie', $cookie, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user'];
    }
}