<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BarRepository::class)]
#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'conference:list']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'conference:item']]],
    order: ['id' => 'DESC'],
    paginationEnabled: false,
)]
class Bar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['conference:list', 'conference:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['conference:list', 'conference:item'])]
    private $picture;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'bars')]
    #[Groups(['conference:list', 'conference:item'])]
    private $groupeID;

    #[ORM\OneToMany(mappedBy: 'bar', targetEntity: Products::class)]
    #[Groups(['conference:list', 'conference:item'])]
    private $productID;

    public function __construct()
    {
        $this->productID = new ArrayCollection();
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getGroupeID(): ?Groupe
    {
        return $this->groupeID;
    }

    public function setGroupeID(?Groupe $groupeID): self
    {
        $this->groupeID = $groupeID;

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProductID(): Collection
    {
        return $this->productID;
    }

    public function addProductID(Products $productID): self
    {
        if (!$this->productID->contains($productID)) {
            $this->productID[] = $productID;
            $productID->setBar($this);
        }

        return $this;
    }

    public function removeProductID(Products $productID): self
    {
        if ($this->productID->removeElement($productID)) {
            // set the owning side to null (unless already changed)
            if ($productID->getBar() === $this) {
                $productID->setBar(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
