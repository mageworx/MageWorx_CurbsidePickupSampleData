#  MageWorx Curbside Pickup SampleData for Magento 2

This sample data creates the delivery option for Curbside pickup and renames the setting to enable the Curbside pickup method on the front-end. It requires the following extensions to be installed:
- [Store Locator, In-Store & Curbside Pickup](https://www.mageworx.com/magento-2-store-locator-and-pickup.html)
- [Delivery Date (Free for orders with “Store Locator, In-Store & Curbside Pickup”)](https://www.mageworx.com/delivery-date-magento-2.html)
- [No-Contact Delivery / Curbside Pickup (Free)](https://www.mageworx.com/magento-2-no-contact-delivery.html)

## Features

**Add the 'Curbside Pickup' delivery option.**  
**Add the default store for store locator.**  
**Assign the 'Curbside Pickup' delivery option to Pickup shipping method.** 
**Rename labels and descriptions in NoContact Delivery and Delivery Date extensions to Curbside Pickup.**

## How to install Curbside Pickup SampleData for Magento 2

### Install via composer (recommend)
Run the following command in Magento 2 root folder:

```
composer require mageworx/module-curbside-pickup-sampledata
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Authors, contributors and maintainers

Author:
- [MageWorx](https://www.mageworx.com)

## Ideas, bugs, contributions, comments, feature suggestions?

Please get in touch with us via the [issue tracker on GitHub](https://github.com/mageworx/module-no-contact-delivery/issues)

## Compatibility

- PHP: 
  - '> 7.2.x'
- Magento CE: 
  - 2.3.x
- Magento EE:
  - 2.3.x
  
- Operating System: Linux

## License

[GPL v3](LICENSE.txt)

## Links

- [No-contact Delivery on MageWorx site](https://www.mageworx.com/magento-2-no-contact-delivery.html)
- [No-contact Delivery on GitHub](https://github.com/mageworx/module-no-contact-delivery)
- [Store Locator on MageWorx site](https://www.mageworx.com/magento-2-store-locator-and-pickup.html)
- [Delivery Date on MageWorx site](https://www.mageworx.com/delivery-date-magento-2.html)

