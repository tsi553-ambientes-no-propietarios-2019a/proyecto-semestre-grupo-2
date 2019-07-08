<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Places")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cod_city;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_terminal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_city;

    /**
     * @ORM\Column(type="float")
     */
    private $longitud;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provincia", inversedBy="cod_provincia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $provincia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodCity(): ?Places
    {
        return $this->cod_city;
    }

    public function setCodCity(?Places $cod_city): self
    {
        $this->cod_city = $cod_city;

        return $this;
    }

    public function getIdTerminal(): ?int
    {
        return $this->id_terminal;
    }

    public function setIdTerminal(int $id_terminal): self
    {
        $this->id_terminal = $id_terminal;

        return $this;
    }

    public function getNameCity(): ?string
    {
        return $this->name_city;
    }

    public function setNameCity(string $name_city): self
    {
        $this->name_city = $name_city;

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

    public function getProvincia(): ?Provincia
    {
        return $this->provincia;
    }

    public function setProvincia(?Provincia $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }
}
