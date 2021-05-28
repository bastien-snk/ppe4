<?php


namespace App\Manager;


use App\Entity\Categories;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;

class CategoriesManager {

    public static function getCategories(CategorieRepository $categorieRepository): array {
        return $categorieRepository->findAll();
    }

    public static function getProduitsOfCategorie(ProduitRepository $produitRepository, Categories $categories) {
        return $produitRepository->findBy($categories);
    }

}