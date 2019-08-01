<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
    private $CityCod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Places", mappedBy="City")
     */
    private $Places;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Province", inversedBy="Cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Province;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Terminal", mappedBy="City")
     */
    private $Terminals;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hotel", mappedBy="City")
     */
    private $Hotels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schedule", mappedBy="origin_city")
     */
    private $schedules_origin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schedule", mappedBy="destiny_city")
     */
    private $schedules_destiny;

    public function __construct()
    {
        $this->Places = new ArrayCollection();
        $this->Terminals = new ArrayCollection();
        $this->Hotels = new ArrayCollection();
        $this->buses = new ArrayCollection();
        $this->Buses = new ArrayCollection();
        $this->busCities = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityCod(): ?int
    {
        return $this->CityCod;
    }

    public function setCityCod(int $CityCod): self
    {
        $this->CityCod = $CityCod;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Places[]
     */
    public function getPlaces(): Collection
    {
        return $this->Places;
    }

    public function addPlace(Places $place): self
    {
        if (!$this->Places->contains($place)) {
            $this->Places[] = $place;
            $place->setCity($this);
        }

        return $this;
    }

    public function removePlace(Places $place): self
    {
        if ($this->Places->contains($place)) {
            $this->Places->removeElement($place);
            // set the owning side to null (unless already changed)
            if ($place->getCity() === $this) {
                $place->setCity(null);
            }
        }

        return $this;
    }

    public function getProvince(): ?Province
    {
        return $this->Province;
    }

    public function setProvince(?Province $Province): self
    {
        $this->Province = $Province;

        return $this;
    }

    /**
     * @return Collection|Terminal[]
     */
    public function getTerminals(): Collection
    {
        return $this->Terminals;
    }

    public function addTerminal(Terminal $terminal): self
    {
        if (!$this->Terminals->contains($terminal)) {
            $this->Terminals[] = $terminal;
            $terminal->setCity($this);
        }

        return $this;
    }

    public function removeTerminal(Terminal $terminal): self
    {
        if ($this->Terminals->contains($terminal)) {
            $this->Terminals->removeElement($terminal);
            // set the owning side to null (unless already changed)
            if ($terminal->getCity() === $this) {
                $terminal->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hotel[]
     */
    public function getHotels(): Collection
    {
        return $this->Hotels;
    }

    public function addHotel(Hotel $hotel): self
    {
        if (!$this->Hotels->contains($hotel)) {
            $this->Hotels[] = $hotel;
            $hotel->setCity($this);
        }

        return $this;
    }

    public function removeHotel(Hotel $hotel): self
    {
        if ($this->Hotels->contains($hotel)) {
            $this->Hotels->removeElement($hotel);
            // set the owning side to null (unless already changed)
            if ($hotel->getCity() === $this) {
                $hotel->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Schedule[]
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedule $schedule): self
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules[] = $schedule;
            $schedule->setOriginCity($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): self
    {
        if ($this->schedules->contains($schedule)) {
            $this->schedules->removeElement($schedule);
            // set the owning side to null (unless already changed)
            if ($schedule->getOriginCity() === $this) {
                $schedule->setOriginCity(null);
            }
        }

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->Name;
        // to show the id of the Category in the select
        // return $this->id;
    }

}
