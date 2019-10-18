<?php
namespace dmsysop\MikrotikApi\Contracts;

interface MikrotikContract
{
    public function connect();

    public function getConnection();

    public function getCredentials();
}