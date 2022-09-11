<?php

namespace App\Entity;

use App\Repository\HobbyAdditionalInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HobbyAdditionalInfoRepository::class)]
class HobbyAdditionalInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $info = null;

    #[ORM\ManyToOne(inversedBy: 'additionalInfo')]
    private ?Hobby $hobby = null;

    public function __toString(): string
    {
        return $this->info;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getHobby(): ?Hobby
    {
        return $this->hobby;
    }

    public function setHobby(?Hobby $hobby): self
    {
        $this->hobby = $hobby;

        return $this;
    }
}
