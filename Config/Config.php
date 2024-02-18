<?php declare(strict_types=1);

/**
 * Siteation - https://siteation.dev/
 * Copyright © Siteation. All rights reserved.
 * See LICENSE file for details.
 */

namespace Siteation\StoreInfo\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getStoreInfo(string $attribute): mixed
    {
        $path = sprintf('general/store_information/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreEmail(string $attribute, string $attributeGroup = "ident_general"): mixed
    {
        $path = sprintf('trans_email/%2$s/%1$s', $attribute, $attributeGroup);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreInfoExtra(string $attribute): mixed
    {
        $path = sprintf('siteation_storeinfo/socials/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreInfoNotices(string $attribute): mixed
    {
        $path = sprintf('siteation_storeinfo/notices/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreInfoHours(string $attribute): mixed
    {
        $path = sprintf('siteation_storeinfo/opening_hours/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
