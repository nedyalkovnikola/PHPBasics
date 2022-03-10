<?php

namespace BattleShipsGame\Models\Projectiles;


use BattleShipsGame\Models\Ships\ShipInterface;

class FireArrow extends BaseProjectile
{
    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip)
    {
        $attack = $this->getDamage() - $targetShip->getShields();

        $newShields = $targetShip->getShields() - $this->getDamage();
        $newShields = max(0, $newShields);
        $targetShip->setShields($newShields);

        $leftoverDamage = max(0, $attack);
        $newHealth = $targetShip->getHealth() - $leftoverDamage;
        $newHealth = max(0, $newHealth);
        
        $targetShip->setHealth($newHealth);
    }
}