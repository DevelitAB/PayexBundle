<?php

namespace Bsadnu\PayexBundle\Utils;

/**
 * Helper util for creating hash.
 */
class PayexHash
{
    private $md5;

    public function __construct(bool $md5)
    {
        if ($md5 == false) {
            $this->md5 = false;
        } else {
            $this->md5 = true;
        }
    }

    /**
     * Returns the input array with addition of calculated hash.
     *
     * @param array $paramArray an array with empty hash key.
     * @param string $encryptionKey the encryption key used to make the hash.
     * @return array an array with the same values as $paramArray with the addition of 'hash'.
     */
    public function createHash(array $paramArray, string $encryptionKey): array
    {
        if ($this->md5) {
            return $this->createMD5($paramArray, $encryptionKey);
        } else {
            return $this->createSHA1($paramArray, $encryptionKey);
        }
    }


    private function createMD5(array $paramArray, string $encryptionKey): array
    {
        $param = $paramArray;

        $stringToHash = implode("", $param);
        $stringToHash .= $encryptionKey;
        $hash = md5($stringToHash);

        $param['hash'] = $hash;

        return $param;

    }

    private function createSHA1(array $paramArray, string $encryptionKey): array
    {
        $param = $paramArray;

        $stringToHash = implode("", $param);
        $stringToHash .= $encryptionKey;
        $hash = sha1($stringToHash);

        $param['hash'] = $hash;

        return $param;
    }
}