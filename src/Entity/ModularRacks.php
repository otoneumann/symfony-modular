<?php

namespace App\Entity;

use App\Repository\ModularRacksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModularRacksRepository::class)]
class ModularRacks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rack_name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $rack_price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRackName(): ?string
    {
        return $this->rack_name;
    }

    public function setRackName(?string $rack_name): static
    {
        $this->rack_name = $rack_name;

        return $this;
    }

    public function getRackPrice(): ?string
    {
        return $this->rack_price;
    }

    public function setRackPrice(?string $rack_price): static
    {
        $this->rack_price = $rack_price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
