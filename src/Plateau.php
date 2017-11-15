<?php

namespace App;

class Plateau
{
    /** @var int */
    private $sizeX;

    /** @var int */
    private $sizeY;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->sizeX = $x;
        $this->sizeY = $y;
    }

    /**
     * @return int
     */
    public function getMaxSizeX() : int
    {
        return $this->sizeX;
    }

    /**
     * @return int
     */
    public function getMaxSizeY() : int
    {
        return $this->sizeY;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return bool
     */
    public function isValidPosition(int $x, int $y) : bool
    {
        return
            $x >= 0
            && $x <= $this->sizeX
            && $y >= 0
            && $y <= $this->sizeY;
    }
}