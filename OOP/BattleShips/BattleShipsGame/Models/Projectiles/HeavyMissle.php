<?php

namespace BattleShipsGame\Models\Projectiles;


use BattleShipsGame\Models\Ships\ShipInterface;

class HeavyMissle extends BaseProjectile
{
    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip)
    {
        $newHealth = $targetShip->getHealth() - $this->getDamage();
        $targetShip->setHealth($newHealth);

        $newShields = $targetShip->getShields() - (2 * $this->getDamage());
        $targetShip->setShields($newShields);
    }
}