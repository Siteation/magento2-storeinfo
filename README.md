# Siteation - Magento 2 Store Info

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-storeinfo?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-storeinfo)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
[![Hyvä CMS Supported](https://img.shields.io/badge/Hyva_CMS-Supported-0a144b.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/Siteation/magento2-storeinfo?color=%23234&style=for-the-badge)

The Magento2 StoreInfo module streamlines the process of integrating essential store information into your Magento 2 website. Traditionally,
this information would be added via CMS Static Blocks or hardcoded into templates.

However, the StoreInfo module offers a more efficient method by directly accessing and retrieving values from the store information.

## Key Features:

- Simplified store information integration
- Extends default Magento 2 store information
- Additional fields for enhanced storefront presentation:
  - Extra Store phone number
  - WhatsApp number
  - Chamber of Commerce field

With the StoreInfo module, developers can easily enhance their Magento 2 storefronts with comprehensive and customizable store information.

## Installation

Install the package via;

```bash
composer require siteation/magento2-storeinfo
bin/magento module:enable Siteation_StoreInfo
```

## How to use

The StoreInfo works out of the box by providing store information and store email addresses and displaying them on your storefront.

| Admin        | Storefront   |
| ------------ | ------------ |
| ![preview-1] | ![preview-2] |

[preview-1]: ./assets/storeinfo-admin.webp "Preview of the Magento2 admin store information"
[preview-2]: ./assets/storeinfo.webp "Preview of the Magento2 store information displayed by the Siteation StoreInfo"

Besides this the Siteation Storeinfo also adds even more usefull fields under `Stores > Configration > Siteation > StoreInfo`.

### Socials

| Admin        | Storefront   |
| ------------ | ------------ |
| ![preview-3] | ![preview-4] |

[preview-3]: ./assets/socials-admin.webp "Preview of the Magento2 admin store information Siteation StoreInfo Socials"
[preview-4]: ./assets/socials.webp "Preview of the Siteation StoreInfo Social icons"

### Opening Hours

| Admin        | Storefront   |
| ------------ | ------------ |
| ![preview-5] | ![preview-6] |

[preview-5]: ./assets/storehours-admin.webp "Preview of the Magento2 admin store information Siteation StoreInfo Opening Hours"
[preview-6]: ./assets/storehours.webp "Preview of the Siteation StoreInfo Opening Hours"

### Notices

| Admin        | Storefront   |
| ------------ | ------------ |
| ![preview-7] | ![preview-8] |

[preview-7]: ./assets/notices-admin.webp "Preview of the Magento2 admin store information Siteation StoreInfo Notices"
[preview-8]: ./assets/notices.webp "Preview of the Siteation StoreInfo Notices"

### Get StoreInfo in your own Template blocks.

First get the viewModel in your template, using the following sample;

<details open><summary>Hyva - Sample Phtml file head</summary>

```php
<?php declare(strict_types=1);

use Hyva\Theme\Model\ViewModelRegistry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Escaper;
use Siteation\StoreInfo\ViewModel\StoreInfo;

/** @var ViewModelRegistry $viewModels */
/** @var Template $block */
/** @var Escaper $escaper */

/** @var StoreInfo $storeInfo */
$storeInfo = $viewModels->require(StoreInfo::class);
```

</details>

<details><summary>Luma - Sample Phtml file head</summary>

_For Luma templates,_

```php
<?php declare(strict_types=1);

use Magento\Framework\View\Element\Template;
use Magento\Framework\Escaper;
use Siteation\StoreInfo\ViewModel\StoreInfo;

/** @var Template $block */
/** @var Escaper $escaper */

/** @var StoreInfo $storeInfo */
$storeInfo = $block->getData('viewModelStoreInfo');
```

</details>

After this you can load any Magento StoreInfo field as text in your phtml;

```php
<?php
// Get specific predefined store info field
$storeInfo->getPostcode();
$storeInfo->getSalesEmail();

// Get the same as above, using the global functions
$storeInfo->getStoreInfo('postcode'); // 'general/store_information/%s'
$storeInfo->getStoreEmail('email', 'ident_sales'); // 'trans_email/%2$s/%1$s'
```

## More StoreInfo Modules

Interested in what this module does?

We have a whole suite of modules that add even more features to your store,
allowing you to manage specific aspects of your store using StoreInfo.

- [StoreInfo USPS](https://github.com/Siteation/magento2-storeinfo-usps) – Display USPS details in the header, footer, and more.
- [StoreInfo Menus](https://github.com/Siteation/magento2-storeinfo-menus) – Manage static menus, like footer menus, directly from the backend.
- [StoreInfo Payments](https://github.com/Siteation/magento2-storeinfo-payments) – Show active payment methods on the frontend without manually adding them.

