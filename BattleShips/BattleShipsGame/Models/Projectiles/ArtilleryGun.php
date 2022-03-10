<?php

namespace BattleShipsGame\Models\Projectiles;


use BattleShipsGame\Models\Ships\ShipInterface;

class ArtilleryGun extends BaseProjectile
{
    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip)
    {
        $newHealth = $targetShip->getHealth() - $this->getDamage();
        $newHealth = max(0, $newHealth);
        $targetShip->setHealth($newHealth);
    }
}