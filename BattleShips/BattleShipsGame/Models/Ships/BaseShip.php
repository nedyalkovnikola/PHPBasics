<?php

namespace BattleShipsGame\Models\Ships;


use BattleShipsGame\Models\Enhancements\EnhancementInterface;
use BattleShipsGame\Models\Projectiles\ProjectileInterface;
use BattleShipsGame\Models\SeaAreaInterface;

abstract class BaseShip implements ShipInterface
{
    private $seaArea;
    private $projectileType;
    private $projectilesFired = 0;

    private $type;
    private $name;
    private $health;
    private $shields;
    private $damage;
    private $fuel;

    private $enhancements = [];

    /**
     * BaseShip constructor.
     * @param string $type
     * @param string $name
     * @param int $health
     * @param int $shields
     * @param int $damage
     * @param float $fuel
     * @param string $projectileType
     */

     public function __construct(
         string $type,
         string $name,
         int $health,
         int $shields,
         int $damage,
         float $fuel,
         string $projectileType
     )
     {
        $this->type = $type;
        $this->name = $name;
        $this->health = $health;
        $this->shields = $shields;
        $this->damage = $damage;
        $this->fuel = $fuel;

        $this->projectileType = $projectileType;
     }

    /**
     * @return SeaAreaInterface
     */
     public function getSeaArea(): SeaAreaInterface
     {
         return $this->seaArea;
     }

    /**
     * @param SeaAreaInterface $seaArea
     */
     public function setSeaArea(SeaAreaInterface $seaArea)
     {
         $this->seaArea = $seaArea;
     }

    /**
     * @return string
     */ 
     public function getName(): string
     {
         return $this->name;
     }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $value
     */
    public function setDamage(int $value)
    {
        $this->damage = $value;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $value
     */
    public function setHealth(int $value)
    {
        $this->health = $value;
    }

    /**
     * @return int
     */
    public function getShields(): int
    {
        return $this->shields;
    }

    /**
     * @param int $value
     */
    public function setShields(int $value)
    {
        $this->shields = $value;
    }

    /**
     * @return float
     */
    public function getFuel(): float
    {
        return $this->fuel;
    }

    /**
     * @param int $value
     */
    public function setFuel(int $value)
    {
        $this->fuel = $value;
    }

    /**
     * @return string
     */
    public function getProjectileType(): string
    {
        return $this->projectileType;
    }

    public function increaseProjectilesFired()
    {
        $this->projectilesFired++;
    }

    /**
     * @param string $name
     * @param EnhancementInterface $enhancement
     */
    public function addEnhancement(string $name, EnhancementInterface $enhancement)
    {
        $this->enhancements[$name] = $enhancement;
        $enhancement->enhance($this);
    }

    /**
     * @param ProjectileInterface $projectile
     */
    public function takeDamage(ProjectileInterface $projectile)
    {
        $projectile->doDamage($this);
    }

    /**
     * @param SeaAreaInterface $to
     */
    public function plotJumpTo(SeaAreaInterface $to)
    {
        $this->setFuel($this->getFuel() - $this->getSeaArea()->getNeighbours()[$to->getName()]);
        $this->getSeaArea()->removeShip($this->getName());
        $to->addShip($this);
    }

    /**
     * @return bool
     */
    public function isDestroyed(): bool
    {
        return $this->health === 0;
    }

    public function getReport(): array
    {
        $output = ["--{$this->getName()} - {$this->type}"];
        if ($this->isDestroyed()) {
            $output[] = "(Destroyed)";
        } else {
            $output[] = "-Location: {$this->getSeaArea()->getName()}";
            $output[] = "-Health: {$this->getHealth()}";
            $output[] = "-Shields: {$this->getShields()}";
            $output[] = "-Damage: {$this->getDamage()}";
            $output[] = "-Fuel: " . number_format($this->getFuel(), 1);

            if (count($this->enhancements) == 0) {
                $output[] = "Enhancements: N/A";
            } else {
                $output[] = "Enhancements: " . implode(", ", array_keys($this->enhancements));
            }
        }

        return $output;
    }

}