<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Btg as BtgValidator;

class Btg extends AbstractAddress
{
    protected $validators = [
        Network::BTG => BtgValidator::class,
    ];
}
