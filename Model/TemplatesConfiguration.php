<?php declare(strict_types=1);

namespace DeveloperHub\TopBanner\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use DeveloperHub\TopBanner\Api\Data\TemplatesConfigurationInterface;
use DeveloperHub\TopBanner\Model\ResourceModel\TemplatesConfiguration as ResourceModel;

class TemplatesConfiguration extends AbstractModel implements TemplatesConfigurationInterface, IdentityInterface
{
    const CACHE_TAG = 'developerhub_top_banner_templates';

    /** @inheirtDoc */
    protected $_cacheTag = 'developerhub_top_banner_templates';

    /** @inheirtDoc */
    protected $_eventPrefix = 'developerhub_top_banner_templates';

    /** @inheirtDoc */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /** @return int */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @param $id
     * @return TemplatesConfiguration|void
     */
    public function setId($id)
    {
        $this->setData(self::ID, $id);
    }

    /** @return string */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param $name
     * @return TemplatesConfiguration
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /** @inheirtDoc */
    public function getBackgroundColor()
    {
        return $this->getData(self::BACKGROUND_COLOR);
    }

    /** @inheirtDoc */
    public function setBackgroundColor($backgroundColor)
    {
        $this->setData(self::BACKGROUND_COLOR, $backgroundColor);
    }

    /** @return string */
    public function getFontColor(): string
    {
        return $this->getData(self::FONT_COLOR);
    }

    /** @inheirtDoc */
    public function setFontColor($fontColor)
    {
        $this->setData(self::FONT_COLOR, $fontColor);
    }

    /** @inheirtDoc */
    public function getImage(): string
    {
        return $this->getData(self::IMAGE);
    }

    /** @inheirtDoc */
    public function setImage($image)
    {
        $this->setData(self::IMAGE, $image);
    }

    /** @inheirtDoc */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
