<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Manager\PanierManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function step2(): Response
    {
        return $this->render('checkout/step2.html.twig', [
        ]);
    }

    /**
     * @Route("/checkout", name="checkout_add")
     */
    public function add(Request $request, SessionInterface $session, Produits $produit): Response
    {
        $produits = $session->get("panier");

        if($produits == null) {
            $this->redirectToRoute("panier_create");
        }

        if(isset($produits[$produit->getIdproduit()])) {
            $produits[$produit->getIdproduit()]["quantite"]++;
        } else {
            $produits[$produit->getIdproduit()] = array("quantite" => 1, "produit" => $produit);
        }

        return $this->redirectToLastRoute($request);

        return $this->render('checkout/step2.html.twig', [
        ]);
    }

    /**
     * @Route("/checkout/3", name="checkout-step3")
     */
    public function step3(SessionInterface $session): Response
    {
        return $this->render('checkout/step3.html.twig', [
            "prix_total" => PanierManager::getTotalPrice($session->get("panier")),
        ]);
    }

    /**
     * @Route("/checkout/4", name="checkout-step4")
     */
    public function step4(): Response
    {
        return $this->render('checkout/step4.html.twig', [
        ]);
    }
}