<?php

class Car
{
    const MIN_SPEED = 5;
    const MIN_FUEL = 1;
    const MAX_FUEL = 50;
    const MIN_ECONOMY = 1;

    private $speed;
    private $availableFuel;
    private $fuelEconomy;
    private $distanceTraveled;
    private $travelTime;
    
    public function __construct(int $speed, float $availableFuel, float $fuelEconomy)
    {
        $this->setSpeed($speed);
        $this->setFuel($availableFuel);
        $this->setFuelEconomy($fuelEconomy);
    }

    public function setSpeed (int $speed)
    {   
        if ($speed < self::MIN_SPEED) {
            throw new Exception("Speed up!");
        }
        $this->speed = $speed;
    }

    public function setFuel (float $availableFuel)
    {
        if ($availableFuel < self::MIN_FUEL) {
            throw new Exception("Insufficient fuel for the drive");
        }
        $this->availableFuel = round($availableFuel, 1);
    }

    public function setFuelEconomy (float $fuelEconomy)
    {
        if ($fuelEconomy < self::MIN_ECONOMY) {
            throw new Exception("Invalid fuel economy");
        }
        $this->fuelEconomy = round($fuelEconomy, 1);
    }

    public function travel (float $distance)
    {
        $possibleDistanceToCover = ($this->availableFuel / $this->fuelEconomy) * 100;
        $usedFuel = 0;
        if ($possibleDistanceToCover >= $distance) {
            $this->distanceTraveled = round($distance, 1);
            $usedFuel = $this->distanceTraveled / (100 / $this->fuelEconomy);
            $this->availableFuel -= $usedFuel;
            $this->travelTime = $this->distanceTraveled / $this->speed;
        } 
        else {
            $this->distanceTraveled = round($possibleDistanceToCover, 1);
            $this->availableFuel = self::MIN_FUEL;
            $this->travelTime = $this->distanceTraveled / $this->speed;
        }
    }

    public function refuel (float $fuel) 
    {
        if ($fuel < self::MAX_FUEL) {
            if (($this->availableFuel + $fuel) <= self::MAX_FUEL) {
                $this->availableFuel += $fuel;
            } else {
                $this->availableFuel = self::MAX_FUEL;
            } 
        } 
        else {
            $this->availableFuel = self::MAX_FUEL;
        }
    }

    public function getTravelDistance(): float
    {
        return round($this->distanceTraveled, 1);
    }

    public function getTravelTime()
    {   
        $hours = floor($this->travelTime);
        $timeInMins = $this->travelTime * 60;
        $minutes = $timeInMins % 60;
        $format = '%01d Hours and %02d Minutes';
        return sprintf($format, $hours, $minutes);
    } 

    public function getFuel(): float 
    {
        return round($this->availableFuel, 1);
    }

    public function start()
    {
        while(true)
        {
            $line = trim(fgets(STDIN));
            $commandArgs = explode(" ", $line);
            $commandName = $commandArgs[0];
            try {
                switch ($commandName) {
                    case "travel":
                        $this->travel($commandArgs[1]);
                        break;
                    case "refuel":
                        $this->refuel($commandArgs[1]);
                        break;
                    case "distance":
                        echo "Total distance: " . $this->getTravelDistance() . " kilometers" . PHP_EOL;
                        break;
                    case "time":
                        echo "Total time: " . $this->getTravelTime() . PHP_EOL;
                        break;
                    case "fuel":
                        echo "Fuel left: " . $this->getFuel() . " liters" . PHP_EOL;
                        break;
                    case "end":
                        exit("Car stops");
                        break;
                    default:
                        break;
                }
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            } 
        }
    }
}


?>