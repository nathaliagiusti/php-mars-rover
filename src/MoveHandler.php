<?php

namespace App;

class MoveHandler
{
    const MOVE_INPUT      = 'M';
    const AVAILABLE_MOVES = [
        self::MOVE_INPUT => 'planMove',
        'L'              => 'left',
        'R'              => 'right',
    ];

    /** @var Plateau */
    private $plateau;

    /** @var Rover[] */
    private $rovers;

    /**
     * @param Plateau $plateau
     * @param Rover[] $rovers
     */
    public function __construct(Plateau $plateau, array $rovers)
    {
        $this->plateau = $plateau;
        $this->rovers  = $rovers;
    }

    /**
     * @param string $roverName
     * @param string $moveType
     *
     * @return Coordinates
     */
    public function move(string $roverName, string $moveType) : Coordinates
    {
        if (!$this->roverExist($roverName)) {
            // @todo : implement me.
//            throw new RoverNotFoundException();
        }

        if ($this->isSupportedMove($moveType)) {

            if ($moveType == self::MOVE_INPUT) {
                $plannedMove = $this->rovers[$roverName]->planMove();

                if ($this->isAvailableCoordinate($plannedMove)) {
                    $this->rovers[$roverName]->updateCoordinates($plannedMove);
                }

            } else {
                $this->rovers[$roverName]->{self::AVAILABLE_MOVES[$moveType]}();
            }
        }

        // @todo : throw exception for cases when I cannot move the rover.

        return $this->rovers[$roverName]->getCoordinates();
    }

    /**
     * @param string $moveType
     *
     * @return bool
     */
    private function isSupportedMove(string $moveType)
    {
        return array_key_exists($moveType, self::AVAILABLE_MOVES);
    }

    /**
     * @param Coordinates $plannedMove
     *
     * @return bool
     */
    private function isAvailableCoordinate(Coordinates $plannedMove) : bool
    {
        if (!$this->insidePlateauLimits($plannedMove)) {
            return false;
        }

        foreach ($this->rovers as $rover) {
            $roverCoordinates = $rover->getCoordinates();

            if (
                $roverCoordinates->getY() == $plannedMove->getY()
                && $roverCoordinates->getX() == $plannedMove->getX()
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param Coordinates $plannedMove
     *
     * @return bool
     */
    private function insidePlateauLimits(Coordinates $plannedMove) : bool
    {
        return $plannedMove->getY() <= $this->plateau->getMaxSizeY()
            && $plannedMove->getX() <= $this->plateau->getMaxSizeX();
    }

    /**
     * @param string $roverName
     *
     * @return bool
     */
    private function roverExist(string $roverName) : bool
    {
        return array_key_exists($roverName, $this->rovers);
    }

}