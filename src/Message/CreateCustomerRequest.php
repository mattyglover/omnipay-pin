<?php

namespace Omnipay\Pin\Message;

/**
 * Pin Purchase Request
 */
class CreateCustomerRequest extends AbstractRequest
{

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getCardToken()
    {
        return $this->getParameter('card_token');
    }

    public function setCardToken($value)
    {
        return $this->setParameter('card_token', $value);
    }

    public function getToken() {
        return $this->getCardToken();
    }

    public function setToken($value) {
        return $this->setCardToken($value);
    }

    public function getData()
    {
        $data = array();
        $data['email'] = $this->getEmail();

        if ($token = $this->getToken()) {
            $data['card_token'] = $token;
        } else {
            $this->getCard()->validate();

            $data['card']['number'] = $this->getCard()->getNumber();
            $data['card']['expiry_month'] = $this->getCard()->getExpiryMonth();
            $data['card']['expiry_year'] = $this->getCard()->getExpiryYear();
            $data['card']['cvc'] = $this->getCard()->getCvv();
            $data['card']['name'] = $this->getCard()->getName();
            $data['card']['address_line1'] = $this->getCard()->getAddress1();
            $data['card']['address_line2'] = $this->getCard()->getAddress2();
            $data['card']['address_city'] = $this->getCard()->getCity();
            $data['card']['address_postcode'] = $this->getCard()->getPostcode();
            $data['card']['address_state'] = $this->getCard()->getState();
            $data['card']['address_country'] = $this->getCard()->getCountry();
        }

        return $data;
    }


    public function sendData($data) {

        $httpResponse = $this->sendRequest('/customers', $data);

        return $this->response = new Response($this, $httpResponse->json());
    }

}
