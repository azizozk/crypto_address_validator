<?php

namespace WalletAddressValidator\Address\Asset;

use WalletAddressValidator\Address\AbstractAddress;
use WalletAddressValidator\Address\Network;
use WalletAddressValidator\Address\Validator\Sol as SolValidator;

class Sol extends AbstractAddress
{
    protected $networkAlias = [
        self::SOL => Network::SOL,
    ];

    protected $validators = [
        Network::SOL => SolValidator::class
    ];
}
