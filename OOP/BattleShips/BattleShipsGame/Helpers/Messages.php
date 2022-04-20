<?php

namespace BattleShipsGame\Helpers;


class Messages
{
    // Engine
    const END = "over";
    const DELIMITER = " ";

    // Factory
    const INVALID_COMMAND_NAME = "Command not implemented yet.";
    const INVALID_SEA_AREA_NAME = "Sea with that name does not exists.";
    const INVALID_PROJECTILE_TYPE = "Projectile of that name does not exists.";
    const INVALID_SHIP_TYPE = "Ship of that type does not exists.";
    const INVALID_ENHANCEMENT_TYPE = "Enhancement of that type does not exists.";

    // Other
    const SHIP_IS_DESTROYED = "Ship is destroyed";
    const SHIP_ALREADY_EXISTS = "Ship with such name already exists";
    const SHIP_NOT_IN_SAME_SEA = "No such ship in sea area";
    const SHIP_ALREADY_IN_SAME_SEA = "Ship is already in ";

    private function __construct()
    {
    }
}