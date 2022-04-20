<?php

namespace BattleShipsGame\Models\Projectiles;


use BattleShipsGame\Models\Ships\ShipInterface;

interface ProjectileInterface
{
    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip);
}