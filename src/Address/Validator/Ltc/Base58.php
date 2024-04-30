<?php

namespace Exads\WalletAddressValidator\Address\Validator\Ltc;

use Exads\WalletAddressValidator\Address\Validator\AbstractBase58;

class Base58 extends AbstractBase58
{
    const DEPRECATED_ADDRESS_VERSION = '05';

    protected $deprecatedAllowed = true;

    protected $base58PrefixToHexVersion = [
        'L' => '30',
        'M' => '32',
        '3' => self::DEPRECATED_ADDRESS_VERSION
    ];

    protected function validateVersion($version): bool
    {
        if ($this->addressVersion === self::DEPRECATED_ADDRESS_VERSION && !$this->deprecatedAllowed) {
            return false;
        }
        return hexdec($version) === hexdec($this->addressVersion);
    }
}