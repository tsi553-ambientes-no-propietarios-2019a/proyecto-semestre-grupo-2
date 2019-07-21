<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;
    /**
     * @ORM\Column(type="date")
     */
    private $birth_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Compra", mappedBy="user", orphanRemoval=true)
     */
    private $iduser;

    public function __construct()
    {
        parent::__construct();
        $this->iduser = new ArrayCollection();
        $this->roles = array('ROLE_USER');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * @return Collection|Compra[]
     */
    public function getIduser(): Collection
    {
        return $this->iduser;
    }

    public function addIduser(Compra $iduser): self
    {
        if (!$this->iduser->contains($iduser)) {
            $this->iduser[] = $iduser;
            $iduser->setUser($this);
        }

        return $this;
    }

    public function removeIduser(Compra $iduser): self
    {
        if ($this->iduser->contains($iduser)) {
            $this->iduser->removeElement($iduser);
            // set the owning side to null (unless already changed)
            if ($iduser->getUser() === $this) {
                $iduser->setUser(null);
            }
        }

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->username;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
