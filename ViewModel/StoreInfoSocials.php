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

    public const SOCIALS_CONFIG = [
        'linkedin' => ['label' => 'LinkedIn', 'url_prefix' => 'https://linkedin.com/company/'],
        'facebook' => ['label' => 'Facebook', 'url_prefix' => 'https://facebook.com/'],
        'instagram' => ['label' => 'Instagram', 'url_prefix' => 'https://instagram.com/'],
        'threads' => ['label' => 'Threads', 'url_prefix' => 'https://threads.net/'],
        'bluesky' => ['label' => 'Bluesky', 'url_prefix' => 'https://bsky.app/profile/'],
        'mastodon' => ['label' => 'Mastodon', 'url_prefix' => 'https://mastodon.social/'],
        'twitter' => ['label' => 'Twitter', 'url_prefix' => 'https://twitter.com/'],
        'pinterest' => ['label' => 'Pinterest', 'url_prefix' => 'https://pinterest.com/'],
        'youtube' => ['label' => 'YouTube', 'url_prefix' => 'https://youtube.com/'],
        'vimeo' => ['label' => 'Vimeo', 'url_prefix' => 'https://vimeo.com/'],
    ];

    public function __construct(ModuleConfig $moduleConfig)
    {
        $this->moduleConfig = $moduleConfig;
    }

    public function getLinkedIn(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('linkedin');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['linkedin']);
    }

    public function getFacebook(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('facebook');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['facebook']);
    }

    public function getInstagram(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('instagram');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['instagram']);
    }

    public function getThreads(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('threads');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['threads']);
    }

    public function getTwitter(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('twitter');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['twitter']);
    }

    public function getBluesky(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('bluesky');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['bluesky']);
    }

    public function getMastodon(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('mastodon');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['mastodon']);
    }

    public function getPinterest(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('pinterest');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['pinterest']);
    }

    public function getYouTube(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('youtube');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['youtube']);
    }

    public function getVimeo(): string
    {
        $value = (string) $this->moduleConfig->getStoreInfoExtra('vimeo');
        return $this->buildUrl($value, self::SOCIALS_CONFIG['vimeo']);
    }

    public function getList(): array
    {
        $socialsList = [];

        foreach (self::SOCIALS_CONFIG as $type => $config) {
            $getter = 'get' . ucfirst($type);

            if ($link = $this->{$getter}()) {
                $socialsList[] = [
                    'type' => $type,
                    'link' => $link,
                    'title' => $config['label']
                ];
            }
        }

        return $socialsList;
    }

    private function buildUrl(string $value, array $config): string
    {
        if (empty($value)) {
            return '';
        }

        if (isset($config['url_prefix']) && filter_var($value, FILTER_VALIDATE_URL) === false) {
            return $config['url_prefix'] . $value . '/';
        }

        return $value;
    }
}
