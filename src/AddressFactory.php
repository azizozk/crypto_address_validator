<?php

namespace WalletAddressValidator;

use WalletAddressValidator\Address\AddressInterface;

class AddressFactory
{
    public static function create(string $symbol, string $network, string $address): AddressInterface
    {
        $class  = '\WalletAddressValidator\Address\Asset\\' . ucfirst(strtolower($symbol));
        if (openlog('DEBUG', LOG_PID, LOG_LOCAL3)) {
            $logData = [
                'class' => $class
            ];
            syslog(LOG_NOTICE, json_encode($logData, JSON_PRETTY_PRINT));

            closelog();
        }

        if (! class_exists($class)) {
            throw new \OutOfBoundsException("Address class: {$class} could not found.");
        }

        return new $class($symbol, $network, $address);
    }
}
