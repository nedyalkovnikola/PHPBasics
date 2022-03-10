<?php

namespace BattleShipsGame\Factories;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Helpers\Messages;
use BattleShipsGame\Models\Projectiles\ArtilleryGun;
use BattleShipsGame\Models\Projectiles\FireArrow;
use BattleShipsGame\Models\Projectiles\HeavyMissle;
use BattleShipsGame\Models\Projectiles\ProjectileInterface;


class ProjectileFactory
{
    /**
     * ProjectileFactory constructor.
     */
    private function __construct()
    {
        
    }

    /**
     * @param string $type
     * @param int $damage
     * @return ProjectileInterface
     * @throws GameException
     */
    public static function produce(string $type, int $damage): ProjectileInterface
    {
        switch ($type) {
            case "ArtilleryGun":
                return new ArtilleryGun($damage);
            case "HeavyMissle":
                return new HeavyMissle($damage);
            case "FireArrow":
                return new FireArrow($damage);
            default:
                throw new GameException(Messages::INVALID_PROJECTILE_TYPE);
        }
    }
}