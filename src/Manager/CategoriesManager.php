<?php


namespace App\Manager;


use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;

class CategoriesManager {

    public static function getCategories(CategorieRepository $categorieRepository): array {
        return $categorieRepository->findAll();
    }

}