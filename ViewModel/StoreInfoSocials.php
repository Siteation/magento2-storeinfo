<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Siteation\StoreInfo\Config\Config as ModuleConfig;

class StoreInfoSocials implements ArgumentInterface
{
    private ModuleConfig $moduleConfig;

    public function __construct(ModuleConfig $moduleConfig)
    {
        $this->moduleConfig = $moduleConfig;
    }

    public function getLinkedIn(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('linkedin_address');
    }

    public function getFacebook(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('facebook_address');
    }

    public function getInstagram(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('instagram_handle');
    }

    public function getThreads(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('threads_handle');
    }

    public function getTwitter(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('twitter_handle');
    }

    public function getBluesky(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('bluesky_address');
    }

    public function getMastodon(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('mastodon_address');
    }

    public function getPinterest(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('pinterest_address');
    }

    public function getYouTube(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('youtube_address');
    }

    public function getVimeo(): string
    {
        return (string) $this->moduleConfig->getStoreInfoExtra('vimeo_address');
    }
}
