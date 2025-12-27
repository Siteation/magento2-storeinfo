<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;

class DayOfTheWeekColumn extends Select
{
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    public function setInputId($value)
    {
        return $this->setId($value);
    }

    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    private function getSourceOptions(): array
    {
        return [
            ['label' => __('Monday'), 'value' => 'Mo'],
            ['label' => __('Tuesday'), 'value' => 'Tu'],
            ['label' => __('Wensday'), 'value' => 'We'],
            ['label' => __('Thursday'), 'value' => 'Th'],
            ['label' => __('Friday'), 'value' => 'Fr'],
            ['label' => __('Saturday'), 'value' => 'Sa'],
            ['label' => __('Sunday'), 'value' => 'Su'],
        ];
    }
}
