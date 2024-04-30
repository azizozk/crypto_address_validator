<?php

namespace Exads\WalletAddressValidator\Address\Validator;

use Exads\WalletAddressValidator\Address\AddressInterface;
use Exads\WalletAddressValidator\Address\Validator\Ltc\Base58 as LtcBase58;
use Exads\WalletAddressValidator\Address\Validator\Ltc\Bech32 as LtcBech32;

class Ltc implements ValidatorInterface
{

    private const VALIDATOR_DEFAULT = LtcBase58::class;
    private AddressInterface $address;

    // map prefix to validator class
    private array $prefixes = [
        'ltc1' => LtcBech32::class,
        'tltc1' => LtcBech32::class,
    ];


    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }

    public function validate(): bool
    {
        return $this->validator()->validate();
    }

    private function validator(): ValidatorInterface
    {
        foreach ($this->prefixes as $prefix => $class) {
            if ($this->hasPrefix($this->address->address(), $prefix)) {
                return new $class($this->address);
            }
        }

        $class = self::VALIDATOR_DEFAULT;
        return new $class($this->address);
    }


    private function hasPrefix(string $address, string $prefix): bool
    {
        return substr($address, 0, strlen($prefix)) === $prefix;
    }
}
