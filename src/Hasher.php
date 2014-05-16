<?php
namespace Hasher;

use InvalidArgumentException;

class Hasher
{
    protected $salt;

    protected $hasher;

    public function __construct(HasherInterface $hasher, $salt = null)
    {
        $this->setHasher($hasher)
            ->setSalt($salt);
    }

    public function setSalt($salt)
    {
        if (!is_null($salt)) {
            if (strlen($salt) < 15) {
                throw new InvalidArgumentException('Please enter a salt with length greater then 15.');
            }
        }

        $this->salt = $salt;

        return $this;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setHasher(HasherInterface $hasher)
    {
        $this->hasher = $hasher;

        return $this;
    }

    public function getHasher()
    {
        return $this->hasher;
    }

    public function hash($value)
    {
        return $this->hasher->hash($value, $this->salt);
    }
}