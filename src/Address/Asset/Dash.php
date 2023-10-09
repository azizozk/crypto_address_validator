<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Dash as DashValidator;

class Dash extends AbstractAddress
{
    protected $validators = [
        Network::DASH => DashValidator::class,
    ];
}
