<?php
namespace Hasher\Providers;

use Hasher\HasherInterface;

class MD5 implements HasherInterface
{
    public function hash($string, $salt = null)
    {
        return md5($string);
    }
}