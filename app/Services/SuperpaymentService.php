<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SuperpaymentService
{
    protected $apiKey;
    protected $baseUrl;
    protected $brandId;
    protected $currency;

    public function __construct()
    {
        $this->apiKey   = config('services.superpayment.api_key');
        $this->baseUrl  = config('services.superpayment.base_url');
        $this->brandId  = config('services.superpayment.brand_id');
        $this->currency = 'GBP';
    }

    public function calculateReward($amount)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey,
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post($this->baseUrl . '/2024-02-01/reward-calculations', [
            'amount' => $amount,
            'brandId' => $this->brandId,
            'currency' => $this->currency,
        ]);

        return $response->json();
    }

    public function initiatePayment($data)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey,
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post($this->baseUrl . '/2024-02-01/payments', $data);

        return $response->json();
    }

    public function processRefund($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'APIKEY ' . $this->apiKey,
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post($this->baseUrl . '/2024-02-01/refunds', $data);

        return $response->json();
    }

    public function getRewardConfiguration($brandId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'APIKEY ' . $this->apiKey,
            'accept' => 'application/json',
        ])->get($this->baseUrl . "/2024-02-01/brands/{$brandId}/reward-configuration");

        return $response->json();
    }

    public function updateRewardConfiguration($brandId, $data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'APIKEY ' . $this->apiKey,
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->put($this->baseUrl . "/2024-02-01/brands/{$brandId}/reward-configuration", $data);

        return $response->json();
    }
}
