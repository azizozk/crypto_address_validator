<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;

class Snx extends AbstractAddress
{
    protected $networkAlias = [
        self::ETH => Network::ERC20,
    ];

    protected $validators = [
        Network::ERC20 => EthValidator::class
    ];
}
