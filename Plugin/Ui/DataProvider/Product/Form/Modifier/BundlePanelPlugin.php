<?php declare(strict_types=1);

namespace EnjoyDevelop\BundleOptionLink\Plugin\Ui\DataProvider\Product\Form\Modifier;

use Magento\Bundle\Ui\DataProvider\Product\Form\Modifier\BundlePanel as Subject;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Field;

class BundlePanelPlugin
{
    /**
     * @param Subject $subject
     * @param $meta
     * @return array[]
     */
    public function afterModifyMeta(Subject $subject, $meta): array
    {
        $meta['bundle-items']['children']['bundle_options']['children']['record']['children']
        ['product_bundle_container']['children']['bundle_selections']['children']['record']['children']
        ['product_link'] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => Field::NAME,
                        'dataType' => Text::NAME,
                        'formElement' => Input::NAME,
                        'elementTmpl' => 'EnjoyDevelop_BundleOptionLink/dynamic-rows/cells/link',
                        'label' => __('Product Link'),
                        'dataScope' => 'product_link',
                        'sortOrder' => 72,
                    ],
                ],
            ],
        ];

        return $meta;
    }
}
