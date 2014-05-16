<?php

use Hasher\Hasher;
use Hasher\Providers\MD5;

class MD5Test extends \PHPUnit_Framework_TestCase
{
    public function testHash()
    {
        $h = new Hasher(new MD5, '1293n#s0jznhs8jl1');
        $this->assertEquals(
            'acbd18db4cc2f85cedef654fccc4a4d8', 
            $h->hash('foo')
        );

        $this->assertEquals(
            '37b51d194a7513e45b56f6524f2d51f2', 
            $h->hash('bar')
        );
    }

    public function testGetSalt()
    {
        $h = new Hasher(new MD5, '1293n#s0jznhs8jl1');
        $this->assertEquals(
            '1293n#s0jznhs8jl1', 
            $h->getSalt()
        );

        $h->setSalt('juw012.swj20ajd,;qoeu');
        $this->assertEquals(
            'juw012.swj20ajd,;qoeu',
            $h->getSalt()
        );
    }
}