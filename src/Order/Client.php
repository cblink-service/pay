<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Payment\Order;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Payment\Kernel\OrderDTO;
use Ramsey\Uuid\Uuid;

/**
 * Class Client
 * @package Cblink\Service\Payment\Order
 */
class Client extends AbstractApi
{
    /**
     * 订单列表
     *
     * @param int $page
     * @param int $pageSize
     * @param array $params
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function lists($page = 1, $pageSize = 15, $params = [])
    {
        return $this->get('api/base/order', array_merge([
            'page' => $page,
            'page_size' => $pageSize
        ],$params));
    }

    /**
     * @param array|OrderDTO $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function create($payload = [])
    {
        if ($payload instanceof OrderDTO) {
            $payload = $payload->getPayload();
        }

        if (empty($payload['expired_time'])) {
            $payload['expired_time'] = 7200;
        }

        if (empty($payload['client_ip'])) {
            $payload['client_ip'] = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }

        if (empty($payload['request_id'])) {
            $payload['request_id'] = Uuid::uuid1()->toString();
        }

        if (empty($payload['original_amount'])) {
            $payload['original_amount'] = $payload['amount'];
        }

        if (empty($payload['currency'])) {
            $payload['currency'] = 'cny';
        }

        return $this->post('api/base/order', $payload);
    }

    /**
     * @param $id
     * @param bool $repay
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function query($id, $repay = false)
    {
        return $this->get(sprintf('api/base/order/%s', $id), [
            'repay' => (int) $repay
        ]);
    }

    /**
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function close($id)
    {
        return $this->post(sprintf('api/base/order/%s/close', $id));
    }
}
