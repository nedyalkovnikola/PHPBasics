<?php

namespace BattleShipsGame\Models;


use BattleShipsGame\Models\Ships\ShipInterface;

interface SeaAreaInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function getNeighbours(): array;

    /**
     * @return array
     */
    public function getShips(): array;

    /**
     * @param ShipInterface $ship
     */
    public function addShip(ShipInterface $ship);

    /**
     * @param string $shipName
     */
    public function removeShip(string $shipName);
}