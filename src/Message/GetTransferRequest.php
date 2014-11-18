<?php

namespace Omnipay\Pin\Message;

/**
 * Get Customer Request
 */
class GetTransferRequest extends AbstractRequest
{


    public function getTransferToken() {
        return $this->getParameter('transfer_token');
    }

    public function setTransferToken($value) {
        return $this->setParameter('transfer_token', $value);
    }

    public function getToken() {
        return $this->getTransferToken();
    }

    public function setToken($value) {
        return $this->setTransferToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['transfer_token'] = $this->getToken();
        return $data;
    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/transfers/'.$this->getToken(), $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
