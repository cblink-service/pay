<?php


namespace Tests;

use Cblink\Service\Payment\Pay;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * @var Pay
     */
    protected $app;

    public function setUp(): void
    {
        parent::setUp();
        $this->app = $this->createApp();
    }

    public function createApp()
    {
        $config = [
            'private' => true,
            'base_url' => 'https://dev-pay.service.cblink.net/',
            'app_id' => 1,
            'key' => 'xxxxxxxxxxxxxxx',
            'secret' => 'xxxxxxxxxx',
        ];

        if (file_exists($path = 'config/pay.php')) {
            $config = include $path;
        }

        return new Pay($config);
    }
}