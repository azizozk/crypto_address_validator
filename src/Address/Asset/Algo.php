<?php

namespace WalletAddressValidator\Address\Asset;

use WalletAddressValidator\Address\AbstractAddress;
use WalletAddressValidator\Address\Network;
use WalletAddressValidator\Address\Validator\Algo as AlgoValidator;

class Algo extends AbstractAddress
{
    protected $networkAlias = [
        self::ALGO => Network::ALGO,
    ];

    protected $validators = [
        Network::ALGO => AlgoValidator::class
    ];
}
