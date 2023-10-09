<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\TRC20 as TrxValidator;

class Trx extends AbstractAddress
{
    protected $networkAlias = [
        self::TRX => Network::TRC20,
    ];

    protected $validators = [
        Network::TRC20 => TrxValidator::class,
    ];
}
