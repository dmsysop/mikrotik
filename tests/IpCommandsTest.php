<?php

/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 19/04/2017
 * Time: 04:45
 */

use dmsysop\MikrotikApi\Commands\Ip;
use dmsysop\MikrotikApi\Core\Collection;
use dmsysop\MikrotikApi\Core\QueryBuilder;
use Orchestra\Testbench\TestCase;
use dmsysop\MikrotikApi\Facades\MikrotikFacade as Mikrotik;

class IpCommandsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [dmsysop\MikrotikApi\MikrotikServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Mikrotik' => dmsysop\MikrotikApi\Facades\MikrotikFacade::class
        ];
    }

    public function getConn()
    {
        $client = Mikrotik::connect(['192.168.0.20', 'admin', '']);
        return $client;
    }

    public function test_if_command_works()
    {
        $this->assertInstanceOf(Ip::class, new Ip($this->getConn()));
    }

    public function test_if_command_address_exists()
    {
        $ipcomm = new Ip($this->getConn());
        $this->assertInstanceOf(QueryBuilder::class, $ipcomm->address());
    }

    public function test_arp_method()
    {
        $ipcomm = new Ip($this->getConn());
        $this->assertInstanceOf(QueryBuilder::class, $ipcomm->arp());
    }

    public function test_accounting_method()
    {
        $ipcomm = new Ip($this->getConn());
        $this->assertInstanceOf(Collection::class, $ipcomm->accounting()->all());
    }
}