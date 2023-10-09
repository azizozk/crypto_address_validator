<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Sol as SolValidator;

class Sol extends AbstractAddress
{
    protected $networkAlias = [
        self::SOL => Network::SOL,
    ];

    protected $validators = [
        Network::SOL => SolValidator::class
    ];
}
