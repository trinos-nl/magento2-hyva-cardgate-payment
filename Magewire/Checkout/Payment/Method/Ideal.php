<?php

namespace Trinos\CardgatePayment\Magewire\Checkout\Payment\Method;

use Cardgate\Payment\Model\Ui\ConfigProvider;
use Magento\Checkout\Model\Session as SessionCheckout;
use Magento\Quote\Api\CartRepositoryInterface;
use Magewirephp\Magewire\Component\Form;
use Rakit\Validation\Validator;

class Ideal extends Form
{
    public array $issuers = [];
    public string $selectedIssuer = '';
    protected $rules = [
        'cardgate_issuer' => 'required',
    ];

    protected $loader = [
        'selectedIssuer' => 'Updating issuer...',
    ];

    public function __construct(
        Validator                         $validator,
        protected ConfigProvider          $configProvider,
        protected SessionCheckout         $sessionCheckout,
        protected CartRepositoryInterface $quoteRepository,
    ) {
        parent::__construct($validator);
    }

    public function mount(): void
    {
        $this->issuers = $this->configProvider->getIDealIssuers();

        $quote = $this->sessionCheckout->getQuote();
        if ($selectedIssuer = $quote->getPayment()->getAdditionalInformation('issuer_id')) {
            $this->selectedIssuer = $selectedIssuer;
        }
    }

    public function updatedSelectedIssuer(string $value): ?string
    {
        $quote = $this->sessionCheckout->getQuote();
        $quote->getPayment()->setAdditionalInformation('issuer_id', $value);

        $this->quoteRepository->save($quote);

        return $value;
    }
}
