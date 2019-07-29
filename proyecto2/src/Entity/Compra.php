<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompraRepository")
 */
class Compra
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_com;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_asientos;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total_asientos;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_habita;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total_paquetes;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_paquetes;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total_habita;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total_compra;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="iduser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paquetes")
     */
    private $paquete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Habitaciones")
     */
    private $habitacion;

    public function __construct()
    {
        $this->asiento = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaCom(): ?\DateTimeInterface
    {
        return $this->fecha_com;
    }

    public function setFechaCom(\DateTimeInterface $fecha_com): self
    {
        $this->fecha_com = $fecha_com;

        return $this;
    }

    public function getNoAsientos(): ?int
    {
        return $this->no_asientos;
    }

    public function setNoAsientos(int $no_asientos): self
    {
        $this->no_asientos = $no_asientos;

        return $this;
    }

    public function getTotalAsientos()
    {
        return $this->total_asientos;
    }

    public function setTotalAsientos($total_asientos): self
    {
        $this->total_asientos = $total_asientos;

        return $this;
    }

    public function getNoHabita(): ?int
    {
        return $this->no_habita;
    }

    public function setNoHabita(int $no_habita): self
    {
        $this->no_habita = $no_habita;

        return $this;
    }

    public function getTotalPaquetes()
    {
        return $this->total_paquetes;
    }

    public function setTotalPaquetes($total_paquetes): self
    {
        $this->total_paquetes = $total_paquetes;

        return $this;
    }

    public function getNoPaquetes(): ?int
    {
        return $this->no_paquetes;
    }

    public function setNoPaquetes(int $no_paquetes): self
    {
        $this->no_paquetes = $no_paquetes;

        return $this;
    }

    public function getTotalHabita()
    {
        return $this->total_habita;
    }

    public function setTotalHabita($total_habita): self
    {
        $this->total_habita = $total_habita;

        return $this;
    }

    public function getTotalCompra()
    {
        return $this->total_compra;
    }

    public function setTotalCompra($total_compra): self
    {
        $this->total_compra = $total_compra;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    

    public function getPaquete(): ?Paquetes
    {
        return $this->paquete;
    }

    public function setPaquete(?Paquetes $paquete): self
    {
        $this->paquete = $paquete;

        return $this;
    }

    public function getHabitacion(): ?Habitaciones
    {
        return $this->habitacion;
    }

    public function setHabitacion(?Habitaciones $habitacion): self
    {
        $this->habitacion = $habitacion;

        return $this;
    }
}
