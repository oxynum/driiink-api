<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;


#[ORM\Entity(repositoryClass: BarRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['bar']])]
class Bar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("bar")]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("bar")]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("bar")]
    private $picture;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'bars')]
    #[Groups("bar")]
    private $groupe;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups("bar")]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    #[Gedmo\Timestampable(on: 'update')]
    #[Groups("bar")]
    private $updatedAt;

    #[ORM\ManyToMany(targetEntity: Barman::class, mappedBy: 'barOwned')]
    #[Groups("bar")]
    private $barman;

    #[ORM\ManyToOne(targetEntity: Customers::class, inversedBy: 'barFavorite')]
    #[Groups("bar")]
    private $customers;

    #[ORM\OneToMany(mappedBy: 'bar', targetEntity: Menu::class)]
    #[Groups("bar")]
    private $menu;

    public function __construct()
    {
        $this->barman = new ArrayCollection();
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

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


    /**
     * @return Collection<int, Barman>
     */
    public function getbarman(): Collection
    {
        return $this->barman;
    }

    public function addBarman(Barman $barman): self
    {
        if (!$this->barman->contains($barman)) {
            $this->barman[] = $barman;
            $barman->addBarOwned($this);
        }

        return $this;
    }

    public function removeBarman(Barman $barman): self
    {
        if ($this->barman->removeElement($barman)) {
            $barman->removeBarOwned($this);
        }

        return $this;
    }

    public function getCustomers(): ?Customers
    {
        return $this->customers;
    }

    public function setCustomers(?Customers $customers): self
    {
        $this->customers = $customers;

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
            $menu->setBar($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menu->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getBar() === $this) {
                $menu->setBar(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
