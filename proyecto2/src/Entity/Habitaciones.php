<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HabitacionesRepository")
 */
class Habitaciones
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
    private $type_room;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $no_beds;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotel")
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRoom(): ?string
    {
        return $this->type_room;
    }

    public function setTypeRoom(string $type_room): self
    {
        $this->type_room = $type_room;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNoBeds(): ?int
    {
        return $this->no_beds;
    }

    public function setNoBeds(int $no_beds): self
    {
        $this->no_beds = $no_beds;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->type_room;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
