<?php

namespace Omnipay\Pin\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Pin Balance Request
 */
class BalanceRequest extends AbstractRequest
{
    protected $liveEndpoint = 'https://api.pin.net.au/1';
    protected $testEndpoint = 'https://test-api.pin.net.au/1';

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getData()
    {
        $data = array();
        return $data;
    }

    public function sendData($data)
    {
        // don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpResponse = $this->httpClient->get($this->getEndpoint().'/balance', null, $data)
            ->setHeader('Authorization', 'Basic '.base64_encode($this->getSecretKey().':'))
            ->send();

        return $this->response = new Response($this, $httpResponse->json());
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
