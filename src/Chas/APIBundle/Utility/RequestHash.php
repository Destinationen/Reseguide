<?php

namespace Chas\APIBundle\Utility;

use Symfony\Component\HttpFoundation\Request;

class RequestHash
{
    public static function getHash()
    {
        $request = Request::createFromGlobals();
        $return = $request->getPathInfo();
        
        return sha1($return);
    }
}
