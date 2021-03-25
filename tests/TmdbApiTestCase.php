<?php

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Tests\TestCase;

class TmdbApiTestCase extends TestCase {

    /**
     * Create a new fake GuzzleClient instance.
     *
     * @param MockHandler $mockHandler
     * @return Client
     */
    protected function createFakeClient(MockHandler $mockHandler)
    {
        $handlerStack = HandlerStack::create($mockHandler);
        return new Client([
            'handler' => $handlerStack
        ]);
    }

}
