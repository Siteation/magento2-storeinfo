# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

[Unreleased]: https://github.com/Siteation/magento2-storeinfo/compare/3.1.0...main

## [3.1.0] - 2024-12-29

[3.1.0]: https://github.com/Siteation/magento2-storeinfo/compare/3.0.0...3.1.0

### Added
- Option to socials for Bluesky
- Option to socials for Threads

### Changed
- Hyvä Tailwind classes to be configurable trough xml arguments
- Label spacing and color

### Fixed
- Missing landmark name in notices

## [3.0.0] - 2024-03-16

[3.0.0]: https://github.com/Siteation/magento2-storeinfo/compare/2.1.0...3.0.0

### Added

- The StoreInfoExtra fields in to the StoreInfo
- New option for display a custom store notice
- New option for display opening hours

### Changed

- Code optimisations, by splitting logic

## [2.1.0] - 2023-09-24

[2.1.0]: https://github.com/Siteation/magento2-storeinfo/compare/2.0.1...2.1.0

### Changed

- Minimal dependencies to Magento 2.4, dropping support for Magento 2.3

## [2.0.1] - 2023-09-24

[2.0.1]: https://github.com/Siteation/magento2-storeinfo/compare/2.0.0...2.0.1

### Fixed

- Fix localization error (thanks to @mgroensmit)

## 2.0.0 - 2022-12-17

### Changed

- Renamed composer name from `siteation/magento2-module-storeinfo` to `siteation/magento2-storeinfo`

## 1.2.1 - 2022-12-15

### Fixes

- Empty getCountry error [#9](https://github.com/Siteation/magento2-module-storeinfo/issues/9)

## 1.2.0 - 2022-11-27

### Added

- `getFormattedPhoneNumber` for using safe a version, without spaces and non numeric values
- `getEmailName`, `getSalesEmail`, `getSalesEmailName`, `getSupportEmail`, `getSupportEmailName` for more email control

### Changed

- Cleanup country logic by replacing `CountryFactory` for `CountryInformationAcquirerInterface`
- Renamed `getTransEmail` to `getStoreEmail`
- Allow email group as option in `getStoreEmail` to get the other email options like; sales, support and custom

### Fixes

- Missing dependencies in composer, closes [#8](https://github.com/Siteation/magento2-module-storeinfo/issues/8)

## 1.1.2 - 2022-05-27

### Fixes

- Empty getCountryNameById error

## 1.1.1 - 2022-02-03

### Fixes

- DE translation for VAT

## 1.1.0 - 2022-02-02

### Added

- Support for store name
- Support for country name
- Support for region name
- Support for vat number

### Changed

- Hyva sample template to match Hyva footer style

## 1.0.4 - 2021-10-04

### Fixes

- Sample templates, address order

## 1.0.3 - 2021-06-14

### Fixes

- schema data value for postcode

## 1.0.2 - 2021-04-24

### Removed

- Unneeded UrlInterface

## 1.0.1 - 2021-04-19

### Changed

- Renamed getEmailUs to getEmail to match the config setting.
  The old function naming will still be available until v2.

## 1.0.0 - 2021-03-11

Initial release 🎉
