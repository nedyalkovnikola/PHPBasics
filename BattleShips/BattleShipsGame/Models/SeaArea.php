<?php

namespace BattleShipsGame\Models;


use BattleShipsGame\Models\Ships\ShipInterface;

class SeaArea implements SeaAreaInterface
{
    private $name;

    /**
     * @var string []
     */
    private $neighbours = [];

    /**
     * @var ShipInterface[]
     */
    private $ships = [];

    /**
     * SeaArea constructor.
     * @param string $name
     * @param string [] $neighbours
     */
    public function __construct(string $name, array $neighbours)
    {
        $this->name = $name;
        $this->neighbours = $neighbours;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getNeighbours(): array
    {
        return $this->neighbours;
    }

    /**
     * @param ShipInterface $ship
     */
    public function addShip(ShipInterface $ship)
    {
        $this->ships[$ship->getName()] = $ship;
        $ship->setSeaArea($this);
    }

    /**
     * @param string $shipName
     */
    public function removeShip(string $shipName)
    {
        unset($this->ships[$shipName]);
    }

    /**
     * @return array
     */
    public function getShips(): array
    {
        return array_values($this->ships);
    }
}