<?php

/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 10.03.17
 * Time: 15:21
 */
class PositionHolder {
    /**
     * @var Position[] $positions
     */
    private $positions = [];

    /**
     * PositionHolder constructor.
     */
    public function __construct () {
    }

    public function addPosition (Position $position) {
        $this->positions[] = $position;
    }

    /**
     * @return Position[]
     */
    public function getPositions () {
        return $this->positions;
    }

    /**
     * @return Position[]
     */
    public function getPositionOutput () {
        $positionCount = 1;
        $totalPrice = 0;
        $positionOutput = [];

        $evenPositionColor = '#f0f0f0';
        $unevenPositionColor = '#e8e8e8';

        foreach ($this->positions as $position) {
            $backgroundColor = $unevenPositionColor;
            if ($positionCount % 2 == 0) {
                $backgroundColor = $evenPositionColor;
            }

            $positionOutput['positions'][$positionCount] = ['shortDescription' => $position->getShortDescription(),
                                                            'longDescription' => $position->getLongDescription(),
                                                            'price' => str_replace('.', ',', $position->getPrice()),
                                                            'backgroundColor' => $backgroundColor];

            $totalPrice += $position->getPrice();

            $positionCount++;
        }

        $positionOutput['totalPrice'] = str_replace('.', ',', $totalPrice);

        return $positionOutput;
    }
}