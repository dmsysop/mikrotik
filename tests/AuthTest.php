<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 18/04/2017
 * Time: 05:05
 */

namespace dmsysop\MikrotikApi\Tests;

use dmsysop\MikrotikApi\Core\Client;
use dmsysop\MikrotikApi\Exceptions\ConnectionException;
use dmsysop\MikrotikApi\Facades\MikrotikFacade as Mikrotik;
use dmsysop\MikrotikApi\Tests\Traits\CreateApplication;
use Orchestra\Testbench\TestCase;


class AuthTest extends TestCase
{
    use CreateApplication;

    private $client;

    private $mikrotik;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mikrotik = Mikrotik::connect();

        $this->client = $this->mikrotik->getClient();
    }

    public function test_if_connection_returns_client_instance()
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }

    public function test_if_throws_connection_exception()
    {
        $this->expectException(ConnectionException::class);

        (new \dmsysop\MikrotikApi\Mikrotik(config('mikrotik.auth.host'), 'wronguser'))->connect();

    }

    public function test_getting_credentials()
    {
        $this->assertIsArray($this->mikrotik->getCredentials());

        $this->assertTrue(in_array('admin', $this->mikrotik->getCredentials()));
    }

}
