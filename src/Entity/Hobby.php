<?php

namespace App\Entity;

use App\Repository\HobbyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: HobbyRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
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

    #[ORM\ManyToMany(targetEntity: HobbyCategory::class, inversedBy: 'hobbies')]
    private Collection $hobbyCategories;

    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'hobbies')]
    private Collection $users;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $schedule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $frequency = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $priceFor = null;

    #[ORM\OneToMany(mappedBy: 'hobby', targetEntity: HobbyAdditionalInfo::class, cascade: ["persist"], orphanRemoval: true)]
    private Collection $additionalInfo;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[Vich\UploadableField(mapping: 'hobby_images', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->hobbyCategories = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->additionalInfo = new ArrayCollection();
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

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getFrequency(): ?string
    {
        return $this->frequency;
    }

    public function setFrequency(string $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceFor(): ?string
    {
        return $this->priceFor;
    }

    public function setPriceFor(string $priceFor): self
    {
        $this->priceFor = $priceFor;

        return $this;
    }

    /**
     * @return Collection<int, HobbyAdditionalInfo>
     */
    public function getAdditionalInfo(): Collection
    {
        return $this->additionalInfo;
    }

    public function addAdditionalInfo(HobbyAdditionalInfo $additionalInfo): self
    {
        if (!$this->additionalInfo->contains($additionalInfo)) {
            $this->additionalInfo->add($additionalInfo);
            $additionalInfo->setHobby($this);
        }

        return $this;
    }

    public function removeAdditionalInfo(HobbyAdditionalInfo $additionalInfo): self
    {
        if ($this->additionalInfo->removeElement($additionalInfo)) {
            // set the owning side to null (unless already changed)
            if ($additionalInfo->getHobby() === $this) {
                $additionalInfo->setHobby(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
