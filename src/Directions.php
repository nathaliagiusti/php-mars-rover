<?php

namespace App;

class Directions
{
    const NORTH = 'N';
    const EAST  = 'E';
    const SOUTH = 'S';
    const WEST  = 'W';

    const LIST_RIGHT = [
        'N' => 'E',
        'E' => 'S',
        'S' => 'W',
        'W' => 'N',
    ];

    const LIST_LEFT = [
        'N' => 'W',
        'W' => 'S',
        'S' => 'E',
        'E' => 'N',
    ];
}