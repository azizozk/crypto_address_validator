<?php

namespace WalletAddressValidator\Address\Validator;

use RuntimeException;
use WalletAddressValidator\Address\AddressInterface;
use WalletAddressValidator\Address\Validator\Codec\Base58;

class Sol implements ValidatorInterface
{
    private const MIN_LENGTH = 40;

    private AddressInterface $address;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }

    public function validate(): bool
    {
        try {
            return $this->validateWithExceptions();
        } catch (RuntimeException $e) {
        }

        return false;
    }

    /**
     * @return bool
     * @throws RuntimeException
     */
    public function validateWithExceptions()
    {
        try {
            $address = $this->address->address();

            if (strlen($address) < self::MIN_LENGTH) {
                return false;
            }

            if (!preg_match('/[a-z0-9]+/', $address)) {
                return false;
            }

            $base58 = new Base58();
            $binaryDecoded = $base58->decodeHex($address);
            $hexDecoded = bin2hex($binaryDecoded);

            if (!\ctype_xdigit($hexDecoded) || strlen($hexDecoded) % 2 !== 0) {
                return false;
            }
            return true;
        } catch (\InvalidArgumentException $e) {
        } catch (\Exception $e) {
        }

        return false;
    }
}
