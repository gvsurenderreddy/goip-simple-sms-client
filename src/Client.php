<?php

namespace AmaxLab\GoipSimpleSmsClient;

use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $userName;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var GuzzleHttpClient
     */
    protected $httpClient;

    /**
     * @param string $host
     * @param string $userName
     * @param string $password
     */
    public function __construct($host, $userName, $password)
    {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;

        $this->httpClient = new GuzzleHttpClient();
    }

    /**
     * @param string $phone
     * @param string $message
     * @param int    $line
     *
     * @return bool
     */
    public function sendSms($phone, $message, $line = 1)
    {
        return true;
    }

}
