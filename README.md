## Wallet Address Validator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/azizozk/wallet-address-validator.svg?style=flat-square)](https://packagist.org/packages/azizozk/wallet-address-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/azizozk/wallet-address-validator.svg?style=flat-square)](https://packagist.org/packages/azizozk/wallet-address-validator)

### Supported Assets
 * BTC: BTC
 * ETH: ERC20
 * LTC: LTC
 * DASH: DASH
 * HOT: ERC20
 * LINK: ERC20
 * DOGE: DOGE
 * XRP: XRP
 * BAT: ERC20
 * XLM: XLM
 * BCH: BCH
 * MKR: ERC20
 * EOS: EOS
 * XEM: XEM
 * BTG: BTG
 * ETC: ERC20
 * USDT: OMNI, ERC20, TRC20
 * TRX: TRC20
 * BTT: TRC20
 * ADA: ADA
 * XMR: XMR
 * ZEC: ZEC

### Usage
```
$address = \Exads\WalletAddressValidator\AddressFactory::create('BTC', 'BTC', '167FQQrBLUmhfMiYSEHaBprp34fphBiLm6');
$address->isValid(); // true
```
```
$address = \Exads\WalletAddressValidator\AddressFactory::create('NONE', 'BTC', '167FQQrBLUmhfMiYSEHaBprp34fphBiLm6');
$address->isValid(); // \OutOfBoundsException
```


```
\Exads\WalletAddressValidator\Validator::isValid('BTC', 'BTC', '167FQQrBLUmhfMiYSEHaBprp34fphBiLm6'); // true
```

```
\Exads\WalletAddressValidator\Validator::isValid('NONE', 'BTC', '167FQQrBLUmhfMiYSEHaBprp34fphBiLm6'); // false
```

```
$address = \Exads\WalletAddressValidator\AddressFactory::create('XLM', 'XLM', 'GBBALM76B5OUPOZCMFCNT5PVIFV3WTUYX3VVGC7FMN4ZPQLGCG2C4X3D');
$address->setParams(['memo' => '1034560979']);
$address->isValid(); // true
```

```
\Exads\WalletAddressValidator\Validator::isValid(
   'XRP', 
   'XRP', 
   'ryBANkk28Mj71jRKAkt13U1X9ubztsGWZ',
   ['tag' => '851882565']  
); // true
```

```
\Exads\WalletAddressValidator\Validator::$networkAliases = [
    'BTC' => [
        'SOMETHING-ELSE' => Network::BTC
    ]
];
Validator::isValid('BTC', 'SOMETHING-ELSE', '1LNkDkf4rtKRozGTpPRbPtYJnY2q5N5bFW'); // true
```
