<?php

namespace App;

class Rover
{
    /** @var Coordinates */
    private $coordinates;

    /**
     * @param Coordinates $coordinates
     */
    public function __construct(Coordinates $coordinates)
    {
        $this->updateCoordinates($coordinates);
    }

    /**
     * @return Coordinates
     */
    public function planMove() : Coordinates
    {
        $currentY = $this->coordinates->getY();
        $currentX = $this->coordinates->getX();

        if ($this->coordinates->getCardinalDirection() == Directions::NORTH) {
            $currentY++;
        }

        if ($this->coordinates->getCardinalDirection() == Directions::SOUTH) {
            $currentY--;
        }

        if ($this->coordinates->getCardinalDirection() == Directions::EAST) {
            $currentX++;
        }

        if ($this->coordinates->getCardinalDirection() == Directions::WEST) {
            $currentX--;
        }

        return (new Coordinates())
                ->setX($currentX)
                ->setY($currentY)
                ->setCardinalDirection($this->coordinates->getCardinalDirection());
    }

    public function left()
    {
        $this->coordinates->setCardinalDirection(Directions::LIST_LEFT[$this->coordinates->getCardinalDirection()]);
    }

    public function right()
    {
        $this->coordinates->setCardinalDirection(Directions::LIST_RIGHT[$this->coordinates->getCardinalDirection()]);
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates() : Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     *
     * @return Rover
     */
    public function updateCoordinates(Coordinates $coordinates) : Rover
    {
        $this->coordinates = $coordinates;

        return $this;
    }
}