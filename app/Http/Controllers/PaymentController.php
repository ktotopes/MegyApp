<?php

namespace App\Http\Controllers;

use App\Enum\PaymentStatus;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\PaymentResource;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Service\PaymentService;
use Illuminate\Http\Resources\Json\JsonResource;
use YooKassa\Client;
use YooKassa\Common\Exceptions\ApiConnectionException;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\AuthorizeException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class PaymentController extends Controller
{
    /**
     * @throws NotFoundException
     * @throws ApiException
     * @throws ResponseProcessingException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws AuthorizeException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws ApiConnectionException
     * @throws UnauthorizedException
     */
    public function createPayment(Order $order): JsonResponse
    {
        $client = PaymentService::getClient();

        $idempotenceKey = uniqid('', true);
        $response = $client->createPayment(
            [
                'amount' => [
                    'value' => $order->price,
                    'currency' => 'RUB',
                ],
                'payment_method_data' => [
                    'type' => 'bank_card',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => 'https://www.example.com/return_url',
                ],
                'description' => str()->random(10),
            ],
            $idempotenceKey,
        );

        if ($response) {
            $payment = new Payment([
                'order_id' => $order->id,
                'uid' => $response->id,
                'account_id' => $response->recipient->account_id,
                'gateway_id' => $response->recipient->gateway_id,
                'status' => $response->status,
                'amount' => $response->amount->value,
                'currency' => $response->amount->currency,
                'description' => $response->description,
                'test' => $response->test,
                'paid' => $response->paid,
                'refundable' => $response->refundable,
                'metadata' => $response->metadata,
                'payment_method' => $response->paymentMethod,
                'authorization_details' => $response->authorizationDetails,
                'confirmation' => $response->confirmation,
                'expires_at' => $response->expiresAt,
                'created_at' => $response->created_at,
            ]);

            $payment->save();
        }

        return response()->json([
            'confirmation_url' => $response->confirmation->confirmationUrl,
        ]);
    }

    /**
     * @throws NotFoundException
     * @throws ApiException
     * @throws ResponseProcessingException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function getPayment(Payment $payment): JsonResponse
    {
        $client = PaymentService::getClient();

        $paymentInfo = $client->getPaymentInfo($payment->uid);

        if ($paymentInfo?->status !== $payment->status) {
            $payment->update([
                'status' => PaymentStatus::tryFrom($paymentInfo->status),
            ]);
        }

        return response()->json(new PaymentResource($payment));
    }
}
