<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\ERC20 as EthValidator;
use Exads\WalletAddressValidator\Address\Validator\OMNI as UsdtValidator;
use Exads\WalletAddressValidator\Address\Validator\TRC20 as TrxValidator;

class Usdt extends AbstractAddress
{
    protected $networkAlias = [
        self::USDT => Network::OMNI,
        self::ETH => Network::ERC20,
        self::TRX => Network::TRC20,
    ];

    protected $validators = [
        Network::ERC20 => EthValidator::class,
        Network::TRC20 => TrxValidator::class,
        Network::BEP20 => EthValidator::class,
        Network::POLYGON => EthValidator::class,
        Network::OMNI => UsdtValidator::class,
    ];
}
