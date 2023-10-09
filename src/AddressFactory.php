<?php

namespace Exads\WalletAddressValidator;

use Exads\WalletAddressValidator\Address\AddressInterface;

class AddressFactory
{
    public static function create(string $symbol, string $network, string $address): AddressInterface
    {
        $class  = '\Exads\WalletAddressValidator\Address\Asset\\' . ucfirst(strtolower($symbol));

        if (! class_exists($class)) {
            throw new \OutOfBoundsException("Address class: {$class} could not found.");
        }

        return new $class($symbol, $network, $address);
    }
}
