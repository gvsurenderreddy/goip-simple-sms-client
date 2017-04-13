<?php

namespace AmaxLab\GoipSimpleSmsClient;

use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client
{
    const HTTP_PROTOCOL = 'http';

    const SEND_URL_PREFIX = 'default/en_US/send.html';

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
        $response = $this->httpClient->get($this->getSendSmsUrl().'?'.http_build_query([
            'u' => $this->userName,
            'p' => $this->password,
            'l' => $line,
            'n' => $phone,
            'm' => $message,
        ]));

        if ($response->getStatusCode() <> 200 || strpos($response->getBody(), 'ERROR') > 0) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    private function getSendSmsUrl()
    {
        return self::HTTP_PROTOCOL.'://'.$this->host.'/'.self::SEND_URL_PREFIX;
    }

}
