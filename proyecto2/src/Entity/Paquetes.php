<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaquetesRepository")
 */
class Paquetes
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_days;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Places", inversedBy="Paquetes")
     */
    private $Places;

    public function __construct()
    {
        $this->Places = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNoDays(): ?int
    {
        return $this->no_days;
    }

    public function setNoDays(int $no_days): self
    {
        $this->no_days = $no_days;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }

    /**
     * @return Collection|Places[]
     */
    public function getPlaces(): Collection
    {
        return $this->Places;
    }

    public function addPlace(Places $place): self
    {
        if (!$this->Places->contains($place)) {
            $this->Places[] = $place;
        }

        return $this;
    }

    public function removePlace(Places $place): self
    {
        if ($this->Places->contains($place)) {
            $this->Places->removeElement($place);
        }

        return $this;
    }
}
