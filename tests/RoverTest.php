<?php

namespace App\Tests;

use App\Coordinates;
use App\Directions;
use App\Plateau;
use App\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * @dataProvider roverPositionProvider
     *
     * @param int         $roverPosX
     * @param int         $roverPosY
     * @param string      $cardinalDirection
     * @param Coordinates $expectedPosition
     */
    public function testMoveShouldReturnExpectedPosition(
        int $roverPosX,
        int $roverPosY,
        string $cardinalDirection,
        Coordinates $expectedPosition
    )
    {
        $rover = $this->getRover($roverPosX, $roverPosY, $cardinalDirection);

        $position = $rover->planMove();

        $this->assertEquals($expectedPosition, $position);
    }

    public function testLeft()
    {
        $rover = $this->getRover(0,0, Directions::NORTH);

        $rover->left();

        $coordinates = $rover->getCoordinates();

        $this->assertEquals(Directions::WEST, $coordinates->getCardinalDirection());
    }

    public function testRight()
    {
        $rover = $this->getRover(0,0, Directions::NORTH);

        $rover->right();

        $coordinates = $rover->getCoordinates();

        $this->assertEquals(Directions::EAST, $coordinates->getCardinalDirection());
    }

    /**
     * @return array
     */
    public function roverPositionProvider() : array
    {
        return [
            'default position' => [
                'roverPosX'         => 0,
                'roverPosY'         => 0,
                'cardinalDirection' => Directions::NORTH,
                'expectedPosition'  => (new Coordinates())->setX(0)->setY(1)->setCardinalDirection(Directions::NORTH),
            ],
            'moving south' => [
                'roverPosX'         => 4,
                'roverPosY'         => 3,
                'cardinalDirection' => Directions::SOUTH,
                'expectedPosition'  => (new Coordinates())->setX(4)->setY(2)->setCardinalDirection(Directions::SOUTH)
            ],
            'moving east' => [
                'roverPosX'         => 3,
                'roverPosY'         => 2,
                'cardinalDirection' => Directions::EAST,
                'expectedPosition'  => (new Coordinates())->setX(4)->setY(2)->setCardinalDirection(Directions::EAST),
            ],
        ];
    }

    /**
     * Default coordinates are : 0, 0, N
     *
     * @param int    $roverPosX
     * @param int    $roverPosY
     * @param string $cardinalDirection
     *
     * @return Rover
     */
    private function getRover(
        int $roverPosX,
        int $roverPosY,
        string $cardinalDirection
    ) : Rover
    {
        $coordinates = new Coordinates();

        $coordinates->setY($roverPosY);
        $coordinates->setX($roverPosX);
        $coordinates->setCardinalDirection($cardinalDirection);

        return new Rover($coordinates);
    }
}