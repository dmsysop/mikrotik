<?php

namespace dmsysop\MikrotikApi\Contracts;


use dmsysop\MikrotikApi\Core\Client;

interface CommandContract
{
    public function get();

    public function remove($id);

    public function find($attribute, $value = null);

    public function getBaseCommand();

    public static function bind(Client $client);
}