<?php declare(strict_types=1);

namespace DeveloperHub\TopBanner\Model\ResourceModel\TemplatesConfiguration;

use Magento\Catalog\Model\ResourceModel\AbstractCollection;
use DeveloperHub\TopBanner\Api\Data\TemplatesConfigurationInterface;
use DeveloperHub\TopBanner\Model\ResourceModel\TemplatesConfiguration as ResourceModel;
use DeveloperHub\TopBanner\Model\TemplatesConfiguration as Model;

class Collection extends AbstractCollection
{
    /** @var string */
    protected $_idFieldName = TemplatesConfigurationInterface::ID;

    /** @inheirtDoc */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(Model::class, ResourceModel::class);
    }
}
