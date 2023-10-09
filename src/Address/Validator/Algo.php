<?php

namespace Exads\WalletAddressValidator\Address\Validator;

use RuntimeException;
use Exads\WalletAddressValidator\Address\AddressInterface;
use Exads\WalletAddressValidator\Address\Validator\Codec\Base32;

class Algo implements ValidatorInterface
{
    /** @var int */
    const NACL_PUBLIC_KEY_LENGTH = 32;
    const NACL_HASH_BYTES_LENGTH = 32;
    const ALGORAND_ADDRESS_BYTE_LENGTH = 36;
    const ALGORAND_CHECKSUM_BYTE_LENGTH = 4;
    const ALGORAND_ADDRESS_LENGTH = 58;

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
        if (strlen($this->address->address()) !== self::ALGORAND_ADDRESS_LENGTH) {
            throw new RuntimeException('Address has invalid length');
        }

        $decodedAddress = $this->decodeAddress();
        $checksumHash = unpack('C*', hash('sha512/256', pack('C*', ...$decodedAddress['publicKey']), true));
        $checksum = array_slice($checksumHash, self::NACL_HASH_BYTES_LENGTH - self::ALGORAND_CHECKSUM_BYTE_LENGTH, self::NACL_HASH_BYTES_LENGTH);

        if ($decodedAddress['checksum'] !== $checksum) {
            throw new RuntimeException('Address is invalid');
        }

        return true;
    }

    /**
     * @return array
     */
    protected function decodeAddress()
    {
        $decodedAddress = unpack('C*', Base32::decode($this->address->address()));
        $publicKey = array_slice($decodedAddress, 0, self::ALGORAND_ADDRESS_BYTE_LENGTH - self::ALGORAND_CHECKSUM_BYTE_LENGTH);
        $checksum = array_slice($decodedAddress, self::NACL_PUBLIC_KEY_LENGTH, self::ALGORAND_ADDRESS_BYTE_LENGTH);

        return [
            'publicKey' => $publicKey,
            'checksum' => $checksum,
        ];
    }
}
