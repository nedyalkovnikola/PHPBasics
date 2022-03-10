<?php

namespace BattleShipsGame\Game;


use BattleShipsGame\Exceptions\GameException;
use BattleShipsGame\Factories\CommandFactory;
use BattleShipsGame\Game\Commands\CommandInterface;
use BattleShipsGame\Helpers\Messages;
use BattleShipsGame\IO\IOInterface;
use BattleShipsGame\Models\OceanInterface;


class GameEngine implements GameEngineInterface
{
    private $ocean;

    /**
     * @var CommandInterface[]
     */
    private $commands;
    private $io;

    /**
     * GameEngine constructor.
     * @param OceanInterface $ocean
     * @param IOInterface $io
     */
    public function __construct(OceanInterface $ocean, IOInterface $io)
    {
        $this->ocean = $ocean;
        $this->io = $io;
    }

    public function run()
    {
        
            $this->produceCommands();
            $this->readInput();
        
/*         try {
            $this->produceCommands();
            $this->readInput();
        } catch (GameException $gameException) {
            $this->io->writeLine($gameException->getMessage());
        } catch (\Exception $e) {
            $this->io->writeLine($e->getMessage());
        } */
    }

    /**
     * @return OceanInterface
     */
    public function getOcean(): OceanInterface
    {
        return $this->ocean;
    }

    private function readInput()
    {
        while(true) {
            try {
                $input = $this->io->readLine();
                if($input === Messages::END) {
                    break;
                }

                $result = $this->processCommand($input);

                foreach ($result as $row) {
                    $this->io->writeLine($row);
                }

            } catch (GameException $gameException) {
                $this->io->writeLine($gameException->getMessage());
            } catch (\Exception $e) {
                $this->io->writeLine($e->getMessage());
            }
        }
    }

    private function processCommand(string $input)
    {
        $args = explode(Messages::DELIMITER, $input);
        $name = array_shift($args);

        $command = $this->commands[$name];
        return $command->execute($this, $args);
    }

    private function produceCommands()
    {
        $commandNames = ["create", "attack", "plot-jump", "status-report", "sea-report"];

        foreach($commandNames as $commandName) {
            $this->commands[$commandName] = CommandFactory::produce($commandName);
        }
    }

}