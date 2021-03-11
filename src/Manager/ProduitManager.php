<?php


namespace App\Manager;


use App\Entity\Categories;
use App\Entity\Produits;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

class ProduitManager {

    public static function getProducts(ProduitRepository $produitRepository): array {
        $products = $produitRepository->findAll();

        foreach ($products as $product) {
            $dir = getcwd() . "/img/produits/" . $product->getImage();
            $folder = scandir($dir);
            $images = array();
            foreach($folder as $image) {
                if(str_ends_with($image, ".png") || str_ends_with($image, ".jpg")) array_push($images, $image);
            }
            $product->setImages($images);
        }
        return $products;
    }

    public static function getProductsByCategory(Categories $categorie, ProduitRepository $produitRepository): array {
        $products = $produitRepository->findBy($categorie);
        return $products;
    }

}