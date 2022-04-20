<?php

namespace BattleShipsGame\Factories;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Game\Commands\AttackCommand;
use BattleShipsGame\Game\Commands\CreateCommand;
use BattleShipsGame\Game\Commands\PlotJumpCommand;
use BattleShipsGame\Game\Commands\StatusReportCommand;
use BattleShipsGame\Game\Commands\SeaReportCommand;
use BattleShipsGame\Game\Commands\CommandInterface;
use BattleShipsGame\Helpers\Messages;

class CommandFactory
{
    private function __construct()
    {
        
    }

    public static function produce($commandName): CommandInterface
    {
        switch ($commandName) {
            case "create":
                return new CreateCommand();
            case "attack":
                return new AttackCommand();
            case "plot-jump":
                return new PlotJumpCommand();
            case "status-report":
                return new StatusReportCommand();
            case "sea-report":
                return new SeaReportCommand();
            default:
                throw new GameException(Messages::INVALID_COMMAND_NAME);
        }
    }
}