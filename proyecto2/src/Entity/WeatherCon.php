<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeatherConRepository")
 */
class WeatherCon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDCON;

    /**
     * @ORM\Column(type="integer")
     */
    private $ID_Place;

    /**
     * @ORM\Column(type="float")
     */
    private $Temperature;

    /**
     * @ORM\Column(type="float")
     */
    private $Preasure;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Status;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDCON(): ?int
    {
        return $this->IDCON;
    }

    public function setIDCON(int $IDCON): self
    {
        $this->IDCON = $IDCON;

        return $this;
    }

    public function getIDPlace(): ?int
    {
        return $this->ID_Place;
    }

    public function setIDPlace(int $ID_Place): self
    {
        $this->ID_Place = $ID_Place;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->Temperature;
    }

    public function setTemperature(float $Temperature): self
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getPreasure(): ?float
    {
        return $this->Preasure;
    }

    public function setPreasure(float $Preasure): self
    {
        $this->Preasure = $Preasure;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
