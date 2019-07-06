<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HASRepository")
 */
class HAS
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
    private $ID_Buy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDBuy(): ?int
    {
        return $this->ID_Buy;
    }

    public function setIDBuy(int $ID_Buy): self
    {
        $this->ID_Buy = $ID_Buy;

        return $this;
    }
}
