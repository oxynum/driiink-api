<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmPaymentIntentController extends AbstractController
{
    public function confirmPaymentIntent(Request $request): JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        $stripe = new \Stripe\StripeClient(
            $this->getParameter('stripe_sk_key')

        );
        $stripe->paymentIntents->confirm(
            $body['paymentIntentID'],
            ['payment_method' => $body['paymentMethodID']]
        );
    }
}
