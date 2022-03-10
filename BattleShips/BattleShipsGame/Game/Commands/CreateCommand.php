<?php

namespace BattleShipsGame\Game\Commands;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Game\GameEngineInterface;
use BattleShipsGame\Factories\ShipFactory;
use BattleShipsGame\Factories\EnhancementFactory;
use BattleShipsGame\Helpers\Messages;

class CreateCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $shipType = array_shift($params);
        $shipName = array_shift($params);

        if ($engine->getOcean()->shipExists($shipName)) {
            throw new GameException(Messages::SHIP_ALREADY_EXISTS);
        }

        $seaArea = $engine->getOcean()->getSeaAreaByName(array_shift($params));
        $enhancements = $params;

        $ship = ShipFactory::produce($shipType, $shipName);

        foreach($enhancements as $enhancementType) {
            $enhancement = EnhancementFactory::produce($enhancementType);
            $ship->addEnhancement($enhancementType, $enhancement);
        }

        $engine->getOcean()->addShip($ship);
        $seaArea->addShip($ship);

        return ["Created {$shipType} {$shipName}"];
    }
}