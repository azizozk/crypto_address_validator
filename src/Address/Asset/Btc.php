<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Btc as BtcValidator;

class Btc extends AbstractAddress
{
    protected $validators = [
        Network::BTC => BtcValidator::class
    ];
}
