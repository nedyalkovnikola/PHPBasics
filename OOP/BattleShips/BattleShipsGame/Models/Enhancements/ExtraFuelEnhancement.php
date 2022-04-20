<?php

namespace BattleShipsGame\Models\Enhancements;


use BattleShipsGame\Models\Ships\ShipInterface;

class ExtraFuelEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 200;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setFuel($ship->getFuel() + self::BONUS_VALUE);
    }
}