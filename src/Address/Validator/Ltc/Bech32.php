<?php

namespace Exads\WalletAddressValidator\Address\Validator\Ltc;

use Exads\WalletAddressValidator\Address\AddressInterface;
use Exads\WalletAddressValidator\Address\Validator\ValidatorInterface;
use Kielabokkie\Bitcoin\Bech32 as KielabokkieBech32;
use Kielabokkie\Bitcoin\Exceptions\Bech32Exception;

class Bech32 implements ValidatorInterface
{

    private AddressInterface $address;
    private KielabokkieBech32 $converter;


    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
        $this->converter = new KielabokkieBech32();
    }

    public function validate(): bool
    {
        // try to decode address with different algo version
        // address is valid if no exception returned
        foreach ([$this->converter::BECH32, $this->converter::BECH32M] as $encoding){
            try{
                $this->converter->decodeSegwit(
                    $this->hrpFromAddress(),
                    $this->address->address(),
                    $encoding
                );
                return true;
            }catch (Bech32Exception $e){
                // ignore exception
            }
        }

        return false;
    }

    /**
     * Get human-readable part from the wallet address
    */
    private function hrpFromAddress(): string
    {
        if( preg_match("/^(\S*)1.*$/U", $this->address->address(), $matches) !==1) {
            return "";
        }
        return $matches[1];
    }

}