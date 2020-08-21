<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Payment\Refund;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Payment\Kernel\RefundDTO;

/**
 * Class Client
 * @package Cblink\Service\Payment\Refund
 */
class Client extends AbstractApi
{
    /**
     * @param $payload
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function create($payload)
    {
        if ($payload instanceof RefundDTO) {
            $payload = $payload->getPayload();
        }

        return $this->post('api/base/refund', $payload);
    }

    /**
     * @param $id
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function query($id)
    {
        return $this->get(sprintf('api/base/refund/%s', $id));
    }
}
