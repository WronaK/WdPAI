<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Advertisement.php';

class AdvertisementRepository extends Repository
{
    public function getAdvertisementById(int $id)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM ad_details WHERE id_ad = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdvertisement(int $id): ?Advertisement
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM advertisments WHERE id_ad = :id 
        and enabled = true');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($advertisement == false) {
            return null;
        }

        return $this->convert($advertisement);
    }

    public function addAdvertisement(Advertisement $advertisement): void
    {
        $data = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO advertisments (property_type, area, number_of_rooms, 
        price, description, city, street, number_of_house, 
        postcode, description_of_target_group, created_at, image, id_assigned_by)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $stmt->execute([
            $advertisement->getPropertyType(),
            $advertisement->getArea(),
            $advertisement->getNumberOfRooms(),
            $advertisement->getPrice(),
            $advertisement->getDescription(),
            $advertisement->getCity(),
            $advertisement->getStreet(),
            $advertisement->getNumberOfHouse(),
            $advertisement->getPostcode(),
            $advertisement->getDescriptionOfTargetGroup(),
            $data->format('Y-m-d'),
            $advertisement->getImage(),
            $advertisement->getIdCreator(),
            ]);
    }

    public function getAdvertisements(): array
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM advertisments WHERE enabled=true');
        $stmt->execute();

        $advertisements = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $this->convertToEntity($advertisements);
    }

    public function getAdvertisementsBySearchParam(string $city, string $propertyType,
                                                        string $priceFrom, string $priceTo,
                                                        string $areaFrom, string $areaTo)
    {
        $data = $this->getAdvertisementsBySearchParameters($city, $propertyType, $priceFrom, $priceTo, $areaFrom, $areaTo);
        $adver = $this->convertToEntity($data);
        return $adver;
    }

        public function getAdvertisementsBySearchParameters(string $city, string $propertyType,
                                                        string $priceFrom, string $priceTo,
                                                        string $areaFrom, string $areaTo) {

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisments WHERE LOWER(city) LIKE :city AND property_type LIKE :propertyType
        AND price > :priceFrom AND price < :priceTo AND area > :areaFrom AND area < :areaTo and enabled = true');

        $searchCity = strtolower($city);

        $stmt->bindParam(':city', $searchCity, PDO::PARAM_STR);
        $stmt->bindParam(':propertyType', $propertyType, PDO::PARAM_STR);
        $priceFrom1 = (float)$priceFrom;
        $stmt->bindParam(':priceFrom', $priceFrom1, PDO::PARAM_STR);
        $priceTo1 = (float)$priceTo;
        $stmt->bindParam(':priceTo', $priceTo1, PDO::PARAM_STR);
        $areaFrom1 = (float)$areaFrom;
        $stmt->bindParam(':areaFrom', $areaFrom1, PDO::PARAM_STR);
        $areaTo1 = (float)$areaTo;
        $stmt->bindParam(':areaTo', $areaTo1, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //rename function
    private function isConnection(int $id, int $idUser) {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users_advertisments
        WHERE id_users = :idUser and id_advertisments = :id' );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function like(int $id, int $idUser) {
        $adver = $this->isConnection($id, $idUser);
        if($adver == null && $adver['liked'] == false) {
            $stmt = $this->database->connect()->prepare('
            UPDATE advertisments SET "like" = "like" + 1 WHERE id_ad = :id
         ');

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        if($adver == null) {
            $stmt = $this->database->connect()->prepare('
        INSERT INTO users_advertisments (id_users, id_advertisments, liked, saved)
        VALUES (?, ?, ?, ?)');

            $stmt->execute([
                $idUser,
                $id,
                1,
                0
            ]);
        } else if($adver['liked']== false) {
            $stmt = $this->database->connect()->prepare('UPDATE users_advertisments SET liked = TRUE
        WHERE id_users = :idUser and id_advertisments = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function save(int $id, int $idUser) {
        $advertisement = $this->isConnection($id, $idUser);

        if ($advertisement == null) {
            $stmt = $this->database->connect()->prepare('
        INSERT INTO users_advertisments (id_users, id_advertisments, liked, saved)
        VALUES (?, ?, ?, ?)');

            $stmt->execute([
                $idUser,
                $id,
                0,
                1
            ]);
        } else if($advertisement['saved'] == false) {
            $stmt = $this->database->connect()->prepare('UPDATE users_advertisments SET saved = TRUE
        WHERE id_users = :idUser and id_advertisments = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getYourAdvertisements(int $idUser) {
        $stmt = $this->database->connect()->prepare('SELECT * FROM advertisments
        WHERE id_assigned_by = :idUser');

        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $advertisements = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $this->convertToEntity($advertisements);
    }

    public function getSaveAdvertisements(int $idUser) {
        $stmt = $this->database->connect()->prepare('SELECT * FROM ad_save
        WHERE id_users = :idUser');

        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $advertisements = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $this->convertToEntity($advertisements);
    }

    private function convertToEntity(array $advertisements) {
        $result = [];

        foreach ($advertisements as $advertisement) {
            $adver = new Advertisement();
            $adver->setPropertyType($advertisement['property_type']);
            $adver->setArea($advertisement['area']);
            $adver->setNumberOfRooms($advertisement['number_of_rooms']);
            $adver->setPrice($advertisement['price']);
            $adver->setImage($advertisement['image']);
            $adver->setDescription($advertisement['description']);
            $adver->setCity($advertisement['city']);
            $adver->setStreet($advertisement['street']);
            $adver->setNumberOfHouse($advertisement['number_of_house']);
            $adver->setPostcode($advertisement['postcode']);
            $adver->setDescriptionOfTargetGroup($advertisement['description_of_target_group']);
            $adver->setLike($advertisement['like']);
            $adver->setId($advertisement['id_ad']);
            $result[] = $adver;
        }
        return $result;
    }

    public function deleteAdver(int $idAd) {
        $stmt = $this->database->connect()->prepare('DELETE FROM 
        advertisments WHERE id_ad = :id');

        $stmt->bindParam(':id', $idAd, PDO::PARAM_INT);
        $stmt->execute();
    }

    private function convert($advertisement) {
        $adver = new Advertisement();

        $adver->setPropertyType($advertisement['property_type']);
        $adver->setArea($advertisement['area']);
        $adver->setNumberOfRooms($advertisement['number_of_rooms']);
        $adver->setPrice($advertisement['price']);
        $adver->setImage($advertisement['image']);
        $adver->setDescription($advertisement['description']);
        $adver->setCity($advertisement['city']);
        $adver->setStreet($advertisement['street']);
        $adver->setNumberOfHouse($advertisement['number_of_house']);
        $adver->setPostcode($advertisement['postcode']);
        $adver->setDescriptionOfTargetGroup($advertisement['description_of_target_group']);
        $adver->setId($advertisement['id_ad']);
        $adver->setLike($advertisement['like']);

        return $adver;
    }

    public function disabledAd(int $id)
    {
        $stmt = $this->database->connect()->prepare('UPDATE advertisments SET enabled = FALSE
        WHERE id_assigned_by = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}