<?php

namespace Chas\APIBundle\Utility;

use Symfony\Component\HttpFoundation\Request;

class RequestHash
{
    public static function getHash($url = null)
    {
        if ($url == null){
            $request = Request::createFromGlobals();
            $return = $request->getPathInfo();
        } else {
            $return = $url;
        }
        return sha1($return);
    }
}
