<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="App\Entity\Asiento", mappedBy="bus")
     */
    private $idbus;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumBus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DriverName;

    /**
     * @ORM\Column(type="integer")
     */
    private $SeatNum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BusType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AffCompany", inversedBy="Buses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $AffCompany;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schedule", mappedBy="Bus")
     */
    private $schedules;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="buses")
     */

    public function __construct()
    {
        $this->idbus = new ArrayCollection();
        $this->Places = new ArrayCollection();
        $this->City = new ArrayCollection();
        $this->busCities = new ArrayCollection();
        $this->schedules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Asiento[]
     */
    public function getIdbus(): Collection
    {
        return $this->idbus;
    }

    public function addIdbus(Asiento $idbus): self
    {
        if (!$this->idbus->contains($idbus)) {
            $this->idbus[] = $idbus;
            $idbus->setBus($this);
        }

        return $this;
    }

    public function removeIdbus(Asiento $idbus): self
    {
        if ($this->idbus->contains($idbus)) {
            $this->idbus->removeElement($idbus);
            // set the owning side to null (unless already changed)
            if ($idbus->getBus() === $this) {
                $idbus->setBus(null);
            }
        }

        return $this;
    }

    public function getNumBus(): ?int
    {
        return $this->NumBus;
    }

    public function setNumBus(int $NumBus): self
    {
        $this->NumBus = $NumBus;

        return $this;
    }

    public function getDriverName(): ?string
    {
        return $this->DriverName;
    }

    public function setDriverName(?string $DriverName): self
    {
        $this->DriverName = $DriverName;

        return $this;
    }

    public function getSeatNum(): ?int
    {
        return $this->SeatNum;
    }

    public function setSeatNum(int $SeatNum): self
    {
        $this->SeatNum = $SeatNum;

        return $this;
    }

    public function getBusType(): ?string
    {
        return $this->BusType;
    }

    public function setBusType(string $BusType): self
    {
        $this->BusType = $BusType;

        return $this;
    }

    public function getAffCompany(): ?AffCompany
    {
        return $this->AffCompany;
    }

    public function setAffCompany(?AffCompany $AffCompany): self
    {
        $this->AffCompany = $AffCompany;

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
            $schedule->setBus($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): self
    {
        if ($this->schedules->contains($schedule)) {
            $this->schedules->removeElement($schedule);
            // set the owning side to null (unless already changed)
            if ($schedule->getBus() === $this) {
                $schedule->setBus(null);
            }
        }

        return $this;
    }

}
