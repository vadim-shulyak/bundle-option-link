## Magento 2 BundleOptionLink
#### This module adds a new column into the bundle product options form in the Magento 2 admin panel. 
#### This column contains the direct admin product link of the option associated with a bundle product.

### `Installation`
```shell
composer require enjoydevelop/magento2-module-bundle-option-link
```

```shell
bin/magento module:enable EnjoyDevelop_BundleOptionLink && bin/magento setup:upgrade && bin/magento setup:di:compile && bin/magento setup:static-content:deploy -f
```

### `Demo`
<img width="1329" alt="demo-img" src="https://user-images.githubusercontent.com/9142847/232478171-f49ee88d-c5d4-4f61-9fc0-db2cf49afa19.png">
