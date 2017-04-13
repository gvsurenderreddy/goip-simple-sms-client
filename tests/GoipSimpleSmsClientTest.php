<?php

namespace AmaxLab\GoipSimpleSmsClient\Test;

use AmaxLab\GoipSimpleSmsClient\Client;
use PHPUnit_Framework_TestCase;

/**
 * @author Egor Zyuskin <e.zyuskin@mildberry.com>
 */
class GoipSimpleSmsClientTest extends PHPUnit_Framework_TestCase
{
    public function testSuccessConstruct()
    {
        $client = $this->createClient();
        $this->assertTrue($client instanceof Client);
    }

    public function testSendSns()
    {
        $this->assertTrue($this->createClient()->sendSms('123', '123'));
    }

    /**
     * @return Client
     */
    private function createClient()
    {
        return new Client('127.0.0.1', 'admin', 'admin');
    }
}
