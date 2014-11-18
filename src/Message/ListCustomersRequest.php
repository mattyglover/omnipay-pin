<?php

namespace Omnipay\Pin\Message;

/**
 * List Customers Request
 */
class ListCustomersRequest extends AbstractRequest
{

    public function getData()
    {
        $data = array();
        return $data;
    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/customers', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
