<?php

namespace Bsadnu\PayexBundle\DTO;

use Bsadnu\PayexBundle\Entity\PayexPayment AS PayexPaymentEntity;

class PayexPaymentBunch
{
    /** @var PayexPaymentEntity */
    private $oldPayexPayment;

    /** @var PayexPaymentEntity */
    private $newPayexPayment;

    public function __construct(PayexPaymentEntity $oldPayexPayment, PayexPaymentEntity $newPayexPayment)
    {
        $this->setOldPayexPayment($oldPayexPayment);
        $this->setNewPayexPayment($newPayexPayment);
    }

    public function getOldPayexPayment(): PayexPaymentEntity
    {
        return $this->oldPayexPayment;
    }

    public function setOldPayexPayment(PayexPaymentEntity $oldPayexPayment): self
    {
        $this->oldPayexPayment = $oldPayexPayment;

        return $this;
    }

    public function getNewPayexPayment(): PayexPaymentEntity
    {
        return $this->newPayexPayment;
    }

    public function setNewPayexPayment(PayexPaymentEntity $newPayexPayment): self
    {
        $this->newPayexPayment = $newPayexPayment;

        return $this;
    }
}