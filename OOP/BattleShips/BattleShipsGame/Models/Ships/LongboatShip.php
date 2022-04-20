<?php

namespace BattleShipsGame\Models\Ships;


use BattleShipsGame\Models\Projectiles\ProjectileInterface;

class LongboatShip extends BaseShip
{
    const TYPE = "Longboat";
    const HEALTH = 200;
    const SHIELDS = 300;
    const DAMAGE = 150;
    const FUEL = 700.;

    const PROJECTILE_TYPE = "FireArrow";

    public function __construct(string $name)
    {   
        parent::__construct(
            self::TYPE,
            $name,
            self::HEALTH,
            self::SHIELDS,
            self::DAMAGE,
            self::FUEL,
            self::PROJECTILE_TYPE
        );
    }

    public function getProjectileDamage(): int
    {
        return $this->getDamage() + floor($this->getShields()/2);
    }

    public function takeDamage(ProjectileInterface $projectile)
    {
        $this->setShields($this->getShields() + 50);
        $projectile->doDamage($this);
        $this->setShields(max($this->getShields() - 50, 0));
    }

}