<?php

namespace BattleShipsGame\Models;


use BattleShipsGame\Factories\SeaAreaFactory;
use BattleShipsGame\Models\Ships\ShipInterface;

class Ocean implements OceanInterface
{
    /**
     * @var SeaAreaInterface[]
     */
    private $seaAreas = [];

    /**
     * @var ShipInterface[]
     */
    private $ships = [];

    public function __construct()
    {
        $this->createSeaAreas();
    }

    /**
     * @param ShipInterface $ship
     */
    public function addShip(ShipInterface $ship)
    {
        $this->ships[$ship->getName()] = $ship;
    }

    /**
     * @param string $name
     * @return ShipInterface
     */
    public function getShipByName(string $name): ShipInterface
    {
        return $this->ships[$name];
    }

    /**
     * @param string $name
     * @return SeaAreaInterface
     */
    public function getSeaAreaByName(string $name): SeaAreaInterface
    {
        return $this->seaAreas[$name];
    }

    private function createSeaAreas()
    {
        $seaAreaNames = ["Nordic-Sea", "Glacial-Sea", "Caribbean-Sea", "Black-Sea"];
        foreach ($seaAreaNames as $seaAreaName) {
            $this->seaAreas[$seaAreaName] = SeaAreaFactory::produce($seaAreaName);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function shipExists(string $name): bool
    {
        return array_key_exists($name, $this->ships);
    }
}

