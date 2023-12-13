<?php

namespace Trinos\CardgatePayment\Service;

use Trinos\Checkout\Model\Magewire\Payment\AbstractPlaceOrderService;
use Magento\Framework\UrlInterface;
use Magento\Quote\Api\CartManagementInterface;
use Magento\Quote\Model\Quote;

class PlaceOrderService extends AbstractPlaceOrderService
{
    public function __construct(
        CartManagementInterface $cartManagement,
        protected UrlInterface  $url,
    ) {
        parent::__construct($cartManagement);
    }

    public function canPlaceOrder(): bool
    {
        return true;
    }

    public function getRedirectUrl(Quote $quote, ?int $orderId = null): string
    {
        return $this->url->getUrl('cardgate/payment/start/');
    }
}
