<?php

namespace SnappMarket\Delivery\DTO;

class CancelDeliveryDTO
{
    /** @var int */
    private $orderId;

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): CancelDeliveryDTO
    {
        $this->orderId = $orderId;
        return $this;
    }
}