<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("menu")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("menu")]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("menu")]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups("menu")]
    private $pourcentageDiscount;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups("menu")]
    private $fixedDiscount;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'promotion')]
    private $menu;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups("menu")]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Gedmo\Timestampable(on: 'update')]
    #[Groups("menu")]
    private $updatedAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups("menu")]
    private $activeAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups("menu")]
    private $deactivateAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups("menu")]
    private $expirationDate;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPourcentageDiscount(): ?int
    {
        return $this->pourcentageDiscount;
    }

    public function setPourcentageDiscount(?int $pourcentageDiscount): self
    {
        $this->pourcentageDiscount = $pourcentageDiscount;

        return $this;
    }

    public function getFixedDiscount(): ?int
    {
        return $this->fixedDiscount;
    }

    public function setFixedDiscount(?int $fixedDiscount): self
    {
        $this->fixedDiscount = $fixedDiscount;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getActiveAt(): ?\DateTimeImmutable
    {
        return $this->activeAt;
    }

    public function setActiveAt(\DateTimeImmutable $activeAt): self
    {
        $this->activeAt = $activeAt;

        return $this;
    }

    public function getDeactivateAt(): ?\DateTimeImmutable
    {
        return $this->deactivateAt;
    }

    public function setDeactivateAt(\DateTimeImmutable $deactivateAt): self
    {
        $this->deactivateAt = $deactivateAt;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeImmutable $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }
}
