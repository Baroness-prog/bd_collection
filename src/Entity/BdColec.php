<?php

namespace App\Entity;

use App\Repository\BdColecRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=BdColecRepository::class)
 */
class BdColec
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $edition;

    /**
     * @ORM\Column(type="integer")
     */
    private $Tome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Genres::class, inversedBy="bd")
     */
    private $genres;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $add_at;

    //public function __construct(Date $date)
//{
  //  $this->add_at = new \Date('now');
//}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getTome(): ?int
    {
        return $this->Tome;
    }

    public function setTome(int $Tome): self
    {
        $this->Tome = $Tome;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGenres(): ?Genres
    {
        return $this->genres;
    }

    public function setGenres(?Genres $genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getAddAt(): ?\DateTimeImmutable
    {
        return $this->add_at;
    }

    public function setAddAt(\DateTimeImmutable $add_at): self
    {
        $this->add_at = $add_at;

        return $this->setAddAt('now');
    }

}
