<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffCompanyRepository")
 */
class AffCompany
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
    private $NameCompany;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EmailCompany;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $CompanyPhone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bus", mappedBy="AffCompany")
     */
    private $Buses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Terminal", inversedBy="affCompanies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Terminal;

    public function __construct()
    {
        $this->Buses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCompany(): ?string
    {
        return $this->NameCompany;
    }

    public function setNameCompany(string $NameCompany): self
    {
        $this->NameCompany = $NameCompany;

        return $this;
    }

    public function getEmailCompany(): ?string
    {
        return $this->EmailCompany;
    }

    public function setEmailCompany(string $EmailCompany): self
    {
        $this->EmailCompany = $EmailCompany;

        return $this;
    }

    public function getCompanyPhone(): ?int
    {
        return $this->CompanyPhone;
    }

    public function setCompanyPhone(?int $CompanyPhone): self
    {
        $this->CompanyPhone = $CompanyPhone;

        return $this;
    }

    /**
     * @return Collection|Bus[]
     */
    public function getBuses(): Collection
    {
        return $this->Buses;
    }

    public function addBus(Bus $bus): self
    {
        if (!$this->Buses->contains($bus)) {
            $this->Buses[] = $bus;
            $bus->setAffCompany($this);
        }

        return $this;
    }

    public function removeBus(Bus $bus): self
    {
        if ($this->Buses->contains($bus)) {
            $this->Buses->removeElement($bus);
            // set the owning side to null (unless already changed)
            if ($bus->getAffCompany() === $this) {
                $bus->setAffCompany(null);
            }
        }

        return $this;
    }

    public function getTerminal(): ?Terminal
    {
        return $this->Terminal;
    }

    public function setTerminal(?Terminal $Terminal): self
    {
        $this->Terminal = $Terminal;

        return $this;
    }
}
