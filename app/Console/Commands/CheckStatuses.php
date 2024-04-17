<?php

namespace App\Console\Commands;

use App\Enum\PaymentStatus;
use App\Models\Payment;
use App\Service\PaymentService;
use Illuminate\Console\Command;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class CheckStatuses extends Command
{
    protected $signature = 'payments:status-check';

    protected $description = 'Command description';

    /**
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws ApiException
     * @throws ExtensionNotFoundException
     * @throws BadApiRequestException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function handle(): void
    {
        $client = PaymentService::getClient();

        $payments = Payment::whereIn('status',[PaymentStatus::Pending,PaymentStatus::WaitingForCapture])->get();

        foreach ($payments as $payment) {

            $paymentInfo = $client->getPaymentInfo($payment->uid);

            if ($paymentInfo?->status !== $payment->status) {
                $payment->update([
                    'status' => PaymentStatus::tryFrom($paymentInfo->status),
                ]);
            }
        }
    }
}
