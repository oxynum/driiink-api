<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreatePaymentMethodController extends AbstractController
{
    public function createPaymentMethod(Request $request): JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        $stripe = new \Stripe\StripeClient(
            $this->getParameter('stripe_sk_key')
        );
        return new JsonResponse(
            $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $body['ccn'],
                    'exp_month' => $body['exp_month'],
                    'exp_year' => $body['exp_year'],
                    'cvc' => $body['cvc'],
                ],
            ])
        );
    }
}
