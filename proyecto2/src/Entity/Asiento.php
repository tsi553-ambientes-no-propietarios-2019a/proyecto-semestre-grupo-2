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
    private $num_asiento;

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

    public function __construct()
    {
        $this->idcompra = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAsiento(): ?int
    {
        return $this->num_asiento;
    }

    public function setNumAsiento(int $num_asiento): self
    {
        $this->num_asiento = $num_asiento;

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
}
