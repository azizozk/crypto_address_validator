<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Xem as XemValidator;

class Xem extends AbstractAddress
{
    protected $validators = [
        Network::XEM => XemValidator::class,
    ];
}
