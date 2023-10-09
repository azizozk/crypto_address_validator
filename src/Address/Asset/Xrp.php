<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Xrp as XrpValidator;

class Xrp extends AbstractAddress
{
    protected $validators = [
        Network::XRP => XrpValidator::class,
    ];
}
