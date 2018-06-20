<?php

namespace Bsadnu\PayexBundle\Services;

use Bsadnu\PayexBundle\DTO\PayexPayment as PayexPaymentDTO;
use Bsadnu\PayexBundle\Entity\PayexPayment;
use Doctrine\ORM\EntityManagerInterface;

class PaymentManager
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var int
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $encryptionKey;

    /**
     * @var bool
     */
    private $testMode;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var PayexOrder
     */
    private $pxOrder;

    /**
     * @param array $config
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(array $config, EntityManagerInterface $entityManager)
    {
        $this->setConfig($config);

        $this->accountNumber = $this->config['account_number'];
        $this->encryptionKey = $this->config['encryption_key'];
        $this->testMode = $this->config['test_mode'];

        $this->entityManager = $entityManager;

        $this->pxOrder = new PayexOrder($this->testMode, true, $this->encryptionKey);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function initializePayment(PayexPaymentDTO $payexPaymentDTO): PayexPayment
    {
        $initialize8Params = [
            'accountNumber' => $this->accountNumber,
            'purchaseOperation' => $payexPaymentDTO->getPurchaseOperation(),
            'price' => $payexPaymentDTO->getPrice(),
            'priceArgList' => $payexPaymentDTO->getPriceArgList(),
            'currency' => $payexPaymentDTO->getCurrency(),
            'vat' => $payexPaymentDTO->getVat(),
            'orderID' => $payexPaymentDTO->getOrderId(),
            'productNumber' => $payexPaymentDTO->getProductNumber(),
            'description' => $payexPaymentDTO->getDescription(),
            'clientIPAddress' => $payexPaymentDTO->getClientIPAddress(),
            'clientIdentifier' => $payexPaymentDTO->getClientIdentifier(),
            'additionalValues' => $payexPaymentDTO->getAdditionalValues(),
            'externalID' => $payexPaymentDTO->getExternalId(),
            'returnUrl' => $payexPaymentDTO->getReturnUrl(),
            'view' => $payexPaymentDTO->getView(),
            'agreementRef' => $payexPaymentDTO->getAgreementRef(),
            'cancelUrl' => $payexPaymentDTO->getCancelUrl(),
            'clientLanguage' => $payexPaymentDTO->getClientLanguage(),
            'hash' => $payexPaymentDTO->getHash()
        ];

        $response = $this->pxOrder->initialize8($initialize8Params);
        $lastRequest = $this->pxOrder->getLastRequest();

        if ($response->status->errorCode == 'OK' && !empty($response->redirectUrl)) {
            $redirectUrl = $response->redirectUrl;
        } else {
            throw new \RuntimeException('Payex server response error');
        }

        $payexPayment = $this->storePayexPayment(
            $payexPaymentDTO,
            $response->orderRef,
            $response->sessionRef,
            $lastRequest,
            $response
        );

        return $payexPayment;
    }

    public function completePayment($orderRef): bool
    {
        $completeParams = [
            'accountNumber' => $this->accountNumber,
            'orderRef' => $orderRef,
            'hash' => ''
        ];

        $payexPayment = $this
            ->entityManager
            ->getRepository(PayexPayment::class)
            ->findOneBy([
                'orderRef' => $orderRef
            ]);
        if (!$payexPayment) {
            throw new \InvalidArgumentException('Invalid orderRef.');
        }

        $response = $this->pxOrder->complete($completeParams);
        $this->pxOrder->getLastRequest();

        if ($response->status->errorCode == 'OK' ) {
            if (($response->transactionStatus == 0) || ($response->transactionStatus == 3)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function fillPayexPaymentDTO(
            $amount,
            $view,
            $currency,
            $returnUrl,
            $cancelUrl,
            $clientLanguage,
            $clientId,
            $clientEmail,
            $orderId,
            $productNumber,
            $description
    ): PayexPaymentDTO
    {
        $payexPaymentDTO = new PayexPaymentDTO();
        $payexPaymentDTO
            ->setAmount($amount);

        if ($view === PayexPaymentDTO::VIEW_CREDITCARD) {
            $payexPaymentDTO
                ->setPurchaseOperation(PayexPaymentDTO::PURCHASE_OPERATION_AUTHORIZATION)
                ->setPrice($amount * 100)
                ->setView($view);
        } elseif ($view === PayexPaymentDTO::VIEW_DIRECTDEBIT) {
            $payexPaymentDTO
                ->setPurchaseOperation(PayexPaymentDTO::PURCHASE_OPERATION_SALE)
                ->setPrice(0)
                ->setPriceArgList('SHB=' . $amount * 100 . ',NB=' . $amount * 100)
                ->setView($view);
        } elseif ($view === PayexPaymentDTO::VIEW_SWISH) {
            $payexPaymentDTO
                ->setPurchaseOperation(PayexPaymentDTO::PURCHASE_OPERATION_SALE)
                ->setPrice(0)
                ->setPriceArgList('SWISH=' . $amount * 100)
                ->setView($view);
        } else {
            throw new \InvalidArgumentException('View param invalid');
        }

        $payexPaymentDTO
            ->setCurrency($currency)
            ->setVat(0)
            ->setOrderId($orderId)
            ->setProductNumber($productNumber)
            ->setDescription($description)
            ->setClientIPAddress(filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP))
            ->setClientIdentifier('USERAGENT=' . filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_SPECIAL_CHARS))
            ->setAdditionalValues('RESPONSIVE=1')
            ->setReturnUrl($returnUrl)
            ->setCancelUrl($cancelUrl)
            ->setClientLanguage($clientLanguage)
            ->setClientId($clientId)
            ->setClientEmail($clientEmail)
            ->setAmount($amount)
        ;

        return $payexPaymentDTO;
    }

    public function storePayexPayment(PayexPaymentDTO $payexPaymentDTO, $orderRef, $sessionRef, $request, $response): PayexPayment
    {
        $payexPayment = new PayexPayment();
        $payexPayment->setClientId($payexPaymentDTO->getClientId());
        $payexPayment->setClientEmail($payexPaymentDTO->getClientEmail());
        $payexPayment->setAmount($payexPaymentDTO->getAmount());
        $payexPayment->setCurrencyCode($payexPaymentDTO->getCurrency());
        $payexPayment->setPaymentMethod($payexPaymentDTO->getView());
        $payexPayment->setOrderRef($orderRef);
        $payexPayment->setSessionRef($sessionRef);
        //$payexPayment->setTransactionRef($username);
        $payexPayment->setRedirectUrl($payexPaymentDTO->getReturnUrl());
        $payexPayment->setCancelUrl($payexPaymentDTO->getCancelUrl());
        //$payexPayment->setTransactionStatus($username);
        //$payexPayment->setOrderStatus($username);
        //$payexPayment->setTransactionNumber($username);
        $payexPayment->setOrderId($payexPaymentDTO->getOrderId());
        $payexPayment->setRequestDetails($request);
        $payexPayment->setResponseDetails($response);

        $this->entityManager->persist($payexPayment);
        $this->entityManager->flush();

        return $payexPayment;
    }
}
