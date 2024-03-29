<?php

namespace Training\Test\Controller\Action;

use Magento\Framework\Controller\Result\RawFactory;

class Index extends \Magento\Framework\App\Action\Action {

    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    private $layoutFactory;
    private $resultRawFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
    \Magento\Backend\App\Action\Context $context, 
            \Magento\Framework\View\LayoutFactory $layoutFactory, 
            \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
    ) {
        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;
        parent::__construct($context);
    }

    public function execute() {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('\Magento\Framework\View\Element\Template');
        $block->setTemplate('Training_Test::test.phtml');
        $resultRaw = $this->resultRawFactory->create();
        $resultRaw->setContents($block->toHtml());
        return $resultRaw;
    }

}
