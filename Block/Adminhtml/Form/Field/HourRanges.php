<?php declare(strict_types=1);

/**
 * @author Siteation (https://siteation.dev/)
 * @copyright Copyright 2021 Siteation (https://siteation.dev/)
 * @license MIT
 */

namespace Siteation\StoreInfo\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class HourRanges extends AbstractFieldArray
{
    protected function _prepareToRender()
    {
        $this->addColumn('day', [
            'label' => __('Day of Week'),
            'class' => 'required-entry'
        ]);
        $this->addColumn('hours', [
            'label' => __('Hours')
        ]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}
