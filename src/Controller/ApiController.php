<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Produits;
use App\Manager\ProduitManager;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Monolog\Formatter\JsonFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
* Cette classe permet de controller tout ce qui pourra etre obtenu depuis l'api web services
 *
 * Class ApiController
 * @package App\Controller
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api_docs")
     */
    public function index(): Response {
        return $this->render('api/index.html.twig', [
        ]);
    }

    /**
     * @Route("/produits", name="api_produits")
     */
    public function produits(ProduitRepository $produitRepository): Response {
        return $this->toJson($produitRepository->findAll());
    }

    /**
     * @Route("/produits/{id}", name="api_produit")
     */
    public function produit(Produits $produit): Response {
        return $this->toJson($produit);
    }

    /**
     * @Route("/produits/categorie/{id}", name="api_produit_with_categorie")
     */
    public function produitCategorie(Categories $categories, ProduitRepository $produitRepository): Response {
        return $this->toJson(ProduitManager::getProductsByCategory($categories, $produitRepository));
    }

    /**
     * @Route("/categories", name="api_categories")
     */
    public function categories(CategorieRepository $categorieRepository): Response {
        return $this->toJson($categorieRepository->findAll());
    }

    /**
     * @Route("/categories/{id}", name="api_categorie")
     */
    public function categorie(Categories $categories): Response {
        return $this->toJson($categories);
    }

    private function toJson($object) {
        $response = new Response();
        $serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder(), new JsonEncoder()]);
        $response->setContent($serializer->serialize($object, "json"));
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }
}
