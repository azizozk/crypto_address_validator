<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Doge as DogeValidator;

class Doge extends AbstractAddress
{
    protected $validators = [
        Network::DOGE => DogeValidator::class,
    ];
}
