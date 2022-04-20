<?php

namespace BattleShipsGame\Factories;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Helpers\Messages;
use BattleShipsGame\Models\Enhancements\EnhancementInterface;
use BattleShipsGame\Models\Enhancements\CannonballEnhancement;
use BattleShipsGame\Models\Enhancements\ExtraFuelEnhancement;
use BattleShipsGame\Models\Enhancements\MetalBarrierEnhancement;

class EnhancementFactory
{
    /**
     * EnhancementFactory constructor.
     */
    private function __construct()
    {
        
    }

    /**
     * @param $type
     * @return EnhancementInterface
     * @throws GameException
     */
    public static function produce($type): EnhancementInterface
    {
        switch($type) {
            case "Cannonball":
                return new CannonballEnhancement();
            case "MetalBarrier":
                return new MetalBarrierEnhancement();
            case "ExtraFuel":
                return new ExtraFuelEnhancement();
            default:
                throw new GameException(Messages::INVALID_ENHANCEMENT_TYPE);
        }   
    }
}