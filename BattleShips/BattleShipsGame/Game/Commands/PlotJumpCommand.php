<?php

namespace BattleShipsGame\Game\Commands;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Game\GameEngineInterface;
use BattleShipsGame\Helpers\Messages;

class PlotJumpCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $ship = $engine->getOcean()->getShipByName($params[0]);
        $currentSea = $ship->getSeaArea();
        $destinationSea = $engine->getOcean()->getSeaAreaByName($params[1]);

        if ($ship->isDestroyed()) {
            throw new GameException(Messages::SHIP_IS_DESTROYED);
        }

        if ($currentSea->getName() === $destinationSea->getName()) {
            throw new GameException(Messages::SHIP_ALREADY_IN_SAME_SEA . $destinationSea->getName());
        }

        if (!array_key_exists($destinationSea->getName(), $currentSea->getNeighbours())) {
            throw new GameException("Cannot travel directly from {$currentSea->getName()} to {$destinationSea->getName()}");
        }

        if ($ship->getFuel() < $currentSea->getNeighbours()[$destinationSea->getName()]) {
            throw new GameException("Not enough fuel to travel to {$destinationSea->getName()}");
        }

        $ship->plotJumpTo($destinationSea);

        $output = ["{$ship->getName()} jumped from {$currentSea->getName()} to {$destinationSea->getName()}"];

        return $output;
    }
}