<?php

namespace Exads\WalletAddressValidator\Address\Validator;

use Exads\WalletAddressValidator\Address\AddressInterface;
use Exads\WalletAddressValidator\Address\Validator\Codec\Keccak;

class ERC20 implements ValidatorInterface
{
    /** @var AddressInterface */
    protected $address;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }

    public function validate(): bool
    {
        if ($this->isPatternMatch() === false) {
            return false;
        }

        if ($this->isCaseMatch()) {
            return true;
        }

        return $this->verifyChecksum(substr($this->address->address(), 2));
    }


    protected function isPatternMatch(): bool
    {
        return preg_match('/^(0x)?[0-9a-f]{40}$/i', $this->address->address()) > 0;
    }

    protected function isCaseMatch(): bool
    {
        $address = ltrim($this->address->address(), 'x0');
        return strtolower($address) === $address || strtoupper($address) === $address;
    }

    private static function verifyChecksum($address): int
    {
        $addressHash = Keccak::hash(strtolower($address), 256);
        $addressArray = str_split($address);
        $addressHashArray = str_split($addressHash);

        for ($i = 0; $i < 40; $i++) {
            // the nth letter should be uppercase if the nth digit of casemap is 1
            if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) ||
                (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
                return false;
            }
        }

        return true;
    }
}
