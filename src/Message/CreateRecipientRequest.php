<?php

namespace Omnipay\Pin\Message;

/**
 * Pin Purchase Request
 */
class CreateRecipientRequest extends AbstractRequest
{

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getRecipientName() {
        return $this->getParameter('recipient_name');
    }

    public function setRecipientName($value) {
        return $this->setParameter('recipient_name', $value);
    }

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

    public function getBankAccount() {
        return $this->getParameter('bank_account');
    }

    public function setBankAccount($value) {
        return $this->setParameter('bank_account', $value);
    }

    public function getBankAccountToken()
    {
        return $this->getParameter('bank_account_token');
    }

    public function setBankAccountToken($value)
    {
        return $this->setParameter('bank_account_token', $value);
    }

    public function getToken() {
        return $this->getBankAccountToken();
    }

    public function setToken($value) {
        return $this->setBankAccountToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['email'] = $this->getEmail();
        $data['name'] = $this->getRecipientName();

        if ($token = $this->getToken()) {
            $data['bank_account_token'] = $token;
        }
        else {
            $data['bank_account']['name'] = $this->getBankAccount()['name'];
            $data['bank_account']['bsb'] = $this->getBankAccount()['bsb'];
            $data['bank_account']['number'] = $this->getBankAccount()['number'];
        }

        return $data;
    }


    public function sendData($data) {

        $httpResponse = $this->sendRequest(self::METHOD_POST,'/recipients', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
