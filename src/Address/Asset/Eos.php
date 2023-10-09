<?php

namespace Exads\WalletAddressValidator\Address\Asset;

use Exads\WalletAddressValidator\Address\AbstractAddress;
use Exads\WalletAddressValidator\Address\Network;
use Exads\WalletAddressValidator\Address\Validator\Eos as EosValidator;

class Eos extends AbstractAddress
{
    protected $validators = [
        Network::EOS => EosValidator::class,
    ];
}
