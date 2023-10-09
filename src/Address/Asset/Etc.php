<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\ERC20 as EthValidator;

class Etc extends AbstractAddress
{
    protected $networkAlias = [
        self::ETC => Network::ERC20,
        self::ETH => Network::ERC20,
    ];

    protected $validators = [
        Network::ERC20 => EthValidator::class
    ];
}
