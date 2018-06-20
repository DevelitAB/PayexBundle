<?php

namespace Bsadnu\PayexBundle\DTO;

class PayexPayment
{
    const VIEW_CREDITCARD = 'CREDITCARD';
    const VIEW_DIRECTDEBIT = 'DIRECTDEBIT';
    const VIEW_SWISH = 'SWISH';

    const PURCHASE_OPERATION_AUTHORIZATION = 'AUTHORIZATION';
    const PURCHASE_OPERATION_SALE = 'SALE';

    /** @var string */
    private $purchaseOperation;

    /** @var string */
    private $price;

    /** @var string */
    private $priceArgList;

    /** @var string */
    private $currency;

    /** @var string */
    private $vat;

    /** @var string */
    private $orderId;

    /** @var string */
    private $productNumber;

    /** @var string */
    private $description;

    /** @var string */
    private $clientIPAddress;

    /** @var string */
    private $clientIdentifier;

    /** @var string */
    private $additionalValues;

    /** @var string */
    private $externalId;

    /** @var string */
    private $returnUrl;

    /** @var string */
    private $view;

    /** @var string */
    private $agreementRef;

    /** @var string */
    private $cancelUrl;

    /** @var string */
    private $clientLanguage;

    /** @var string */
    private $hash;

    /** @var int|null */
    private $clientId;

    /** @var string|null */
    private $clientEmail;

    /** @var float */
    private $amount;

    public function __construct(
        string  $purchaseOperation = '',
        string  $price = '',
        string  $priceArgList = '',
        string  $currency = '',
        string  $vat = '',
        string  $orderId = '',
        string  $productNumber = '',
        string  $description = '',
        string  $clientIPAddress = '',
        string  $clientIdentifier = '',
        string  $additionalValues = '',
        string  $externalId = '',
        string  $returnUrl = '',
        string  $view = '',
        string  $agreementRef = '',
        string  $cancelUrl = '',
        string  $clientLanguage = '',
        string  $hash = '',
        string  $clientId = null,
        string  $clientEmail = null,
        float  $amount = 0
    )
    {
        $this
            ->setPurchaseOperation($purchaseOperation)
            ->setPrice($price)
            ->setPriceArgList($priceArgList)
            ->setCurrency($currency)
            ->setVat($vat)
            ->setOrderId($orderId)
            ->setProductNumber($productNumber)
            ->setDescription($description)
            ->setClientIPAddress($clientIPAddress)
            ->setClientIdentifier($clientIdentifier)
            ->setAdditionalValues($additionalValues)
            ->setExternalId($externalId)
            ->setReturnUrl($returnUrl)
            ->setView($view)
            ->setAgreementRef($agreementRef)
            ->setCancelUrl($cancelUrl)
            ->setClientLanguage($clientLanguage)
            ->setHash($hash)
            ->setClientId($clientId)
            ->setClientEmail($clientEmail)
            ->setAmount($amount)
        ;
    }

    public function getPurchaseOperation(): string
    {
        return $this->purchaseOperation;
    }

    public function setPurchaseOperation(string $purchaseOperation): self
    {
        $this->purchaseOperation = $purchaseOperation;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceArgList(): string
    {
        return $this->priceArgList;
    }

    public function setPriceArgList(string $priceArgList): self
    {
        $this->priceArgList = $priceArgList;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getVat(): string
    {
        return $this->vat;
    }

    public function setVat(string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getProductNumber(): string
    {
        return $this->productNumber;
    }

    public function setProductNumber(string $productNumber): self
    {
        $this->productNumber = $productNumber;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getClientIPAddress(): string
    {
        return $this->clientIPAddress;
    }

    public function setClientIPAddress(string $clientIPAddress): self
    {
        $this->clientIPAddress = $clientIPAddress;

        return $this;
    }

    public function getClientIdentifier(): string
    {
        return $this->clientIdentifier;
    }

    public function setClientIdentifier(string $clientIdentifier): self
    {
        $this->clientIdentifier = $clientIdentifier;

        return $this;
    }

    public function getAdditionalValues(): string
    {
        return $this->additionalValues;
    }

    public function setAdditionalValues(string $additionalValues): self
    {
        $this->additionalValues = $additionalValues;

        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getReturnUrl(): string
    {
        return $this->returnUrl;
    }

    public function setReturnUrl(string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function setView(string $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function getAgreementRef(): string
    {
        return $this->agreementRef;
    }

    public function setAgreementRef(string $agreementRef): self
    {
        $this->agreementRef = $agreementRef;

        return $this;
    }

    public function getCancelUrl(): string
    {
        return $this->cancelUrl;
    }

    public function setCancelUrl(string $cancelUrl): self
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    public function getClientLanguage(): string
    {
        return $this->clientLanguage;
    }

    public function setClientLanguage(string $clientLanguage): self
    {
        $this->clientLanguage = $clientLanguage;

        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(?string $clientEmail): self
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public static function views(): array
    {
        return [
            self::VIEW_CREDITCARD,
            self::VIEW_DIRECTDEBIT,
            self::VIEW_SWISH
        ];
    }

    public static function purchaseOperations(): array
    {
        return [
            self::PURCHASE_OPERATION_AUTHORIZATION,
            self::PURCHASE_OPERATION_SALE
        ];
    }
}