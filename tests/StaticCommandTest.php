<?php

/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 19/04/2017
 * Time: 07:26
 */

namespace dmsysop\MikrotikApi\Tests;

use dmsysop\MikrotikApi\Core\Client;
use dmsysop\MikrotikApi\Facades\MikrotikFacade as Mikrotik;
use dmsysop\MikrotikApi\Tests\Traits\CreateApplication;
use Orchestra\Testbench\TestCase;

class StaticCommandTest extends TestCase
{
    use CreateApplication;
    
    /** @test **/
    public function it_a_client_mikrotik_instance()
    {
        $this->assertInstanceOf(Client::class, Mikrotik::connect()->getClient());
    }
}
