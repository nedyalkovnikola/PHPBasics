<?php

namespace BattleShipsGame\Models\Enhancements;


use BattleShipsGame\Models\Ships\ShipInterface;

class MetalBarrierEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 100;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setShields($ship->getShields() + self::BONUS_VALUE);
    }
}