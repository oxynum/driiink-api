<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['menu']])]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["menu", "bar"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["menu", "bar"])]
    private $name;

    #[ORM\ManyToMany(targetEntity: Products::class, inversedBy: 'menus')]
    #[Groups("menu")]
    private $product;

    #[ORM\Column(type: 'time_immutable')]
    #[Groups(["menu", "bar"])]
    private $activeAt;

    #[ORM\Column(type: 'time_immutable')]
    #[Groups(["menu", "bar"])]
    private $desactiveAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups(["menu", "bar"])]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'update')]
    #[Groups(["menu", "bar"])]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Bar::class, inversedBy: 'menu')]
    private $bar;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Promotion::class)]
    #[Groups("menu")]
    private $promotion;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Products::class)]
    private $products;


    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->promotion = new ArrayCollection();
        $this->products = new ArrayCollection();
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

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion[] = $promotion;
            $promotion->setMenu($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getMenu() === $this) {
                $promotion->setMenu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }
}
