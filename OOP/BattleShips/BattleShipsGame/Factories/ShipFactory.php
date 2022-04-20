<?php

namespace BattleShipsGame\Factories;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Helpers\Messages;
use BattleShipsGame\Models\Ships\CaravelShip;
use BattleShipsGame\Models\Ships\GalleonShip;
use BattleShipsGame\Models\Ships\LongboatShip;
use BattleShipsGame\Models\Ships\ShipInterface;

class ShipFactory
{
    /**
     * ShipFactory constructor.
     */
    private function __construct()
    {
        
    }

    /**
     * @param string $type
     * @param string $name
     * @return ShipInterface
     * @throws GameException
     */
    public static function produce(string $type, string $name): ShipInterface
    {
        switch($type) {
            case "Galleon":
                return new GalleonShip($name);
            case "Caravel":
                return new CaravelShip($name);
            case "Longboat":
                return new LongboatShip($name);
            default:
                throw new GameException(Messages::INVALID_SHIP_TYPE);
        }
    }
}