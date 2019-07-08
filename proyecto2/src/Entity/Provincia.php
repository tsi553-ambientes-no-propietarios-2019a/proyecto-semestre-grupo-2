<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProvinciaRepository")
 */
class Provincia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\City", mappedBy="provincia")
     */
    private $cod_provincia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_provincia;

    public function __construct()
    {
        $this->cod_provincia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|City[]
     */
    public function getCodProvincia(): Collection
    {
        return $this->cod_provincia;
    }

    public function addCodProvincium(City $codProvincium): self
    {
        if (!$this->cod_provincia->contains($codProvincium)) {
            $this->cod_provincia[] = $codProvincium;
            $codProvincium->setProvincia($this);
        }

        return $this;
    }

    public function removeCodProvincium(City $codProvincium): self
    {
        if ($this->cod_provincia->contains($codProvincium)) {
            $this->cod_provincia->removeElement($codProvincium);
            // set the owning side to null (unless already changed)
            if ($codProvincium->getProvincia() === $this) {
                $codProvincium->setProvincia(null);
            }
        }

        return $this;
    }

    public function getNameProvincia(): ?string
    {
        return $this->name_provincia;
    }

    public function setNameProvincia(string $name_provincia): self
    {
        $this->name_provincia = $name_provincia;

        return $this;
    }
}
