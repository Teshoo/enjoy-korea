<?php

namespace App\Entity;

use App\Repository\HobbyCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HobbyCategoryRepository::class)]
class HobbyCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Hobby::class, inversedBy: 'hobbyCategories')]
    private Collection $hobbies;

    #[ORM\ManyToOne(inversedBy: 'hobbyCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?HobbyFamily $hobbyFamilies = null;

    public function __construct()
    {
        $this->hobbies = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
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

    /**
     * @return Collection<int, Hobby>
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobby $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies->add($hobby);
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        $this->hobbies->removeElement($hobby);

        return $this;
    }

    public function getHobbyFamilies(): ?HobbyFamily
    {
        return $this->hobbyFamilies;
    }

    public function setHobbyFamilies(?HobbyFamily $hobbyFamilies): self
    {
        $this->hobbyFamilies = $hobbyFamilies;

        return $this;
    }
}
