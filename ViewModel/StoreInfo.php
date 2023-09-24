<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Directory\Model\CountryFactory;
use Magento\Directory\Model\ResourceModel\Region\Collection as RegionCollection;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class StoreInfo implements ArgumentInterface
{
    private $scopeConfig;
    private $countryFactory;
    private $regionCollection;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        CountryFactory $countryFactory,
        RegionCollection $regionCollection
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->countryFactory = $countryFactory;
        $this->regionCollection = $regionCollection;
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

    /**
     * Get store information
     *
     * @param string $attribute
     * @return mixed
     */
    public function getStoreInfo(string $attribute)
    {
        $path = sprintf('general/store_information/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get store emails
     *
     * @param string $attribute
     * @param string $attributeGroup
     * @return mixed
     */
    public function getStoreEmail(string $attribute, string $attributeGroup = "ident_general")
    {
        $path = sprintf('trans_email/%2$s/%1$s', $attribute, $attributeGroup);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreName(): string
    {
        return (string) $this->getStoreInfo('name');
    }

    public function getPhoneNumber(): string
    {
        return (string) $this->getStoreInfo('phone');
    }

    public function getFormattedPhoneNumber(): string
    {
        return (string) preg_replace("/[^0-9+]/", "", $this->getPhoneNumber());
    }

    public function getOpeningHours(): string
    {
        return (string) $this->getStoreInfo('hours');
    }

    public function getPostcode(): string
    {
        return (string) $this->getStoreInfo('postcode');
    }

    public function getCity(): string
    {
        return (string) $this->getStoreInfo('city');
    }

    public function getCountryId(): string
    {
        return (string) $this->getStoreInfo('country_id');
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
        return (string) $this->getStoreInfo('region_id');
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
        return (string) $this->getStoreInfo('street_line1');
    }

    public function getStreetLine2(): string
    {
        return (string) $this->getStoreInfo('street_line2');
    }

    public function getVatNumber(): string
    {
        return (string) $this->getStoreInfo('merchant_vat_number');
    }

    // Email
    public function getEmail(): string
    {
        return (string) $this->getStoreEmail('email');
    }

    public function getEmailName(): string
    {
        return (string) $this->getStoreEmail('name');
    }

    public function getSalesEmail(): string
    {
        return (string) $this->getStoreEmail('email', 'ident_sales');
    }

    public function getSalesEmailName(): string
    {
        return (string) $this->getStoreEmail('name', 'ident_sales');
    }

    public function getSupportEmail(): string
    {
        return (string) $this->getStoreEmail('email', 'ident_support');
    }

    public function getSupportEmailName(): string
    {
        return (string) $this->getStoreEmail('name', 'ident_support');
    }
}
