<?php declare(strict_types=1);

namespace Skywire\CurrentProductProvider\Observer;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer as Event;
use Magento\Framework\Event\ObserverInterface;
use Skywire\CurrentProductProvider\DataProvider\CurrentProduct;

class RegisterCurrentProductObserver implements ObserverInterface
{
    /**
     * @var CurrentProduct
     */
    private $currentProduct;

    public function __construct(CurrentProduct $currentProduct)
    {
        $this->currentProduct = $currentProduct;
    }

    public function execute(Event $event)
    {
        /** @var ProductInterface $product */
        $product = $event->getData('product');
        $this->currentProduct->set($product);
    }
}
