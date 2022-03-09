<?php

namespace BattleShipsGame\Models;


use BattleShipsGame\Models\Ships\ShipInterface;

interface OceanInterface
{
    /**
     * @param ShipInterface $ship
     */
    public function addShip(ShipInterface $ship);

    /**
     * @param string $name
     * @return ShipInterface
     */
    public function getShipByName(string $name): ShipInterface;

    /**
     * @param string $name
     * @return bool
     */
    public function shipExists(string $name): bool;

    /**
     * @param string $name
     * @return SeaAreaInterface
     */
    public function getSeaAreaByName(string $name): SeaAreaInterface;

}