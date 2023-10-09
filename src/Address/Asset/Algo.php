<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Algo as AlgoValidator;

class Algo extends AbstractAddress
{
    protected $networkAlias = [
        self::ALGO => Network::ALGO,
    ];

    protected $validators = [
        Network::ALGO => AlgoValidator::class
    ];
}
