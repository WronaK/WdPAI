<?php

require_once 'ContactDetails.php';

class Advertisement
{
    private $propertyType;
    private $area;
    private $numberOfRooms;
    private $price;
    private $image;
    private $description;
    private $city;
    private $street;
    private $numberOfHouse;
    private $contactDetails;
    private $postcode;
    private $descriptionOfTargetGroup;

    public function __construct()
    {
    }

    public function getPropertyType()
    {
        return $this->propertyType;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function getNumberOfRooms()
    {
        return $this->numberOfRooms;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getNumberOfHouse()
    {
        return $this->numberOfHouse;
    }

    public function getContactDetails()
    {
        return $this->contactDetails;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getDescriptionOfTargetGroup()
    {
        return $this->descriptionOfTargetGroup;
    }

    public function setPropertyType($propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    public function setArea($area): void
    {
        $this->area = $area;
    }

    public function setNumberOfRooms($numberOfRooms): void
    {
        $this->numberOfRooms = $numberOfRooms;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }

    public function setNumberOfHouse($numberOfHouse): void
    {
        $this->numberOfHouse = $numberOfHouse;
    }

    public function setContactDetails($contactDetails): void
    {
        $this->contactDetails = $contactDetails;
    }

    public function setPostcode($postcode): void
    {
        $this->postcode = $postcode;
    }

    public function setDescriptionOfTargetGroup($descriptionOfTargetGroup): void
    {
        $this->descriptionOfTargetGroup = $descriptionOfTargetGroup;
    }

}