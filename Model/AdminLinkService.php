<?php declare(strict_types=1);

namespace EnjoyDevelop\BundleOptionLink\Model;

use Magento\Backend\Model\UrlInterface;

class AdminLinkService implements AdminLinkServiceInterface
{
    /**
     * @var UrlInterface
     */
    private $url;

    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }

    /**
     * Returns Product Admin Url
     *
     * @param $id
     * @return string
     */
    public function getAdminProductLink($id): string
    {
        return $this->url->getUrl(AdminLinkServiceInterface::PRODUCT_BASE_LINK, ['id' => $id]);
    }
}
