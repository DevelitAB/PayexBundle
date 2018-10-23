<?php

namespace DevelitAB\PayexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevelitAB\PayexBundle\Repository\PayexPaymentRepository")
 */
class PayexPayment
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={
     *     "unsigned": true
     * })
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={
     *     "unsigned": true
     * })
     */
    private $clientId;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $clientEmail;

    /**
     * @var float|null
     *
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true, options={
     *     "unsigned": true
     * })
     */
    private $amount;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=32)
     */
    private $currencyCode;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=128)
     */
    private $paymentMethod;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=1024)
     */
    private $orderRef;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=1024)
     */
    private $sessionRef;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=1024)
     */
    private $transactionRef;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=1024)
     */
    private $redirectUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=1024)
     */
    private $cancelUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint", nullable=true, options={
     *     "unsigned": true
     * })
     */
    private $transactionStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint", nullable=true, options={
     *     "unsigned": true
     * })
     */
    private $orderStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true, options={
     *     "unsigned": true
     * })
     */
    private $transactionNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true, length=512)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=4294967295)
     */
    private $requestDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true, length=4294967295)
     */
    private $responseDetails;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true, length=4294967295)
     */
    private $customData;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(?string $clientEmail): void
    {
        $this->clientEmail = $clientEmail;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getOrderRef(): ?string
    {
        return $this->orderRef;
    }

    public function setOrderRef(?string $orderRef): void
    {
        $this->orderRef = $orderRef;
    }

    public function getSessionRef(): ?string
    {
        return $this->sessionRef;
    }

    public function setSessionRef(?string $sessionRef): void
    {
        $this->sessionRef = $sessionRef;
    }

    public function getTransactionRef(): ?string
    {
        return $this->transactionRef;
    }

    public function setTransactionRef(?string $transactionRef): void
    {
        $this->transactionRef = $transactionRef;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(?string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function getCancelUrl(): ?string
    {
        return $this->cancelUrl;
    }

    public function setCancelUrl(?string $cancelUrl): void
    {
        $this->cancelUrl = $cancelUrl;
    }

    public function getTransactionStatus(): ?int
    {
        return $this->transactionStatus;
    }

    public function setTransactionStatus(?int $transactionStatus): void
    {
        $this->transactionStatus = $transactionStatus;
    }

    public function getOrderStatus(): ?int
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(?int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    public function getTransactionNumber(): ?int
    {
        return $this->transactionNumber;
    }

    public function setTransactionNumber(?int $transactionNumber): void
    {
        $this->transactionNumber = $transactionNumber;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getRequestDetails(): string
    {
        return $this->requestDetails;
    }

    public function setRequestDetails(string $requestDetails): void
    {
        $this->requestDetails = $requestDetails;
    }

    public function getResponseDetails(): ?string
    {
        return $this->responseDetails;
    }

    public function setResponseDetails(?string $responseDetails): void
    {
        $this->responseDetails = $responseDetails;
    }

    public function getCustomData(): ?string
    {
        return $this->customData;
    }

    public function setCustomData(?string $customData): void
    {
        $this->customData = $customData;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function isPurchaseSuccessful(): bool
    {
        return in_array($this->getTransactionStatus(), self::successfulTransactionStatuses());
    }

    public static function successfulTransactionStatuses(): array
    {
        return [
            0,
            1,
            3,
        ];
    }
}
