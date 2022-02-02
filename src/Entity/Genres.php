<?php

namespace App\Entity;

use App\Repository\GenresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenresRepository::class)
 */
class Genres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=BdColec::class, mappedBy="genres")
     */
    private $bd;

    /**
     * @ORM\OneToMany(targetEntity=Wishlist::class, mappedBy="genre")
     */
    private $wishlist;

    public function __construct()
    {
        $this->bd = new ArrayCollection();
        $this->wishlist = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|BdColec[]
     */
    public function getBd(): Collection
    {
        return $this->bd;
    }

    public function addBd(BdColec $bd): self
    {
        if (!$this->bd->contains($bd)) {
            $this->bd[] = $bd;
            $bd->setGenres($this);
        }

        return $this;
    }

    public function removeBd(BdColec $bd): self
    {
        if ($this->bd->removeElement($bd)) {
            // set the owning side to null (unless already changed)
            if ($bd->getGenres() === $this) {
                $bd->setGenres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wishlist[]
     */
    public function getWishlist(): Collection
    {
        return $this->wishlist;
    }

    public function addWishlist(Wishlist $wishlist): self
    {
        if (!$this->wishlist->contains($wishlist)) {
            $this->wishlist[] = $wishlist;
            $wishlist->setGenre($this);
        }

        return $this;
    }

    public function removeWishlist(Wishlist $wishlist): self
    {
        if ($this->wishlist->removeElement($wishlist)) {
            // set the owning side to null (unless already changed)
            if ($wishlist->getGenre() === $this) {
                $wishlist->setGenre(null);
            }
        }

        return $this;
    }
}
