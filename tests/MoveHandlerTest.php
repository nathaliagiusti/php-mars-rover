<?php

namespace App\Tests;

use App\Coordinates;
use App\Directions;
use App\MoveHandler;
use App\Plateau;
use App\Rover;
use PHPUnit\Framework\TestCase;

class MoveHandlerTest extends TestCase
{
    public function testMove()
    {
        $plateau = new Plateau(5, 5);

        // @todo: extract coordinates to variable.
        $rovers = [
            'rover1' => new Rover((new Coordinates())->setX(1)->setY(2)->setCardinalDirection(Directions::NORTH)),
            'rover2' => new Rover((new Coordinates())->setX(3)->setY(3)->setCardinalDirection(Directions::EAST)),
        ];

        $moveHandler = new MoveHandler($plateau, $rovers);

        $moves = str_split('LMLMLMLMM');

        foreach ($moves as $moveType) {
            $coordinates = $moveHandler->move('rover1', $moveType);
        }

        $this->assertEquals(1, $coordinates->getX());
        $this->assertEquals(3, $coordinates->getY());
        $this->assertEquals(Directions::NORTH, $coordinates->getCardinalDirection());

        // second rover test

        $moves = str_split('MMRMMRMRRM');

        foreach ($moves as $moveType) {
            $coordinates = $moveHandler->move('rover2', $moveType);
        }

        $this->assertEquals(5, $coordinates->getX());
        $this->assertEquals(1, $coordinates->getY());
        $this->assertEquals(Directions::EAST, $coordinates->getCardinalDirection());
    }

    //@todo : implement me.
    public function testIfMoveIsAllowedWhenCoordinateIsTaken()
    {

    }
}
