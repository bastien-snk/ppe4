<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/checkout/3", name="checkout-step3")
     */
    public function step3(): Response
    {
        return $this->render('checkout/step3.html.twig', [
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
