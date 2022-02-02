<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbBd;

    /**
     * @ORM\ManyToMany(targetEntity=BdCollection::class, inversedBy="users")
     */
    private $bdCollec;

    public function __construct()
    {
        $this->bdCollec = new ArrayCollection();
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

    public function getNbBd(): ?int
    {
        return $this->nbBd;
    }

    public function setNbBd(?int $nbBd): self
    {
        $this->nbBd = $nbBd;

        return $this;
    }

    /**
     * @return Collection|BdCollection[]
     */
    public function getBdCollec(): Collection
    {
        return $this->bdCollec;
    }

    public function addBdCollec(BdCollection $bdCollec): self
    {
        if (!$this->bdCollec->contains($bdCollec)) {
            $this->bdCollec[] = $bdCollec;
        }

        return $this;
    }

    public function removeBdCollec(BdCollection $bdCollec): self
    {
        $this->bdCollec->removeElement($bdCollec);

        return $this;
    }
}
