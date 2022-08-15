<?php

namespace App\Entity;

use App\Repository\HobbyFamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HobbyFamilyRepository::class)]
class HobbyFamily
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'hobbyFamilies', targetEntity: HobbyCategory::class)]
    private Collection $hobbyCategories;

    public function __construct()
    {
        $this->hobbyCategories = new ArrayCollection();
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
     * @return Collection<int, HobbyCategory>
     */
    public function getHobbyCategories(): Collection
    {
        return $this->hobbyCategories;
    }

    public function addHobbyCategory(HobbyCategory $hobbyCategory): self
    {
        if (!$this->hobbyCategories->contains($hobbyCategory)) {
            $this->hobbyCategories->add($hobbyCategory);
            $hobbyCategory->setHobbyFamilies($this);
        }

        return $this;
    }

    public function removeHobbyCategory(HobbyCategory $hobbyCategory): self
    {
        if ($this->hobbyCategories->removeElement($hobbyCategory)) {
            // set the owning side to null (unless already changed)
            if ($hobbyCategory->getHobbyFamilies() === $this) {
                $hobbyCategory->setHobbyFamilies(null);
            }
        }

        return $this;
    }
}
