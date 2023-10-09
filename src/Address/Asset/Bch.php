<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Bch as BchValidator;

class Bch extends AbstractAddress
{
    protected $validators = [
        Network::BCH => BchValidator::class,
    ];
}
