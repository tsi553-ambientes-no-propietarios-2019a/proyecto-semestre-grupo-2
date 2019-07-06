<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BusRepository")
 */
class Bus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\WeatherCon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $NUM_BUS;

    /**
     * @ORM\Column(type="integer")
     */
    private $ID_Enterprise;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\WeatherCon", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_Place;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Driver_Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Seat_Num;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Bus_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNUMBUS(): ?WeatherCon
    {
        return $this->NUM_BUS;
    }

    public function setNUMBUS(?WeatherCon $NUM_BUS): self
    {
        $this->NUM_BUS = $NUM_BUS;

        return $this;
    }

    public function getIDEnterprise(): ?int
    {
        return $this->ID_Enterprise;
    }

    public function setIDEnterprise(int $ID_Enterprise): self
    {
        $this->ID_Enterprise = $ID_Enterprise;

        return $this;
    }

    public function getIDPlace(): ?WeatherCon
    {
        return $this->ID_Place;
    }

    public function setIDPlace(WeatherCon $ID_Place): self
    {
        $this->ID_Place = $ID_Place;

        return $this;
    }

    public function getDriverName(): ?string
    {
        return $this->Driver_Name;
    }

    public function setDriverName(string $Driver_Name): self
    {
        $this->Driver_Name = $Driver_Name;

        return $this;
    }

    public function getSeatNum(): ?int
    {
        return $this->Seat_Num;
    }

    public function setSeatNum(int $Seat_Num): self
    {
        $this->Seat_Num = $Seat_Num;

        return $this;
    }

    public function getBusType(): ?string
    {
        return $this->Bus_type;
    }

    public function setBusType(string $Bus_type): self
    {
        $this->Bus_type = $Bus_type;

        return $this;
    }
}
