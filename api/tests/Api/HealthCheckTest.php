<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

final class HealthCheckTest extends ApiTestCase
{
    public function testHealthEndpointReturnsOkStatus(): void
    {
        static::createClient()->request('GET', '/health');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');
        $this->assertJsonContains([
            'status' => 'ok',
        ]);
    }
}
