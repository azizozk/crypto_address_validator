<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Xmr as XmrValidator;

class Xmr extends AbstractAddress
{
    protected $validators = [
        Network::XMR => XmrValidator::class,
    ];
}
