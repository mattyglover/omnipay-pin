<?php

namespace Omnipay\Pin\Message;

/**
 * Get Customer Request
 */
class GetRecipientRequest extends AbstractRequest
{


    public function getRecipientToken() {
        return $this->getParameter('recipient_token');
    }

    public function setRecipientToken($value) {
        return $this->setParameter('recipient_token', $value);
    }

    public function getToken() {
        return $this->getRecipientToken();
    }

    public function setToken($value) {
        return $this->setRecipientToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['recipient_token'] = $this->getToken();
        return $data;
    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/recipients/'.$this->getToken(), $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
