<?php
namespace Hasher;

interface HasherInterface
{
    public function hash($value, $salt);
}