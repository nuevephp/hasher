<?php
namespace Hasher\Providers;

use Hasher\HasherInterface;

class PBKDF2 implements HasherInterface
{
    protected $iterations = 1000;

    protected $derivedKeyLength = 32;

    protected $algorithm = 'sha256';

    protected $rawOutput = false;

    public function setIterations($iterationsLength)
    {
        $this->iterations = $iterationsLength;
    }

    public function setDerivedKeyLength($keyLength)
    {
        $this->derivedKeyLength = $keyLength;
    }

    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }

    public function setRawOutput($output)
    {
        $this->rawOutput = $output;
    }

    /**
     * Generate a md5 hash of the given string using the provided options.
     *
     * @param string $string A string to generate a secure hash from.
     * @param array $options Ignored. An array of options to be passed to the hash implementation.
     * @return mixed The hash result or false on failure.
     */
    public function hash($string, $salt)
    {
        $derivedKey = false;
        
        $iterations = (integer) $this->iterations;
        $derivedKeyLength = (integer) $this->derivedKeyLength;
        $algorithm = $this->algorithm;

        $hashLength = strlen(hash($algorithm, null, true));
        $keyBlocks = ceil($derivedKeyLength / $hashLength);
        $derivedKey = '';

        for ($block = 1; $block <= $keyBlocks; $block++) {
            $hashBlock = $hb = hash_hmac($algorithm, $salt . pack('N', $block), $string, true);
            
            for ($blockIteration = 1; $blockIteration < $iterations; $blockIteration++) {
                $hashBlock ^= ($hb = hash_hmac($algorithm, $hb, $string, true));
            }

            $derivedKey .= $hashBlock;
        }

        $derivedKey = substr($derivedKey, 0, $derivedKeyLength);

        if (!$this->rawOutput) {
            $derivedKey = base64_encode($derivedKey);
        }

        return $derivedKey;
    }
}