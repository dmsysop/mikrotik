<?php

namespace dmsysop\MikrotikApi\Contracts;


interface ClientContract
{
    function close();
    function isConnected();
    function api();
    function write($command, $params = true);
    function read($pretty = true);
}