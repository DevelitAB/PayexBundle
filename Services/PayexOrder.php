<?php

namespace DevelitAB\PayexBundle\Services;

use DevelitAB\PayexBundle\Utils\PayexHash;

/**
 * Service that handles calling PxOrder API.
 * http://www.payexpim.com/category/pxorder/
 */
class PayexOrder
{
    private $pxOrderWSDL;
    private $payexHash;
    private $soapObject;
    private $encryptionKey;

    public function __construct(bool $testMode, bool $md5, string $encryptionKey)
    {

        $this->payexHash = new PayexHash($md5);

        if (strval($testMode) == "STAGE") {
            $this->pxOrderWSDL = "https://external.externaltest.payex.com/pxorder/pxorder.asmx?WSDL";
        } else if ($testMode == true) {
            $this->pxOrderWSDL = "https://external.externaltest.payex.com/pxorder/pxorder.asmx?WSDL";
        } else {
            $this->pxOrderWSDL = "https://external.payex.com/pxorder/pxorder.asmx?WSDL";
        }

        $this->soapObject = new \SoapClient($this->pxOrderWSDL, array("trace" => 1));

        $this->encryptionKey = $encryptionKey;
    }

    /**
     * Returns the last SOAP request sent by this class.
     *
     * @return string a string containing headers and body of the last SOAP request.
     */
    public function getLastRequest()
    {

        $request = "Request headers: " . $this->soapObject->__GetLastRequestHeaders() . "\n" . "Request body: " . $this->soapObject->__getLastRequest();

        return $request;
    }

    /**
     * Returns the last SOAP response sent by this class.
     *
     * @return string a string containing headers and body of the last SOAP request.
     */
    public function getLastResponse()
    {
        $response = "Response headers: " . $this->soapObject->__getLastRequestHeaders() . "\n" . "Response body: " . $this->soapObject->__getLastResponse();

        return $response;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/addorderaddress2/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API.
     */
    public function addOrderAddress2($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->AddOrderAddress2($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'AddOrderAddress2Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/addsingleorderline2/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API.
     */
    public function addSingleOrderLine2($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->AddSingleOrderLine2($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'AddSingleOrderLine2Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/getaddressbypaymentmethod/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API.
     */
    public function getAddressByPaymentMethod($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->GetAddressByPaymentMethod($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'GetAddressByPaymentMethodResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/initialize8/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API.
     */
    public function initialize8($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Initialize8($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'Initialize8Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/cancel2/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function cancel2($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Cancel2($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'Cancel2Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/capture5/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function capture5($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Capture5($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'Capture5Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/credit5/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function credit5($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Credit5($param);
        var_dump($result);

        $simpleResponseXML = new \SimpleXMLElement($result->{'Credit5Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/check2/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function check2($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Check2($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'Check2Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/gettransactiondetails2/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function gettransactiondetails2($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->GetTransactionDetails2($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'GetTransactionDetails2Result'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/purchasefinancinginvoice/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function purchasefinancinginvoice($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PurchaseFinancingInvoice($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PurchaseFinancingInvoiceResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/purchasecreditaccount/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function purchasecreditaccount($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PurchaseCreditAccount($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PurchaseCreditAccountResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/purchaseinvoiceprivate/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function purchaseinvoiceprivate($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PurchaseInvoicePrivate($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PurchaseInvoicePrivateResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/purchaseinvoicecorporate/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function purchaseinvoicecorporate($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PurchaseInvoiceCorporate($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PurchaseInvoiceCorporateResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/complete/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function complete($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->Complete($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'CompleteResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/finalizetransaction/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function finalizetransaction($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->FinalizeTransaction($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'FinalizeTransactionResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/technical-reference/pxorder/getapproveddeliveryaddress/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function getapproveddeliveryaddress($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->GetApprovedDeliveryAddress($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'GetApprovedDeliveryAddressResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/uncategorized/prepareswish/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function preparePurchaseSwish($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PreparePurchaseSwish($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PreparePurchaseSwishResult'});

        return $simpleResponseXML;
    }

    /**
     * http://www.payexpim.com/payment-methods/wywallet-mobilbetalning/
     * Hash will be calculated by the method, therefore send in an empty 'Hash' parameter.
     *
     * @param array $paramArray An array with the parameters you are sending.
     * @return object $simpleResponseXML A simpleXML-object of the response from PayEx API
     */
    public function purchasePremiumSms($paramArray)
    {

        $param = $this->payexHash->createHash($paramArray, $this->encryptionKey);

        $result = $this->soapObject->PurchasePremiumSms($param);

        $simpleResponseXML = new \SimpleXMLElement($result->{'PurchasePremiumSmsResult'});

        return $simpleResponseXML;
    }
}
