<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Zec as ZecValidator;

class Zec extends AbstractAddress
{
    protected $validators = [
        Network::ZEC => ZecValidator::class,
    ];
}
