## Trinos - Cardgate payment integration for Hyvä Checkout

[CardGate](https://www.cardgate.com/) payment integration for Hyvä Checkout.

## Installation

1. Add the checkout repository to the Magento `composer.json`
    ```sh
    composer config repositories.trinos-nl/magento2-hyva-cardgate-payment git git@github.com:trinos-nl/magento2-hyva-cardgate-payment.git
    ```

2. Require the `trinos-nl/magento2-hyva-cardgate-payment` packages using the `dev-main` branch version:
    ```sh
    composer require --prefer-source 'trinos-nl/magento2-hyva-cardgate-payment:dev-main'
    ```

3. Run `bin/magento setup:upgrade`
