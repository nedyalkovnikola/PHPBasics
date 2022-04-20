<?php

namespace BattleShipsGame\Models\Ships;


class CaravelShip extends BaseShip
{
    const TYPE = "Caravel";
    const HEALTH = 100;
    const SHIELDS = 100;
    const DAMAGE = 50;
    const FUEL = 300.;

    const PROJECTILE_TYPE = "ArtilleryGun";

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
        return $this->getDamage();
    }

}