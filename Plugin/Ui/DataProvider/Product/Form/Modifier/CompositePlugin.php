<?php declare(strict_types=1);

namespace EnjoyDevelop\BundleOptionLink\Plugin\Ui\DataProvider\Product\Form\Modifier;

use EnjoyDevelop\BundleOptionLink\Model\AdminLinkServiceInterface as AdminLinks;
use Magento\Bundle\Model\Product\Type;
use Magento\Bundle\Ui\DataProvider\Product\Form\Modifier\Composite as Subject;
use Magento\Catalog\Model\Locator\LocatorInterface;

class CompositePlugin
{
    /**
     * @var AdminLinks
     */
    private $adminLinks;

    /**
     * @var LocatorInterface
     */
    private $locator;

    public function __construct(
        AdminLinks $adminLinks,
        LocatorInterface $locator
    ) {
        $this->adminLinks = $adminLinks;
        $this->locator = $locator;
    }

    /**
     * @param Subject $subject
     * @param array $data
     * @return array
     */
    public function afterModifyData(Subject $subject, array $data): array
    {
        $product = $this->locator->getProduct();
        $modelId = $product->getId();
        $isBundleProduct = $product->getTypeId() === Type::TYPE_CODE;
        $bundleOptions = false;

        if (isset($data[$modelId]['bundle_options']['bundle_options'])) {
            $bundleOptions = &$data[$modelId]['bundle_options']['bundle_options'];
        }

        if ($isBundleProduct && $modelId && $bundleOptions) {
            foreach ($bundleOptions as &$bundleOption) {
                if ($bundleOption['bundle_selections'] ?? false) {
                    foreach ($bundleOption['bundle_selections'] as &$selection) {
                        $linkedProductId = $selection['product_id'] ?? false;
                        if ($linkedProductId) {
                            $selection['product_link'] = $this->adminLinks->getAdminProductLink($linkedProductId);
                        }
                    }
                }
            }
        }

        return $data;
    }
}
