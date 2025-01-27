<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Directory\Model\CountryFactory;
use Magento\Directory\Model\ResourceModel\Region\Collection as RegionCollection;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Siteation\StoreInfo\Config\Config as ModuleConfig;

class StoreInfo implements ArgumentInterface
{
    private $countryFactory;
    private $regionCollection;
    private ModuleConfig $moduleConfig;

    public function __construct(
        CountryFactory $countryFactory,
        RegionCollection $regionCollection,
        ModuleConfig $moduleConfig
    ) {
        $this->countryFactory = $countryFactory;
        $this->regionCollection = $regionCollection;
        $this->moduleConfig = $moduleConfig;
    }

    private function getRegionNameById(int $id): string
    {
        $regionName = '';
        $region = $this->regionCollection->getItemById($id);

        if ($region) {
            $regionName = $region->getName();
        }

        return $regionName;
    }

    public function getStoreName(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('name');
    }

    public function formatPhoneNumber($number): string
    {
        return (string) preg_replace("/[^0-9+]/", "", $number);
    }

    public function getPhone(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('phone');
    }

    public function getExtraPhone(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('extra_phone');
    }

    public function getWhatsApp(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('whatsapp_number');
    }

    public function getHours(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('hours');
    }

    public function getPostcode(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('postcode');
    }

    public function getCity(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('city');
    }

    public function getCountryId(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('country_id');
    }

    public function getCountry(): string
    {
        $countryId = $this->getCountryId();
        $countryName = '';

        if ($countryId) {
            $country = $this->countryFactory->create()->loadByCode($countryId);
            $countryName = (string) $country->getName();
        }

        return $countryName;
    }

    public function getRegionId(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('region_id');
    }

    public function getRegion(): string
    {
        $id = $this->getRegionId();
        return (string) is_numeric($id)
            ? $this->getRegionNameById(intval($id))
            : $id;
    }

    public function getStreetLine1(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('street_line1');
    }

    public function getStreetLine2(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('street_line2');
    }

    public function getVatNumber(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('merchant_vat_number');
    }

    public function getCoCNumber(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('coc_number');
    }

    public function getIbanNumber(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('iban_number');
    }

    // Email
    public function getEmail(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('email');
    }

    public function getEmailName(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('name');
    }

    public function getSalesEmail(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('email', 'ident_sales');
    }

    public function getSalesEmailName(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('name', 'ident_sales');
    }

    public function getSupportEmail(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('email', 'ident_support');
    }

    public function getSupportEmailName(): string
    {
        return (string) $this->moduleConfig->getStoreEmail('name', 'ident_support');
    }
}
