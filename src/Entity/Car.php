<?php

namespace App\Entity;

use App\Repository\CarRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $gas_economy;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getGasEconomy(): ?string
    {
        return $this->gas_economy;
    }

    public function setGasEconomy(?string $gas_economy): self
    {
        $this->gas_economy = $gas_economy;

        return $this;
    }

}
