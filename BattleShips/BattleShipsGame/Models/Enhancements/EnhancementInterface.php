<?php

namespace BattleShipsGame\Models\Enhancements;


use BattleShipsGame\Models\Ships\ShipInterface;

interface EnhancementInterface
{
    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship);
}