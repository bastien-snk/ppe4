<?php


namespace App\Manager;


use App\Entity\Produits;
use App\Entity\Ventes;
use App\Repository\VentesRepository;

class VenteManager {

    public static function createVente(): Ventes {
        $date = getdate();
        var_dump($date);
        $vente = new Ventes();
        $vente->setIdclient();
        $vente->setIdagent();
        $vente->setDatevente();
        return $vente;
    }

    public static function addProduct(Ventes $vente, Produits $produit) {
        if($vente == null) $vente = VenteManager::createVente();
        $vente->addIdproduit($produit);
    }

}