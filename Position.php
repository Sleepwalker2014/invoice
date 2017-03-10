<?php

/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 10.03.17
 * Time: 15:23
 */
class Position {
    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $longDescription;

    /**
     * @var float
     */
    private $price;

    /**
     * Position constructor.
     *
     * @param string $shortDescription
     * @param string $longDescription
     * @param float  $price
     */
    public function __construct ($shortDescription, $longDescription, $price) {
        $this->shortDescription = $shortDescription;
        $this->longDescription = $longDescription;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getShortDescription () {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription ($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getLongDescription () {
        return $this->longDescription;
    }

    /**
     * @param string $longDescription
     */
    public function setLongDescription ($longDescription) {
        $this->longDescription = $longDescription;
    }

    /**
     * @return float
     */
    public function getPrice () {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice ($price) {
        $this->price = $price;
    }
}