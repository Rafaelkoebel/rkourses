<?php

namespace App\Entity;

use App\Repository\ProduitReferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitReferenceRepository::class)]
class ProduitReference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nomProduit = null;

    #[ORM\Column(nullable: true)]
    private ?int $mini = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxi = null;

    #[ORM\ManyToOne(inversedBy: 'produitReferences')]
    private ?Rayon $rayon = null;

    #[ORM\OneToMany(mappedBy: 'produitReference', targetEntity: Stock::class)]
    private Collection $stocks;

    public function __construct()
    {
        $this->stocks = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getMini(): ?int
    {
        return $this->mini;
    }

    public function setMini(?int $mini): self
    {
        $this->mini = $mini;

        return $this;
    }

    public function getMaxi(): ?int
    {
        return $this->maxi;
    }

    public function setMaxi(?int $maxi): self
    {
        $this->maxi = $maxi;

        return $this;
    }

    public function getRayon(): ?Rayon
    {
        return $this->rayon;
    }

    public function setRayon(?Rayon $rayon): self
    {
        $this->rayon = $rayon;

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks->add($stock);
            $stock->setProduitReference($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getProduitReference() === $this) {
                $stock->setProduitReference(null);
            }
        }

        return $this;
    }

}
