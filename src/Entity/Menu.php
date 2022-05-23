<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ApiResource]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("bar")]
    private $name;

    #[ORM\ManyToMany(targetEntity: Products::class, inversedBy: 'menus')]
    #[Groups("bar")]
    private $product;

    #[ORM\Column(type: 'time_immutable')]
    #[Groups("bar")]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'H:m:s'])]
    private $activeAt;

    #[ORM\Column(type: 'time_immutable')]
    #[Groups("bar")]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'H:m:s'])]
    private $desactiveAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups("bar")]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd/m/Y H:m:s'])]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'update')]
    #[Groups("bar")]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd/m/Y H:m:s'])]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Bar::class, inversedBy: 'menu')]
    private $bar;


    public function __construct()
    {
        $this->product = new ArrayCollection();
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
     * @return Collection<int, Products>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        $this->product->removeElement($product);

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }


    public function getBar(): ?Bar
    {
        return $this->bar;
    }

    public function setBar(?Bar $bar): self
    {
        $this->bar = $bar;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getDesactiveAt(): ?\DateTimeImmutable
    {
        return $this->desactiveAt;
    }

    public function setDesactiveAt(\DateTimeImmutable $desactiveAt): self
    {
        $this->desactiveAt = $desactiveAt;

        return $this;
    }
}
