<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: OrderStatus::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $statusID;

    #[ORM\ManyToMany(targetEntity: Products::class)]
    private $productID;

    #[ORM\ManyToOne(targetEntity: Customers::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $customerID;

    public function __construct()
    {
        $this->productID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusID(): ?OrderStatus
    {
        return $this->statusID;
    }

    public function setStatusID(?OrderStatus $statusID): self
    {
        $this->statusID = $statusID;

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
        }

        return $this;
    }

    public function removeProductID(Products $productID): self
    {
        $this->productID->removeElement($productID);

        return $this;
    }

    public function getCustomerID(): ?Customers
    {
        return $this->customerID;
    }

    public function setCustomerID(?Customers $customerID): self
    {
        $this->customerID = $customerID;

        return $this;
    }
}
