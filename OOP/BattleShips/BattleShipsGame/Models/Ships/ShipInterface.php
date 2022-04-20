<?php

namespace BattleShipsGame\Models\Ships;


use BattleShipsGame\Models\SeaAreaInterface;
use BattleShipsGame\Models\Enhancements\EnhancementInterface;
use BattleShipsGame\Models\Projectiles\ProjectileInterface;

interface ShipInterface
{
    /**
     * @return SeaAreaInterface
     */
    public function getSeaArea(): SeaAreaInterface;

    /**
     * @param SeaAreaInterface $seaArea
     */
    public function setSeaArea(SeaAreaInterface $seaArea);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param int $value
     */
    public function setDamage(int $value);

    /**
     * @return int
     */
    public function getHealth(): int;

    /**
     * @param int $value
     */
    public function setHealth(int $value);

    /**
     * @return int
     */
    public function getShields(): int;

    /**
     * @param int $value
     */
    public function setShields(int $value);

    /**
     * @return float
     */
    public function getFuel(): float;

    /**
     * @param int $value
     */
    public function setFuel(int $value);

    /**
     * @return string
     */
    public function getProjectileType(): string;

    /**
     * @return int
     */
    public function getProjectileDamage(): int;

    public function increaseProjectilesFired();

    /**
     * @return bool
     */
    public function isDestroyed(): bool;

    /**
     * @param string $name
     * @param EnhancementInterface $enhancement
     */
    public function addEnhancement(string $name, EnhancementInterface $enhancement);

    /**
     * @param ProjectileInterface $projectile
     */
    public function takeDamage(ProjectileInterface $projectile);

    /**
     * @param SeaAreaInterface $to
     */
    public function plotJumpTo(SeaAreaInterface $to);

    /**
     * @return string[]
     */
    public function getReport(): array;
}