<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreatePaymentIntentController extends AbstractController
{

    public function createPaymentIntent(Request $request): JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        $stripe = new \Stripe\StripeClient(
            $this->getParameter('stripe_sk_key')
        );

        return new JsonResponse(
            $stripe->paymentIntents->create([
                'amount' => $body['price'],
                'currency' => 'eur',
                'payment_method_types' => ['card'],
            ])
        );
    }
}
