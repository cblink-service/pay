<?php

namespace Cblink\Service\Payment\Kernel;

use Cblink\DTO\DTO;
use Illuminate\Support\Arr;

/**
 * Class RefundDTO
 * @package Cblink\Service\Payment\Kernel
 */
class RefundDTO extends DTO
{

    public function rules(): array
    {
        return [
            'order_id' => ['required', 'integer'],
            'refund_no' => ['required', 'string', 'max:64'],
            'amount' => ['required', 'integer'],
            'remark' => ['required', 'string', 'max:150'],

            'notify_url' => ['nullable', 'url'],

            // 商品信息
            'goods' => ['nullable', 'array'],
            'goods.*' => ['required', 'array'],
            'goods.*.id' => ['required', 'string', 'max:20'],
            'goods.*.name' => ['required', 'string', 'max:50'],
            'goods.*.price' => ['required', 'integer', 'min:0'],
            'goods.*.num' => ['required', 'integer', 'min:1'],
        ];
    }

    public function getPayload()
    {
        return Arr::only($this->payload, array_keys($this->rules()));
    }
}