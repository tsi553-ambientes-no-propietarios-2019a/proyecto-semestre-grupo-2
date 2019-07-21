<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TerminalRepository")
 */
class Terminal
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
    private $Name;

    /**
     * @ORM\Column(type="float")
     */
    private $Longitud;

    /**
     * @ORM\Column(type="float")
     */
    private $Latitude;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="Terminals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $City;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AffCompany", mappedBy="Terminal")
     */
    private $affCompanies;

    public function __construct()
    {
        $this->affCompanies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLongitud(): ?float
    {
        return $this->Longitud;
    }

    public function setLongitud(float $Longitud): self
    {
        $this->Longitud = $Longitud;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->Latitude;
    }

    public function setLatitude(float $Latitude): self
    {
        $this->Latitude = $Latitude;

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

    /**
     * @return Collection|AffCompany[]
     */
    public function getAffCompanies(): Collection
    {
        return $this->affCompanies;
    }

    public function addAffCompany(AffCompany $affCompany): self
    {
        if (!$this->affCompanies->contains($affCompany)) {
            $this->affCompanies[] = $affCompany;
            $affCompany->setTerminal($this);
        }

        return $this;
    }

    public function removeAffCompany(AffCompany $affCompany): self
    {
        if ($this->affCompanies->contains($affCompany)) {
            $this->affCompanies->removeElement($affCompany);
            // set the owning side to null (unless already changed)
            if ($affCompany->getTerminal() === $this) {
                $affCompany->setTerminal(null);
            }
        }

        return $this;
    }
}
