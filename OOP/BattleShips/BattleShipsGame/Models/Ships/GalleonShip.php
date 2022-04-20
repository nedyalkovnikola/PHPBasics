<?php

namespace BattleShipsGame\Models\Ships;


class GalleonShip extends BaseShip
{
    const TYPE = "Galleon";
    const HEALTH = 60;
    const SHIELDS = 50;
    const DAMAGE = 30;
    const FUEL = 220.;

    const PROJECTILE_TYPE = "HeavyMissle";

    public function __construct(string $name)
    {
        parent::__construct(
            self::TYPE,
            $name,
            self::HEALTH,
            self::SHIELDS,
            self::DAMAGE,
            self::FUEL,
            self::PROJECTILE_TYPE);
    }

    public function getProjectileDamage(): int
    {
        return $this->getDamage();
    }

    public function getReport(): array
    {
        $output = parent::getReport();
        $output[] = "-Projectiles fired: {$this->projectilesFired}";

        return $output;
    }
}