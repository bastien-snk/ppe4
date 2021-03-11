<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits", indexes={@ORM\Index(name="idCategorie", columns={"idCategorie"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produits
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=15, scale=2, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProduit", type="string", length=50, nullable=false)
     */
    private $nomproduit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @var float
     *
     * @ORM\Column(name="evaluations", type="float", precision=10, scale=0, nullable=false)
     */
    private $evaluations;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     * })
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ventes", inversedBy="idproduit")
     * @ORM\JoinTable(name="comporter",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idVente", referencedColumnName="idVente")
     *   }
     * )
     */
    private $idvente;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idvente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdproduit(): ?int
    {
        return $this->idproduit;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNomproduit(): ?string
    {
        return $this->nomproduit;
    }

    public function setNomproduit(string $nomproduit): self
    {
        $this->nomproduit = $nomproduit;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEvaluations(): ?float
    {
        return $this->evaluations;
    }

    public function setEvaluations(float $evaluations): self
    {
        $this->evaluations = $evaluations;

        return $this;
    }

    public function getIdcategorie(): ?Categories
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(?Categories $idcategorie): self
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * @return Collection|Ventes[]
     */
    public function getIdvente(): Collection
    {
        return $this->idvente;
    }

    public function addIdvente(Ventes $idvente): self
    {
        if (!$this->idvente->contains($idvente)) {
            $this->idvente[] = $idvente;
        }

        return $this;
    }

    public function removeIdvente(Ventes $idvente): self
    {
        $this->idvente->removeElement($idvente);

        return $this;
    }

    private array $images;

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }
}
