<?php

namespace App\Entity;

use App\Repository\RayonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RayonRepository::class)]
class Rayon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nomRayon = null;

    #[ORM\Column(nullable: true)]
    private ?int $carrefour = null;

    #[ORM\Column(nullable: true)]
    private ?int $lidl = null;

    #[ORM\Column(nullable: true)]
    private ?int $auchan = null;

    #[ORM\Column(nullable: true)]
    private ?int $leclerc = null;

    #[ORM\OneToMany(mappedBy: 'rayon', targetEntity: ProduitReference::class)]
    private Collection $produitReferences;

    public function __construct()
    {
        $this->produitReferences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRayon(): ?string
    {
        return $this->nomRayon;
    }

    public function setNomRayon(string $nomRayon): self
    {
        $this->nomRayon = $nomRayon;

        return $this;
    }

    public function getCarrefour(): ?int
    {
        return $this->carrefour;
    }

    public function setCarrefour(?int $carrefour): self
    {
        $this->carrefour = $carrefour;

        return $this;
    }

    public function getLidl(): ?int
    {
        return $this->lidl;
    }

    public function setLidl(?int $lidl): self
    {
        $this->lidl = $lidl;

        return $this;
    }

    public function getAuchan(): ?int
    {
        return $this->auchan;
    }

    public function setAuchan(?int $auchan): self
    {
        $this->auchan = $auchan;

        return $this;
    }

    public function getLeclerc(): ?int
    {
        return $this->leclerc;
    }

    public function setLeclerc(?int $leclerc): self
    {
        $this->leclerc = $leclerc;

        return $this;
    }

    /**
     * @return Collection<int, ProduitReference>
     */
    public function getProduitReferences(): Collection
    {
        return $this->produitReferences;
    }

    public function addProduitReference(ProduitReference $produitReference): self
    {
        if (!$this->produitReferences->contains($produitReference)) {
            $this->produitReferences->add($produitReference);
            $produitReference->setRayon($this);
        }

        return $this;
    }

    public function removeProduitReference(ProduitReference $produitReference): self
    {
        if ($this->produitReferences->removeElement($produitReference)) {
            // set the owning side to null (unless already changed)
            if ($produitReference->getRayon() === $this) {
                $produitReference->setRayon(null);
            }
        }

        return $this;
    }


}
