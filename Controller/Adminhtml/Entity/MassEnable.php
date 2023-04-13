<?php declare(strict_types=1);

namespace DeveloperHub\TopBanner\Controller\Adminhtml\Entity;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Ui\Component\MassAction\Filter;
use DeveloperHub\TopBanner\Controller\Adminhtml\Entity;
use DeveloperHub\TopBanner\Model\EntityFactory;
use function __;

class MassEnable extends Entity implements HttpPostActionInterface
{
    /** @var Filter */
    private $filter;

    /**
     * MassEnable constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param EntityFactory $entityFactory
     * @param Filter $filter
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        EntityFactory $entityFactory,
        Filter $filter
    ) {
        parent::__construct($context, $coreRegistry, $entityFactory);
        $this->filter = $filter;
    }

    /**
     * @return ResponseInterface|ResultInterface|void
     * @throws LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->entityFactory->create()->getCollection());
        foreach ($collection as $item) {
            $item->setIsActive(true);
            $item->save();
        }
        try {
            $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been enabled.', $collection->getSize()));
        } catch (Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong. Please try again.'));
        }

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
