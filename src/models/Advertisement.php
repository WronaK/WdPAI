<?php

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
    private $postcode;
    private $descriptionOfTargetGroup;
    private $like;
    private $id;
    private $idCreator;

    public function __construct()
    {
    }

    public function getIdCreator()
    {
        return $this->idCreator;
    }

    public function setIdCreator($idCreator): Advertisement
    {
        $this->idCreator = $idCreator;
        return $this;
    }

    public function getLike()
    {
        return $this->like;
    }

    public function setLike($like): Advertisement
    {
        $this->like = $like;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): Advertisement
    {
        $this->id = $id;
        return $this;
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

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getDescriptionOfTargetGroup()
    {
        return $this->descriptionOfTargetGroup;
    }

    public function setPropertyType($propertyType): Advertisement
    {
        $this->propertyType = $propertyType;
        return $this;
    }

    public function setArea($area): Advertisement
    {
        $this->area = $area;
        return $this;
    }

    public function setNumberOfRooms($numberOfRooms): Advertisement
    {
        $this->numberOfRooms = $numberOfRooms;
        return $this;
    }

    public function setPrice($price): Advertisement
    {
        $this->price = $price;
        return $this;
    }

    public function setImage($image): Advertisement
    {
        $this->image = $image;
        return $this;
    }

    public function setDescription($description): Advertisement
    {
        $this->description = $description;
        return $this;
    }

    public function setCity($city): Advertisement
    {
        $this->city = $city;
        return $this;
    }

    public function setStreet($street): Advertisement
    {
        $this->street = $street;
        return $this;
    }

    public function setNumberOfHouse($numberOfHouse): Advertisement
    {
        $this->numberOfHouse = $numberOfHouse;
        return $this;
    }

    public function setPostcode($postcode): Advertisement
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function setDescriptionOfTargetGroup($descriptionOfTargetGroup): Advertisement
    {
        $this->descriptionOfTargetGroup = $descriptionOfTargetGroup;
        return $this;
    }

}