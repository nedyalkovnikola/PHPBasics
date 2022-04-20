<?php

namespace BattleShipsGame\Models\Enhancements;


use BattleShipsGame\Models\Ships\ShipInterface;

class CannonballEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 50;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setDamage($ship->getDamage() + self::BONUS_VALUE);
    }
}