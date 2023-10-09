<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\TRC20 as TrxValidator;

class Btt extends AbstractAddress
{
    protected $networkAlias = [
        self::BTT => Network::TRC20,
        self::TRX => Network::TRC20,
    ];

    protected $validators = [
        Network::TRC20 => TrxValidator::class,
    ];
}
