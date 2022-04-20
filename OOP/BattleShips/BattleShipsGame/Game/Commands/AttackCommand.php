<?php

namespace BattleShipsGame\Game\Commands;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Factories\ProjectileFactory;
use BattleShipsGame\Game\GameEngineInterface;
use BattleShipsGame\Helpers\Messages;

class AttackCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $attacker = $engine->getOcean()->getShipByName($params[0]);
        $target = $engine->getOcean()->getShipByName($params[1]);

        if ($attacker->isDestroyed() || $target->isDestroyed()) {
            throw new GameException(Messages::SHIP_IS_DESTROYED);
        }

        if ($attacker->getSeaArea()->getName() !== $target->getSeaArea()->getName()) {
            throw new GameException(Messages::SHIP_NOT_IN_SAME_SEA);
        }

        $projectile = ProjectileFactory::produce($attacker->getProjectileType(), $attacker->getProjectileDamage());
        $attacker->increaseProjectilesFired();
        $target->takeDamage($projectile);

        $output = ["{$attacker->getName()} attacked {$target->getName()}"];

        if ($target->isDestroyed()) {
            $output[] = "{$target->getName()} has been destroyed";
        }

        return $output;
    }
}