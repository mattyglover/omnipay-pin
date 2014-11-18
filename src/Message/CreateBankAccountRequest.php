<?php

namespace Omnipay\Pin\Message;

/**
 * Pin Purchase Request
 */
class CreateBankAccountRequest extends AbstractRequest
{

    public function getName() {
        return $this->getParameter('name');
    }

    public function setName($value) {
        return $this->setParameter('name', $value);
    }

    public function getBSB() {
        return $this->getParameter('bsb');
    }

    public function setBSB($value) {
        return $this->setParameter('bsb', $value);
    }

    public function getNumber() {
        return $this->getParameter('number');
    }

    public function setNumber($value) {
        return $this->setParameter('number', $value);
    }


    public function getData()
    {
        $data = array();
        $data['name'] = $this->getName();
        $data['bsb'] = $this->getBSB();
        $data['number'] = $this->getNumber();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest(self::METHOD_POST,'/bank_accounts', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }
}
