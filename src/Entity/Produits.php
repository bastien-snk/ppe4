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
    public $idproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=15, scale=2, nullable=false)
     */
    public $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProduit", type="string", length=50, nullable=false)
     */
    public $nomproduit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    public $quantite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    public $description;

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
    public $evaluations;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     * })
     */
    public $idcategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idvente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public array $images;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
}
