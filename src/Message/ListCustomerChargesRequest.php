<?php

namespace Omnipay\Pin\Message;

/**
 * List Customers Request
 */
class ListCustomerChargesRequest extends AbstractRequest
{

    public function getCustomerToken() {
        return $this->getParameter('customer_token');
    }

    public function setCustomerToken($value) {
        return $this->setParameter('customer_token', $value);
    }

    public function getToken() {
        return $this->getCustomerToken();
    }

    public function setToken($value) {
        return $this->setCustomerToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['customer_token'] = $this->getToken();
        return $data;    }

    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_GET,'/customers/'.$this->getToken().'/charges', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
