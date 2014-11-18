<?php

namespace Omnipay\Pin\Message;

/**
 * Pin Balance Request
 */

class BalanceRequest extends AbstractRequest
{

    public function getData()
    {
        $data = array();
        return $data;
    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/balance', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
