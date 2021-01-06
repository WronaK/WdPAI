<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Advertisement.php';

class AdvertisementRepository extends Repository
{
    public function getAdvertisement(int $id): ?Advertisement
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM advertisments WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $advertisement = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($advertisement == false) {
            return null;
        }

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

        return $adver;
    }

    public function addAdvertisement(Advertisement $advertisement): void
    {
        $data = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO advertisments (property_type, area, number_of_rooms, 
        price, description, city, street, number_of_house, 
        postcode, description_of_target_group, created_at, image, id_assigned_by)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $assignedById = 3;
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
            $assignedById
            ]);
    }

    public function getAdvertisements(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM advertisments');
        $stmt->execute();

        $advertisements = $stmt->fetchALL(PDO::FETCH_ASSOC);

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
            $result[] = $adver;
        }

        return $result;
    }

    public function getAdvertisementsBySearchParameters(string $city, string $propertyType,
                                                        string $priceFrom, string $priceTo,
                                                        string $areaFrom, string $areaTo) {

        $searchCity = strtolower($city);
        $searchPropertyType = strtolower($propertyType);

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM advertisments WHERE LOWER(city) LIKE :city AND LOWER(property_type) LIKE :propertyType
        AND price > :priceFrom AND price < :priceTo AND area > :areaFrom AND area < :areaTo');

        $stmt->bindParam(':city', $searchCity, PDO::PARAM_STR);
        $stmt->bindParam(':propertyType', $searchPropertyType, PDO::PARAM_STR);
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
}