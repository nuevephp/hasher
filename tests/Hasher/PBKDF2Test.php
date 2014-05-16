<?php

use Hasher\Hasher;
use Hasher\Providers\PBKDF2;

class PBKDF2Test extends \PHPUnit_Framework_TestCase
{
    public function testHashing()
    {
        $h = new Hasher(new PBKDF2, '1293n#s0jznhs8jl1');
        $this->assertEquals(
            'ccaXQw9OnF74Gj0DflJW5DzR+T80JlVkHPUKIXWPmlM=', 
            $h->hash('foo')
        );

        $this->assertEquals(
            'yaWx/vD2zFOCA/YPo6GeSEyu51AGFjVPbaQPltxt/4o=', 
            $h->hash('bar')
        );
    }

    public function testGetSalt()
    {
        $h = new Hasher(new PBKDF2, '1293n#s0jznhs8jl1');
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