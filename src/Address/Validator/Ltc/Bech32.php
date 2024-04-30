<?php

namespace Exads\WalletAddressValidator\Address\Validator\Ltc;

use Exads\WalletAddressValidator\Address\AddressInterface;
use Exads\WalletAddressValidator\Address\Validator\ValidatorInterface;
use Kielabokkie\Bitcoin\Bech32 as KielabokkieBech32;
use Kielabokkie\Bitcoin\Exceptions\Bech32Exception;

class Bech32 implements ValidatorInterface
{

    private string $address;
    private KielabokkieBech32 $converter;


    public function __construct(AddressInterface $address)
    {
        // Bech32 is "case-insensitive", but works only with lowercase letters.
        // need to be sure that the address is in lowercase
        $this->address = strtolower($address->address());
        $this->converter = new KielabokkieBech32();
    }

    public function validate(): bool
    {
        // try to decode address with different algo version
        // address is valid if no exception returned
        foreach ([$this->converter::BECH32, $this->converter::BECH32M] as $encoding) {
            try {
                $this->converter->decodeSegwit(
                    $this->hrpFromAddress(),
                    $this->address,
                    $encoding
                );
                return true;
            } catch (Bech32Exception $e) {
                // ignore exception, true is returned in try section
                // otherwise false must be returned in the method end
            }
        }

        return false;
    }

    /**
     * Get human-readable part from the wallet address
     */
    private function hrpFromAddress(): string
    {
        if (preg_match("/^(\S*)1.*$/U", $this->address, $matches) !== 1) {
            return "";
        }
        return $matches[1];
    }

}