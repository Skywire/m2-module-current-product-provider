<?php declare(strict_types=1);

namespace Skywire\CurrentProductProvider\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Skywire\CurrentProductProvider\DataProvider\CurrentProduct as Provider;

class CurrentProduct implements ArgumentInterface
{
    /**
     * @var Provider
     */
    private $currentProduct;

    public function __construct(Provider $currentProduct)
    {
        $this->currentProduct = $currentProduct;
    }

    public function getProductName(): string
    {
        return (string) $this->currentProduct->get()->getName();
    }

    public function getProductSku(): string
    {
        return (string) $this->currentProduct->get()->getSku();
    }

    public function getProduct(): ProductInterface
    {
        return $this->currentProduct->get();
    }
}
