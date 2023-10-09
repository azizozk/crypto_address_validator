<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Ada as AdaValidator;

class Ada extends AbstractAddress
{
    protected $validators = [
        Network::ADA => AdaValidator::class,
    ];
}
