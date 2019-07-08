<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     */
    private $id_lugar;

    /**
     * @ORM\Column(type="integer")
     */
    private $cod_city;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_pakage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_place;

    /**
     * @ORM\Column(type="float")
     */
    private $longitud;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLugar(): ?int
    {
        return $this->id_lugar;
    }

    public function setIdLugar(int $id_lugar): self
    {
        $this->id_lugar = $id_lugar;

        return $this;
    }

    public function getCodCity(): ?int
    {
        return $this->cod_city;
    }

    public function setCodCity(int $cod_city): self
    {
        $this->cod_city = $cod_city;

        return $this;
    }

    public function getIdPakage(): ?int
    {
        return $this->id_pakage;
    }

    public function setIdPakage(int $id_pakage): self
    {
        $this->id_pakage = $id_pakage;

        return $this;
    }

    public function getNamePlace(): ?string
    {
        return $this->name_place;
    }

    public function setNamePlace(string $name_place): self
    {
        $this->name_place = $name_place;

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
}
