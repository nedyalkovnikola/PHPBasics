<?php

namespace BattleShipsGame\Game\Commands;


use BattleShipsGame\Game\GameEngineInterface;
use BattleShipsGame\Models\Ships\ShipInterface;

class SeaReportCommand implements CommandInterface
{
    public function execute(GameEngineInterface $engine, array $params)
    {
        $seaName = $params[0];
        $seaArea = $engine->getOcean()->getSeaAreaByName($seaName);

        $aliveShips = array_filter($seaArea->getShips(), function(ShipInterface $ship) {
            return !$ship->isDestroyed();
        });

        

        usort($aliveShips, function (ShipInterface $shipA, ShipInterface $shipB) {
            $result = $shipB->getHealth() <=> $shipA->getHealth();
            if ($result == 0) {
                return $shipB->getShields() <=> $shipA->getShields();
            }

            return $result;
        });

        $deadShips = array_filter($seaArea->getShips(), function (ShipInterface $ship) {
            return $ship->isDestroyed();
        });

        usort($deadShips, function (ShipInterface $shipA, ShipInterface $shipB) {
            return $shipA->getName() <=> $shipB->getName();
        });

        $output = ["Intact ships:"];
        if (count($aliveShips) <= 0) {
            $output[] = "N/A";
        } else {
            /**
             * @var $ship ShipInterface
             */
            foreach ($aliveShips as $ship) {
                array_push($output, ...$ship->getReport());
            }
        }

        $output[] = "Destroyed ships:";
        if (count($deadShips) <= 0) {
            $output[] = "N/A";
        } else {
            /**
             * @var $ship ShipInterface
             */
            foreach ($deadShips as $ship) {
                array_push($output, ...$ship->getReport());
            }
        }

        return $output;
    }
}