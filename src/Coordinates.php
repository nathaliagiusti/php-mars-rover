<?php

namespace App;

class Coordinates
{
    /** @var string */
    private $cardinalDirection = Directions::NORTH;

    /** @var int */
    private $y = 0;

    /** @var int */
    private $x = 0;

    /**
     * @return string
     */
    public function getCardinalDirection(): string
    {
        return $this->cardinalDirection;
    }

    /**
     * @param string $cardinalDirection
     *
     * @return $this
     */
    public function setCardinalDirection(string $cardinalDirection)
    {
        $this->cardinalDirection = $cardinalDirection;

        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     *
     * @return $this
     */
    public function setY(int $y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     *
     * @return $this
     */
    public function setX(int $x)
    {
        $this->x = $x;

        return $this;
    }
}