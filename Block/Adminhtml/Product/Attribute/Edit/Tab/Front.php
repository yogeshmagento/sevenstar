<?php

namespace Sevenstar\Menufacture\Block\Adminhtml\Product\Attribute\Edit\Tab;
 
class Front extends \Magento\Catalog\Block\Adminhtml\Product\Attribute\Edit\Tab\Front
{
    protected function _prepareForm()
    {

        parent::_prepareForm();
        $attributeObject = $this->_coreRegistry->registry('entity_attribute');
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $yesnoSource = $this->_yesNo->toOptionArray();
        $fieldset = $form->addFieldset(
            'front_fieldset',
            ['legend' => __('Storefront Properties'), 'collapsable' => $this->getRequest()->has('popup')]
        );
        $fieldset->addField(
            'used_in_custom',
            'text',
            [
                'name' => 'used_in_custom',
                'label' => __('Disable Attribute'),
                'title' => __('Used in Custom'),
                'note' => __('Depends on design theme.'),
                'values' => $yesnoSource,
            ]
        );
        $this->setForm($form);
        return \Magento\Backend\Block\Widget\Form\Generic::_prepareForm();
    }
}