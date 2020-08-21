<?php

/*
 * This file is part of the cblink-service/pay.
 *
 * (c) Nick <i@xieying.vip>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Payment;

class PayConst
{
    // 渠道
    const CHANNEL_CHINA_PAY = 'china_pay';
    const CHANNEL_PING_PP = 'pingpp';
    const CHANNEL_WECHAT_PAY = 'wechat';
    const CHANNEL_ALIPAY = 'alipay';

    // 支付方式
    const PLATFORM_ALIPAY = 'alipay';
    const PLATFORM_WECHATPAY = 'wechatpay';
    const PLATFORM_UNION = 'unionpay';

    // 支付类型
    const PAY_JSAPI = 'jsapi';
    const PAY_H5 = 'h5';
    const PAY_APP = 'app';
    const PAY_MINI = 'mini';
    const PAY_NATIVE = 'native';
    const PAY_QRCODE = 'qrcode';
}
