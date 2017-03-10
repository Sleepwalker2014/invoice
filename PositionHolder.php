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
        $positionOutput = [];

        foreach ($this->positions as $position) {
            $positionOutput[$positionCount] = ['shortDescription' => $position->getShortDescription(),
                                               'longDescription' => $position->getLongDescription(),
                                               'price' => str_replace('.', ',', $position->getPrice())];

            $positionCount++;
        }

        return $positionOutput;
    }
}