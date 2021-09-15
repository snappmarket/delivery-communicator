<?php

namespace SnappMarket\Delivery;

use Exception;
use Psr\Log\LoggerInterface;
use SnappMarket\Communicator\Communicator as BaseCommunicator;
use SnappMarket\Delivery\DTO\CancelDeliveryDTO;
use SnappMarket\Delivery\DTO\UpdateStatusDTO;

class Communicator extends BaseCommunicator
{
    const SECURITY_TOKEN_HEADER = 'Service-Security';

    public function __construct(
        string $baseUri,
        array $headers = [],
        string $securityToken,
        ?LoggerInterface $logger = null
    ) {
        $headers[static::SECURITY_TOKEN_HEADER] = $securityToken;

        parent::__construct($baseUri, $headers, $logger);
    }

    public function updateOrderStatus(UpdateStatusDTO $updateStatusDTO): bool
    {
        $uri = 'api/v1/status';

        $response = $this->request(static::METHOD_PUT, $uri, [
            'order_id'         => $updateStatusDTO->getOrderId(),
            'order_tracking_id'         => $updateStatusDTO->getOrderTrackingId(),
            'order_status'         => $updateStatusDTO->getOrderStatus(),
            'biker_name'         => $updateStatusDTO->getBikerName(),
            'biker_phone'         => $updateStatusDTO->getBikerPhone(),
        ]);

        if ($response->getStatusCode() == 400) {
            $data = json_decode($response->getBody()->getContents(), true);
            $message = $data['error']['message'] ?? 'GENERIC ERROR';
            throw new Exception($message);
        } else if ($response->getStatusCode() != 200) {
            throw new Exception('COULD NOT CONNECT TO SERVER');
        }

        return true;
    }

    public function cancelDelivery(CancelDeliveryDTO $cancelDeliveryDTO): bool
    {
        $orderId = $cancelDeliveryDTO->getOrderId();
        $uri = "/orders/$orderId/cancel";

        $response = $this->request(static::METHOD_PUT, $uri, []);

        if ($response->getStatusCode() == 400) {
            $data = json_decode($response->getBody()->getContents(), true);
            $message = $data['error']['message'] ?? 'GENERIC ERROR';
            throw new Exception($message);
        } else if ($response->getStatusCode() != 200) {
            throw new Exception('COULD NOT CONNECT TO SERVER');
        }

        return true;
    }
}