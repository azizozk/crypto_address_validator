<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Ltc as LtcValidator;

class Ltc extends AbstractAddress
{
    protected $validators = [
        Network::LTC => LtcValidator::class,
    ];
}
