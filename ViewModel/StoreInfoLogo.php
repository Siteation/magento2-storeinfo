<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Theme\Block\Html\Header\Logo as LogoBlock;

class StoreInfoLogo extends LogoBlock implements ArgumentInterface
{
    public function getPath(): ?string
    {
        $path = $this->getViewFileUrl('images/logo.svg');
        $storeLogoPath = $this->_scopeConfig->getValue(
            'design/header/logo_src',
            ScopeInterface::SCOPE_STORE
        );
        if ($storeLogoPath !== null) {
            $path = $this->_urlBuilder->getDirectUrl(
                $storeLogoPath,
                ['_type' => UrlInterface::URL_TYPE_MEDIA]
            );
        }

        return $path;
    }
}
