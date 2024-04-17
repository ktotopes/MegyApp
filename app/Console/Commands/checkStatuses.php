<?php

namespace App\Console\Commands;

use App\Models\Payment;
use App\Service\PaymentService;
use Illuminate\Console\Command;

class checkStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:status-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = PaymentService::getClient();

        $payments = Payment::where('status', 'pending')->get();

        foreach ($payments as $payment) {
            $paymentId = $payment->uid;
            $paymentInfo = $client->getPaymentInfo($paymentId);

            if (isset($payment) && $paymentInfo !== $payment->status) {
                $payment->update([
                    'status' => $paymentInfo->status,
                ]);
            }
        }
    }
}
