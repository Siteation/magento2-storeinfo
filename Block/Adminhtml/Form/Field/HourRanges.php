<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Siteation\StoreInfo\Block\Adminhtml\Form\Field\DayOfTheWeekColumn;

class HourRanges extends AbstractFieldArray
{
    /**  @var DayOfTheWeekColumn */
    private $dayOfTheWeekRenderer;

    protected function _prepareToRender()
    {
        $this->addColumn('day', [
            'label' => __('Day of Week'),
            'renderer' => $this->getDayOfTheWeekRenderer()
        ]);
        $this->addColumn('hours', [
            'label' => __('Hours'),
            'placeholder' => '16:00-20:00'
        ]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $dayOfTheWeek = $row->getDay();
        if ($dayOfTheWeek !== null) {
            $options['option_' . $this->getDayOfTheWeekRenderer()->calcOptionHash($dayOfTheWeek)] = 'selected';
        }

        $row->setData('option_extra_attrs', $options);
    }


    private function getDayOfTheWeekRenderer()
    {
        if (!$this->dayOfTheWeekRenderer) {
            $this->dayOfTheWeekRenderer = $this->getLayout()->createBlock(
                DayOfTheWeekColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->dayOfTheWeekRenderer;
    }

}
