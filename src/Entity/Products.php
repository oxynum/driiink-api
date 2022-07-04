<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['product']])]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["menu", "product", "order"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["menu", "product", "order"])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["menu", "product", "order"])]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["menu", "product", "order"])]
    private $price;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(["menu", "product", "order"])]
    private $picture;

    #[ORM\ManyToMany(targetEntity: Ingredient::class, inversedBy: 'products')]
    #[Groups(["menu", "product", "order"])]
    private $ingredient;

    #[ORM\Column(type: 'time')]
    #[Groups(["menu", "product", "order"])]
    private $prepTime;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups(["menu", "product", "order"])]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'update')]
    #[Groups(["menu", "product", "order"])]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: ProductCategory::class, inversedBy: 'products')]
    #[Groups(["menu", "product", "order"])]
    private $category;

    #[ORM\ManyToMany(targetEntity: Menu::class, inversedBy: 'products')]
    private $menu;




    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->menu = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection<int, Ingredient>
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredient->removeElement($ingredient);

        return $this;
    }


    public function __toString(): string
    {
        return $this->getName();
    }

    public function getPrepTime(): ?\DateTimeInterface
    {
        return $this->prepTime;
    }

    public function setPrepTime(\DateTimeInterface $prepTime): self
    {
        $this->prepTime = $prepTime;

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

    public function getCategory(): ?ProductCategory
    {
        return $this->category;
    }

    public function setCategory(?ProductCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menu->contains($menu)) {
            $this->menu[] = $menu;
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        $this->menu->removeElement($menu);

        return $this;
    }

}
