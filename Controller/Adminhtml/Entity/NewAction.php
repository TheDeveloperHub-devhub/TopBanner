<?php declare(strict_types=1);

namespace DeveloperHub\TopBanner\Controller\Adminhtml\Entity;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use DeveloperHub\TopBanner\Controller\Adminhtml\Entity;

class NewAction extends Entity implements HttpGetActionInterface
{
    /** @return void */
    public function execute()
    {
        $this->_forward('edit');
    }
}
