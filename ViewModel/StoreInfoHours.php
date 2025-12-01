<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Siteation\StoreInfo\Config\Config as ModuleConfig;

class StoreInfoHours implements ArgumentInterface
{
    private ModuleConfig $moduleConfig;

    public function __construct(ModuleConfig $moduleConfig)
    {
        $this->moduleConfig = $moduleConfig;
    }

    public function enabled(): bool
    {
        return (bool) $this->moduleConfig->getStoreInfoHours('enabled');
    }

    public function getHours(): string
    {
        return (string) $this->moduleConfig->getStoreInfo('hours');
    }

    /**
     * Returns raw list of opening hours as a array
     */
    public function getDailyHours(): array
    {
        $dailyHours = $this->moduleConfig->getStoreInfoHours('daily_hours');
        return is_string($dailyHours) ? json_decode($dailyHours, true) : (array) $dailyHours;
    }

    public function getFullNameOfDay($dayCode): string
    {
        $days = [
            'Mo' => __('Monday'),
            'Tu' => __('Tuesday'),
            'We' => __('Wednesday'),
            'Th' => __('Thursday'),
            'Fr' => __('Friday'),
            'Sa' => __('Saturday'),
            'Su' => __('Sunday'),
        ];

        return isset($days[$dayCode]) ? (string) $days[$dayCode] : '';
    }

    public function getOpeningHours(): array
    {
        $dailyHours = $this->getDailyHours();

        if (empty($dailyHours)) {
            return [];
        }

        return array_map(function($item) {
            if (empty($item['hours'])) {
              $item['hours'] = $this->getHours();
            }
            return $item;
        }, $dailyHours);
    }
}
