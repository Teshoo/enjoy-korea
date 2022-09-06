<?php

namespace App\Entity;

use App\Repository\HobbyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HobbyRepository::class)]
class Hobby
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hangeul_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone_nb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gps_coordinates = null;

    #[ORM\ManyToMany(targetEntity: HobbyCategory::class, mappedBy: 'hobbies')]
    private Collection $hobbyCategories;

    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'hobbies')]
    private Collection $users;

    public function __construct()
    {
        $this->hobbyCategories = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getHangeulName(): ?string
    {
        return $this->hangeul_name;
    }

    public function setHangeulName(?string $hangeul_name): self
    {
        $this->hangeul_name = $hangeul_name;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getPhoneNb(): ?string
    {
        return $this->phone_nb;
    }

    public function setPhoneNb(?string $phone_nb): self
    {
        $this->phone_nb = $phone_nb;

        return $this;
    }

    public function getGpsCoordinates(): ?string
    {
        return $this->gps_coordinates;
    }

    public function setGpsCoordinates(?string $gps_coordinates): self
    {
        $this->gps_coordinates = $gps_coordinates;

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
            $hobbyCategory->addHobby($this);
        }

        return $this;
    }

    public function removeHobbyCategory(HobbyCategory $hobbyCategory): self
    {
        if ($this->hobbyCategories->removeElement($hobbyCategory)) {
            $hobbyCategory->removeHobby($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addHobby($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeHobby($this);
        }

        return $this;
    }
}
