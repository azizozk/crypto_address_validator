<?php

namespace Exads\WalletAddressValidator\Address\Validator;

use Exads\WalletAddressValidator\Address\AddressInterface;

interface ValidatorInterface
{
    public function __construct(AddressInterface $address);

    public function validate(): bool;
}
