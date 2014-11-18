<?php

namespace Omnipay\Pin\Message;

/**
 * Get Customer Request
 */
class GetChargeRequest extends AbstractRequest
{


    public function getChargeToken() {
        return $this->getParameter('charge_token');
    }

    public function setChargeToken($value) {
        return $this->setParameter('charge_token', $value);
    }

    public function getToken() {
        return $this->getChargeToken();
    }

    public function setToken($value) {
        return $this->setChargeToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['charge_token'] = $this->getToken();
        return $data;
    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/charges/'.$this->getToken(), $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
