<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 17/04/2017
 * Time: 22:03
 */

namespace dmsysop\MikrotikApi\Commands;

use dmsysop\MikrotikApi\Entity\Accounting;
use dmsysop\MikrotikApi\Entity\Address;
use dmsysop\MikrotikApi\Entity\Arp;

/**
 * Class IP
 * @package MiKontrol\Http\MikrotikApi\Commands
 */
class Ip extends Command
{

    /**
     * @var string
     */
    protected $base_command = '/ip';

    protected $commands = [
        'address' => Address::class,
        'arp' => Arp::class,
        'accounting' => Accounting::class
    ];

    public function address()
    {
        return $this->__call("address", null);
    }

    public function arp()
    {
        return $this->__call("arp", null);
    }

}