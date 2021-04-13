<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Manager\PanierManager;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{

    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session): Response {
        $produits = $session->get("panier");

        if($produits == null) {
            $this->redirectToRoute("panier_create");
        }

        return $this->render('panier/index.html.twig', [
            "produits" => $produits,
            "prix_total" => PanierManager::getTotalPrice($produits),
        ]);
    }

    /**
     * @Route("/panier/create", name="panier_create")
     * @return Response
     */
    public function create(Request $request, SessionInterface $session): Response {
        $session->set("panier", []);
        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/panier/reset", name="panier_reset")
     * @param Request $request
     * @param SessionInterface $session
     * @return Response
     */
    public function reset(Request $request, SessionInterface $session): Response {
        $session->set("panier", []);
        return $this->redirectToRoute("panier");
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     * @param Request $request
     * @return Response
     */
    public function add(Request $request, SessionInterface $session, Produits $produit): Response {
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
    }

    /**
     * @Route("/panier/remove/{id}", name="panier_remove")
     * @param Request $request
     * @param SessionInterface $session
     * @param Produits $produit
     * @return Response
     */
    public function delete(Request $request, SessionInterface $session, Produits $produit): Response {
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
    }

    public function redirectToLastRoute(Request $request) {
        $this->redirect($request->server->get('HTTP_REFERER'));
    }
}
