<?php
namespace Sevenstar\Menufacture\Plugin\Block\Adminhtml\Product\Attribute\Edit\Tab;


class Front
{

    /**
     * @var Yesno
     */
    protected $_yesNo;

    /**
     * @param Magento\Config\Model\Config\Source\Yesno $yesNo
     */
    public function __construct(
         \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Config\Model\Config\Source\Yesno $yesNo,
         \Sevenstar\Menufacture\Helper\Data $helper,
         array $data = []
    ) {
         $this->helper = $helper;
         $this->_yesNo = $yesNo;
        
      }

    /**
     * Get form HTML
     *
     * @return string
     */
    public function aroundGetFormHtml(
        \Magento\Catalog\Block\Adminhtml\Product\Attribute\Edit\Tab\Front $subject,
        \Closure $proceed
    )
    {

        $helterval = $this->helper->someMethod();
        $yesnoSource = $this->_yesNo->toOptionArray();
        $form = $subject->getForm();
        $fieldset = $form->getElement('front_fieldset');
        $fieldset->addField(
            'used_in_custom',
            'text',
            [
                'name' => 'used_in_custom',
                'label' => __('Disable Attribute'),
                'title' => __('Used in Custom'),
                'note' => __('Ex As Apstro,dello,brake'),
                'value' => $helterval,
            ]
        );
        return $proceed();
    }
}