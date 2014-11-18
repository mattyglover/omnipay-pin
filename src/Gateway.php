<?php

namespace Omnipay\Pin;

use Omnipay\Common\AbstractGateway;

/**
 * Pin Gateway
 *
 * @link https://pin.net.au/docs/api
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Pin';
    }

    public function getDefaultParameters()
    {
        return array(
            'secretKey' => '',
            'testMode' => false,
        );
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\PurchaseRequest', $parameters);
    }

    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\CreateCustomerRequest', $parameters);
    }

    public function createBankAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\CreateBankAccountRequest', $parameters);
    }

    public function createRecipient(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\CreateRecipientRequest', $parameters);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\CreateCardRequest', $parameters);
    }

    public function balance(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\BalanceRequest', $parameters);
    }

    public function listCustomers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\ListCustomersRequest', $parameters);
    }

    public function listCustomerCharges(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\ListCustomerChargesRequest', $parameters);
    }

    public function getCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\GetCustomerRequest', $parameters);
    }

    public function getRecipient(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\GetRecipientRequest', $parameters);
    }

    public function ListRecipientTransfers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\ListRecipientTransfersRequest', $parameters);
    }

    public function getCharge(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\GetChargeRequest', $parameters);
    }

    public function getTransfer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\GetTransferRequest', $parameters);
    }

    public function createTransfer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Pin\Message\CreateTransferRequest', $parameters);
    }


}
