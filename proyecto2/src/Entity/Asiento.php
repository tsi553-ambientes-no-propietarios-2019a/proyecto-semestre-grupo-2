<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AsientoRepository")
 */
class Asiento
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
    private $numAsiento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo_asiento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bus", inversedBy="idbus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bus;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $DispAsiento;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Compra", mappedBy="asiento")
     */
    private $compras;

    public function __construct()
    {
        $this->idcompra = new ArrayCollection();
        $this->compras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAsiento(): ?int
    {
        return $this->numAsiento;
    }

    public function setNumAsiento(int $numAsiento): self
    {
        $this->numAsiento = $numAsiento;

        return $this;
    }

    public function getTipoAsiento(): ?string
    {
        return $this->tipo_asiento;
    }

    public function setTipoAsiento(string $tipo_asiento): self
    {
        $this->tipo_asiento = $tipo_asiento;

        return $this;
    }

    public function getBus(): ?Bus
    {
        return $this->bus;
    }

    public function setBus(?Bus $bus): self
    {
        $this->bus = $bus;

        return $this;
    }

    public function getDispAsiento(): ?string
    {
        return $this->DispAsiento;
    }

    public function setDispAsiento(string $DispAsiento): self
    {
        $this->DispAsiento = $DispAsiento;

        return $this;
    }

    /**
     * @return Collection|Compra[]
     */
    public function getCompras(): Collection
    {
        return $this->compras;
    }

    public function addCompra(Compra $compra): self
    {
        if (!$this->compras->contains($compra)) {
            $this->compras[] = $compra;
            $compra->addAsiento($this);
        }

        return $this;
    }

    public function removeCompra(Compra $compra): self
    {
        if ($this->compras->contains($compra)) {
            $this->compras->removeElement($compra);
            $compra->removeAsiento($this);
        }

        return $this;
    }
}
