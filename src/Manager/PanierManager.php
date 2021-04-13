<?php


namespace App\Manager;


class PanierManager {

    public static function getTotalPrice($produits): int {
        $prix_total = 0;

        if($produits == null) return 0;

        foreach($produits as $produit_data) {
            $quantite = $produit_data["quantite"];
            $prix_unitaire = $produit_data["produit"]->getPrix();
            $prix_total += $prix_unitaire * $quantite;
        }

        return $prix_total;
    }

}