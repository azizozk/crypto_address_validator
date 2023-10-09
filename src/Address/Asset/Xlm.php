<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Xlm as XlmValidator;

class Xlm extends AbstractAddress
{
    protected $validators = [
        Network::XLM => XlmValidator::class,
    ];
}
