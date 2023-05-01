<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PaymentLinkControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Http::fake([
            'https://api.stripe.com/v1/checkout/sessions' => Http::response([
                'url' => 'https://checkout.stripe.com/c/pay/cs_test_c1SzJ0ZdvxWCIrO2Uk0IrL8UfBHGmzPbdoCMqwwMlLMpZl1NitcOuL1xAD#fidkdWxOYHwnPyd1blpxYHZxWjA0SH9rNU9HbF1iTGhpcmJDd1Njf1BWS3RtYGprdVJsQkJWbzdnYnRfPWxodldoSG1IfE5RUTxDTUtsXFJAa0N3PWFvMXVGc0Azf09Xd200NXMwN2QxcGlRNTV0dH1XcVZKdCcpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBaZmppcGhrJyknYGtkZ2lgVWlkZmBtamlhYHd2Jz9xd3BgeCUl'
            ])
        ]);
    }

    /**
     * @test
     */
    public function shouldGetSuccessAndUrl(): void
    {
        $response = $this->get('/api/payment/link?price=100&currency=usd');
        $response->assertStatus(200)
            ->assertJson([
                'status' => 200,
                'message' => 'success',
            ]);

        $this->assertTrue(filter_var($response['data']['url'], FILTER_VALIDATE_URL) !== false);
    }
}