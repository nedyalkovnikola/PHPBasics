<?php

namespace BattleShipsGame\Factories;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Helpers\Messages;
use BattleShipsGame\Models\SeaArea;
use BattleShipsGame\Models\SeaAreaInterface;

class SeaAreaFactory
{
    /**
     * SeaAreaFactory consturctor.
     */
    private function __construct()
    {
    }

    /**
     * @param string $name
     * @return SeaAreaInterface
     * @throws GameException
     */
    public static function produce(string $name): SeaAreaInterface
    {
        switch($name) {
            case "Nordic-Sea":
                return new SeaArea("Nordic-Sea", ["Glacial-Sea" => 50, "Black-Sea" => 120]);
            case "Glacial-Sea":
                return new SeaArea("Glacial-Sea", ["Nordic-Sea" => 50, "Caribbean-Sea" => 360]);
            case "Caribbean-Sea":
                return new SeaArea("Caribbean-Sea", ["Glacial-Sea" => 360, "Black-Sea" => 145]);
            case "Black-Sea":
                return new SeaArea("Black-Sea", ["Caribbean-Sea" => 145, "Nordic-Sea" => 120]);
            default:
                throw new GameException(Messages::INVALID_SEA_AREA_NAME);             
        }
    }
}