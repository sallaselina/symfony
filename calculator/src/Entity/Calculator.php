<?php

namespace App\Entity;

use App\Repository\CalculatorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalculatorRepository::class)]
class Calculator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $firstNumber = null;

    #[ORM\Column]
    private ?int $secondNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNumber(): ?int
    {
        return $this->firstNumber;
    }

    public function setFirstNumber(int $firstNumber): static
    {
        $this->firstNumber = $firstNumber;

        return $this;
    }

    public function getSecondNumber(): ?int
    {
        return $this->secondNumber;
    }

    public function setSecondNumber(int $secondNumber): static
    {
        $this->secondNumber = $secondNumber;

        return $this;
    }
}
