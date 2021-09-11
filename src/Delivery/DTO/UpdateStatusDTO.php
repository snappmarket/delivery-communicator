<?php

namespace SnappMarket\Delivery\DTO;

class UpdateStatusDTO
{
    /** @var int */
    private $orderTrackingId;

    /** @var int */
    private $orderId;

    /** @var string */
    private $orderStatus;

    /** @var string */
    private $bikerName;

    /** @var string */
    private $bikerPhone;

    public function __construct(
        int $orderTrackingId,
        int $orderId,
        string $orderStatus,
        string $bikerName = '',
        string $bikerPhone = ''
    ) {
        $this->orderTrackingId = $orderTrackingId;
        $this->orderId = $orderId;
        $this->orderStatus = $orderStatus;
        $this->bikerName = $bikerName;
        $this->bikerPhone = $bikerPhone;
    }

    public function getOrderTrackingId(): int
    {
        return $this->orderTrackingId;
    }

    public function setOrderTrackingId(int $orderTrackingId): UpdateStatusDTO
    {
        $this->orderTrackingId = $orderTrackingId;
        return $this;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): UpdateStatusDTO
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(string $orderStatus): UpdateStatusDTO
    {
        $this->orderStatus = $orderStatus;
        return $this;
    }

    public function getBikerName(): string
    {
        return $this->bikerName;
    }

    public function setBikerName(string $bikerName): UpdateStatusDTO
    {
        $this->bikerName = $bikerName;
        return $this;
    }

    public function getBikerPhone(): string
    {
        return $this->bikerPhone;
    }

    public function setBikerPhone(string $bikerPhone): UpdateStatusDTO
    {
        $this->bikerPhone = $bikerPhone;
        return $this;
    }
}