<?php

namespace Omnipay\Pin\Message;

/**
 * Pin Purchase Request
 */
class CreateTransferRequest extends AbstractRequest
{

    public function getRecipient() {
        return $this->getParameter('recipient');
    }

    public function setRecipient($value) {
        return $this->setParameter('recipient', $value);
    }


    public function getData()
    {
        $data = array();
        $data['description'] = $this->getDescription();
        $data['amount'] = $this->getAmountInteger();
        $data['currency'] = $this->getCurrency();
        $data['recipient'] = $this->getRecipient();

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest(self::METHOD_POST,'/transfers', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }
}
