<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlacesRepository")
 */
class Places
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PlaceName;

    /**
     * @ORM\Column(type="float")
     */
    private $longitud;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Bus", mappedBy="Places")
     */
    private $buses;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Paquetes", mappedBy="Places")
     */
    private $Paquetes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="Places")
     * @ORM\JoinColumn(nullable=false)
     */
    private $City;

    public function __construct()
    {
        $this->Buses = new ArrayCollection();
        $this->Paquetes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceName(): ?string
    {
        return $this->PlaceName;
    }

    public function setPlaceName(string $PlaceName): self
    {
        $this->PlaceName = $PlaceName;

        return $this;
    }

    public function getLongitud(): ?float
    {
        return $this->longitud;
    }

    public function setLongitud(float $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return Collection|Bus[]
     */
    public function getBuses(): Collection
    {
        return $this->Buses;
    }

    public function addBuses(Bus $affCompany): self
    {
        if (!$this->Buses->contains($affCompany)) {
            $this->Buses[] = $buses;
            $buses->addPlace($this);
        }

        return $this;
    }

    public function removeBuses(Bus $buses): self
    {
        if ($this->Buses->contains($buses)) {
            $this->Buses->removeElement($buses);
            $buses->removePlace($this);
        }

        return $this;
    }

    /**
     * @return Collection|Paquetes[]
     */
    public function getPaquetes(): Collection
    {
        return $this->Paquetes;
    }

    public function addPaquete(Paquetes $paquete): self
    {
        if (!$this->Paquetes->contains($paquete)) {
            $this->Paquetes[] = $paquete;
            $paquete->addPlace($this);
        }

        return $this;
    }

    public function removePaquete(Paquetes $paquete): self
    {
        if ($this->Paquetes->contains($paquete)) {
            $this->Paquetes->removeElement($paquete);
            $paquete->removePlace($this);
        }

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->City;
    }

    public function setCity(?City $City): self
    {
        $this->City = $City;

        return $this;
    }
}
