<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $day;

    /**
     * @ORM\Column(type="time")
     */
    private $hour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bus", inversedBy="schedules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="schedules_origin")
     */
    private $originCity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="schedules_destiny")
     */
    private $destinyCity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getHour(): ?\DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getBus(): ?Bus
    {
        return $this->Bus;
    }

    public function setBus(?Bus $Bus): self
    {
        $this->Bus = $Bus;

        return $this;
    }

    public function getOriginCity(): ?City
    {
        return $this->originCity;
    }

    public function setOriginCity(?City $originCity): self
    {
        $this->originCity = $originCity;

        return $this;
    }

    public function getDestinyCity(): ?City
    {
        return $this->destinyCity;
    }

    public function setDestinyCity(?City $destinyCity): self
    {
        $this->destinyCity = $destinyCity;

        return $this;
    }
}
