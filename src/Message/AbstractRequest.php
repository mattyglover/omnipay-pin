<?php

namespace Omnipay\Pin\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndpoint = 'https://api.pin.net.au/1';
    protected $testEndpoint = 'https://test-api.pin.net.au/1';

    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    const METHOD_PUT = 'put';

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function sendRequest($method = self::METHOD_GET, $action, $data = null)
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

        if ($method == self::METHOD_GET) {
            $httpResponse = $this->httpClient->get($this->getEndpoint() . $action, null, $data)
                ->setHeader('Authorization', 'Basic ' . base64_encode($this->getSecretKey() . ':'));
        }
        elseif ($method == self::METHOD_PUT) {
            $httpResponse = $this->httpClient->put($this->getEndpoint() . $action, null, $data)
                ->setHeader('Authorization', 'Basic ' . base64_encode($this->getSecretKey() . ':'));
        }
        else {
            $httpResponse = $this->httpClient->post($this->getEndpoint() . $action, null, $data)
                ->setHeader('Authorization', 'Basic ' . base64_encode($this->getSecretKey() . ':'));
        }

        return $httpResponse->send();
    }
}
