<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Siteation\StoreInfo\Config\Config as ModuleConfig;

class StoreInfoNotice implements ArgumentInterface
{
    private ModuleConfig $moduleConfig;

    public function __construct(ModuleConfig $moduleConfig)
    {
        $this->moduleConfig = $moduleConfig;
    }

    public function getNotices(): string
    {
        if (!$this->moduleConfig->getStoreInfoNotices('enabled')) {
            return '';
        }

        return (string) $this->moduleConfig->getStoreInfoNotices('message');
    }
}
