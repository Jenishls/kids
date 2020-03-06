<?php
namespace App\Lib\Authorize;

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizePay
{
    private function setMerchantAuthentication()
    {        
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(default_company('authorize_net_name'));
        $merchantAuthentication->setTransactionKey(default_company('authorize_net_transaction_key'));
        return $merchantAuthentication;
    }

    private function setPayment($data)
    {
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($data['card']);
        $creditCard->setExpirationDate($data['expy'] . '-' . $data['expm']);
        if(isset($data['code']))
            $creditCard->setCardCode($data['code']);
        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        return $paymentOne;
    }

    private function createOrder($data)
    {
        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($data['inv_number']);
        $order->setDescription($data['des']);
        return $order;
    }

    private function setCustomerAddress($data)
    {
        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($data['first_name']);
        $customerAddress->setLastName($data['last_name']);
        if(array_key_exists('company', $data))
        $customerAddress->setCompany($data['company']);
        if(array_key_exists('address', $data))
        $customerAddress->setAddress($data['address']);
        if(array_key_exists('city', $data))
        $customerAddress->setCity($data['city']);
        if(array_key_exists('state', $data))
        $customerAddress->setState($data['state']);
        if(array_key_exists('zip', $data))
        $customerAddress->setZip($data['zip']);
        if(array_key_exists('country', $data))
        $customerAddress->setCountry($data['country']);
        return $customerAddress;
    }

    private function setCustomerData($data)
    {
        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        if(array_key_exists('cus_type', $data))
        $customerData->setType($data['cus_type']);
        if(array_key_exists('cus_id', $data))
        $customerData->setId($data['cus_id']);
        if(array_key_exists('cus_email', $data))
        $customerData->setEmail($data['cus_email']);
        return $customerData;
    }

    private function setUserField($data)
    {
        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField = new AnetAPI\UserFieldType();
        $merchantDefinedField->setName($data['name']);
        $merchantDefinedField->setValue($data['value']);
        return $merchantDefinedField;
    }

    private function setWindowSetting()
    {
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");
        return $duplicateWindowSetting;
    }

    public function authorizeCreditCard($data)
    {
        $amount = $data['amount'];
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        $paymentOne = $this->setPayment($data);
        $order = $this->createOrder($data);
        $customerAddress = $this->setCustomerAddress($data);
        // $customerData = $this->setCustomerData($data);
        // Add values for transaction settings
        // $duplicateWindowSetting = $this->setWindowSetting();
        $merchantDefinedField1 = $this->setUserField(['name' => 'memberLoyaltyNum', 'value' => '45646']);
        $merchantDefinedField2 = $this->setUserField(['name' => 'favoriteColor', 'value' => 'blue']);
        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authOnlyTransaction"); 
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        // $transactionRequestType->setCustomer($customerData);
        // $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        // $transactionRequestType->addToUserFields($merchantDefinedField1);
        // $transactionRequestType->addToUserFields($merchantDefinedField2);
        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        $final_response = ['status' => 0];
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    // echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    // echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $final_response = [
                        'status' => 1,
                        'data' => [
                            'id' => $tresponse->getTransId(),
                            'credit_card' => [
                                'type' => $tresponse->getAccountType(),
                                'number' => $tresponse->getAccountNumber(),
                                'expiry_month' => $data['expm'],
                                'expiry_year' => $data['expy'],
                                'first_name' => $data['first_name'],
                                'last_name' => $data['last_name']
                            ],
                            'transactions' => $tresponse->getTransId(),
                            'amount' => [
                                'total' => $data['amount'],
                                'currency' => 'USD'
                            ],
                            'ref_no' => $refId,
                            'state' => 'completed',
                        ],
                        'response' => $response
                    ];
                } else {
                    // echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        // echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        // echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                        $final_response = ['status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(), 'error' => $tresponse->getErrors()[0]->getErrorText()];
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                // echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    // echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    // echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    $final_response = ['status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(), 'error' => $tresponse->getErrors()[0]->getErrorText()];
                } else {
                    // echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    // echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                    $final_response = ['status' => 0, 'code' => $response->getMessages()->getMessage()[0]->getCode(), 'error' => $response->getMessages()->getMessage()[0]->getText()];
                }
            }      
        } else {
            $final_response = ['status' => 0, 'error' => 'Some Error occured, try again or try later !'];
        }
        return $final_response;
        
    }

    public function refundTransaction($refTransId, $amount, $card_number, $expy, $expm)
    {
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        // $paymentOne = $this->setPayment($data);
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($expy . '-' . $expm);
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        //create a transaction
        $transactionRequest = new AnetAPI\TransactionRequestType();
        $transactionRequest->setTransactionType("refundTransaction"); 
        $transactionRequest->setAmount($amount);
        $transactionRequest->setPayment($paymentOne);
        $transactionRequest->setRefTransId($refTransId);
     
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest( $transactionRequest);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null)
        {
          if($response->getMessages()->getResultCode() == "Ok")
          {
            $tresponse = $response->getTransactionResponse();
            
              if ($tresponse != null && $tresponse->getMessages() != null)   
            {
              echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
              echo "Refund SUCCESS: " . $tresponse->getTransId() . "\n";
              echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n"; 
                echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
            }
            else
            {
              echo "Transaction Failed \n";
              if($tresponse->getErrors() != null)
              {
                throw new \Exception($tresponse->getErrors()[0]->getErrorText(), 1);
                
                echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";            
              }
            }
          }
          else
          {

            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
            if($tresponse != null && $tresponse->getErrors() != null)
            {
                throw new \Exception($tresponse->getErrors()[0]->getErrorText(), 1);

              echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
              echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";                      
            }
            else
            {
                throw new \Exception($response->getMessages()->getMessage()[0]->getText(), 1);

              echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
              echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
          }      
        }
        else
        {
          echo  "No response returned \n";
        }
        return $response;
    }

    public function chargeCreditCard($data)
    {
        $amount = $data['amount'];
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        // Create the payment data for a credit card
        $paymentOne = $this->setPayment($data);
        // Create order information
        $order = $this->createOrder($data);
        // Set the customer's Bill To address
        $customerAddress = $this->setCustomerAddress($data);
        // Set the customer's identifying information
        $customerData = $this->setCustomerData($data);
        // Add values for transaction settings
        $duplicateWindowSetting = $this->setWindowSetting();
        // Add some merchant defined fields. These fields won't be stored with the transaction,
        // but will be echoed back in the response.
        $merchantDefinedField1 = $this->setUserField(['name'=> 'customerLoyaltyNum', 'value'=> '546546']);
        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
        // $transactionRequestType->addToUserFields($merchantDefinedField1);
        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        $final_response = array();
        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getMessages() != null) {                    
                    // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    // echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    // echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $final_response = [
                        'status' => 1,
                        'data' => [
                            'id' => $tresponse->getTransId(),
                            'credit_card' => [
                                'type' => $tresponse->getAccountType(),
                                'number' => $tresponse->getAccountNumber(),
                                'expiry_month' => $data['expm'],
                                'expiry_year' => $data['expy'],
                                'expiry' => date_create("{$data['expy']}-{$data['expm']}-01"),
                                'first_name' => $data['first_name'],
                                'last_name' => $data['last_name'],
                                'name_per_card' => $data['name_per_card']
                            ],
                            'transactions' => $tresponse->getTransId(),
                            'amount' => [
                                'total' => $data['amount'],
                                'currency' => 'USD'
                            ],
                            'ref_no' => $refId,
                            'state' => 'completed',
                        ],
                        'response' => $response
                    ];
                    return $final_response;
                } else {
//                    echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        $final_response = [
                            'status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(),
                            'error' => $tresponse->getErrors()[0]->getErrorText()
                        ];
                        return $final_response;
                        // echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        // echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
//                echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    // $final_response = ['status' => 0, 'code' => $response->getMessages()->getMessage()[0]->getCode(), 'error' => $response->getMessages()->getMessage()[0]->getText()];
                    $final_response = [
                        'status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(), 
                        'error' => $tresponse->getErrors()[0]->getErrorText()
                    ];
                    return $final_response;
                } else {
                    $final_response = ['status' => 0, 'code' =>$response->getMessages()->getMessage()[0]->getCode(), 'error' => $response->getMessages()->getMessage()[0]->getText()];
                    return $final_response;

//                    echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
//                    echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        }
        return $final_response;
    }

    public function captureFundsAuthorizedThroughAnotherChannel($data)
    {
        $amount = $data['amount'];
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        $paymentOne = $this->setPayment($data);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("captureOnlyTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($paymentOne);
        //Auth code of the previously authorized  amount
        $transactionRequestType->setAuthCode($data['authcode']);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransactionRequest( $transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null)
        {
          if($response->getMessages()->getResultCode() == "Ok")
          {
            $tresponse = $response->getTransactionResponse();
            
              if ($tresponse != null && $tresponse->getMessages() != null)   
            {
              echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
              echo "Successful." . "\n";
              echo "Capture funds authorized through another channel TRANS ID  : " . $tresponse->getTransId() . " Amount : $amount \n";
              echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n"; 
              echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
            }
            else
            {
              echo "Transaction Failed \n";
              if($tresponse->getErrors() != null)
              {
                echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";            
              }
            }
          }
          else
          {
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
            if($tresponse != null && $tresponse->getErrors() != null)
            {
              echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
              echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";                      
            }
            else
            {
              echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
              echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
          }      
        }
        else
        {
          echo  "No response returned \n";
        }
        return $response;
    }

    public function capturePreviouslyAuthorizedAmount($transactionid)
    {
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        // Now capture the previously authorized  amount
        echo "Capturing the Authorization with transaction ID : " . $transactionid . "\n";
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("priorAuthCaptureTransaction");
        $transactionRequestType->setRefTransId($transactionid);
        
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setTransactionRequest( $transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        if ($response != null)
        {
          if($response->getMessages()->getResultCode() == "Ok")
          {
            $tresponse = $response->getTransactionResponse();
            
              if ($tresponse != null && $tresponse->getMessages() != null)   
            {
                echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
                echo "Successful." . "\n";
                echo "Capture Previously Authorized Amount, Trans ID : " . $tresponse->getRefTransId() . "\n";
                echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n"; 
                  echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
            }
            else
            {
              echo "Transaction Failed \n";
              if($tresponse->getErrors() != null)
              {
                echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";            
              }
            }
          }
          else
          {
            echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
            if($tresponse != null && $tresponse->getErrors() != null)
            {
              echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
              echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";                      
            }
            else
            {
              echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
              echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            }
          }      
        }
        else
        {
          echo  "No response returned \n";
        }
        return $response;
    }

    private function setSubscription($data)
    {
        // Subscription Type Info
        new AnetAPI\ARBSubscriptionType();
        $subscription->setName($data['sub_type']);
        $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
        $interval->setLength($data['interval_length']);
        // days months years
        $interval->setUnit($data['unit']);
        $paymentSchedule = new AnetAPI\PaymentScheduleType();
        $paymentSchedule->setInterval($interval);
        $start_date = new DateTime(date('Y-m-d'));
        if(array_key_exists('start_date', $data)) $start_date = new DateTime($data['start_date']);
        $paymentSchedule->setStartDate($start_date);
        if(array_key_exists('total_occurance', $data))
        $paymentSchedule->setTotalOccurrences($data['total_occurance']);
        if(array_key_exists('trial_occurance', $data))
        $paymentSchedule->setTrialOccurrences($data['trial_occurance']);
        $subscription->setPaymentSchedule($paymentSchedule);
        if(array_key_exists('amount', $data))
        $subscription->setAmount($data['amount']);
        if(array_key_exists('trial_amount', $data))
        $subscription->setTrialAmount($data['trial_amount']);
        return $subscription;
    }

    public function createSubscription($data)
    {
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        // Subscription Type Info
        $subscription = $this->setSubscription($data);
        
        $payment = $this->setPayment($data);
        $subscription->setPayment($payment);
        $order = $this->createOrder($data);
        $subscription->setOrder($order); 
        
        $billTo = $this->setCustomerAddress($data);
        $subscription->setBillTo($billTo);
        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
         }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    public function cancelSubscription($subscriptionId)
    {
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $controller = new AnetController\ARBCancelSubscriptionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
        {
            $successMessages = $response->getMessages()->getMessage();
            echo "SUCCESS : " . $successMessages[0]->getCode() . "  " .$successMessages[0]->getText() . "\n";
         }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " . $errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    public function getListOfSubscriptions($data = [])
    {
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        $sorting = new AnetAPI\ARBGetSubscriptionListSortingType();
        $sorting->setOrderBy("id");
        $sorting->setOrderDescending(false);
        $paging = new AnetAPI\PagingType();
        $paging->setLimit("1000");
        if(array_key_exists('limit', $data))
            $paging->setLimit($data['limit']);
        $paging->setOffset("1");
        if(array_key_exists('offset', $data))
            $paging->setLimit($data['offset']);
        $request = new AnetAPI\ARBGetSubscriptionListRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSearchType("subscriptionInactive");
        if(array_key_exists('search_type', $data))
            $request->setSearchType($data['search_type']);
        $request->setSorting($sorting);
        $request->setPaging($paging);
        $controller = new AnetController\ARBGetSubscriptionListController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            echo "SUCCESS: Subscription Details:" . "\n";
            foreach ($response->getSubscriptionDetails() as $subscriptionDetails) {
                echo "Subscription ID: " . $subscriptionDetails->getId() . "\n";
            }
            echo "Total Number In Results:" . $response->getTotalNumInResultSet() . "\n";
        } else {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    public function updateSubscription($data)
    {
        $subscriptionId = $data['subscriptionId'];
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        $payment = $this->setPayment($data);
        $subscription->setPayment($payment);
        //set profile information
        $profile = new AnetAPI\CustomerProfileIdType();
        $profile->setCustomerProfileId("121212");
        $profile->setCustomerPaymentProfileId("131313");
        $profile->setCustomerAddressId("141414");
        //set customer profile information
        //$subscription->setProfile($profile);
        
        $request = new AnetAPI\ARBUpdateSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBUpdateSubscriptionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            $errorMessages = $response->getMessages()->getMessage();
            echo "SUCCESS Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            
         }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    }

    public function getSubscription($subscriptionId)
    {
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
            
        // Creating the API Request with required parameters
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $request->setIncludeTransactions(true);
            
        // Controller
        $controller = new AnetController\ARBGetSubscriptionController($request);
            
        // Getting the response
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
            
        if ($response != null) 
        {
            if($response->getMessages()->getResultCode() == "Ok")
            {
                // Success
                echo "SUCCESS: GetSubscription:" . "\n";
                // Displaying the details
                echo "Subscription Name: " . $response->getSubscription()->getName(). "\n";
                echo "Subscription amount: " . $response->getSubscription()->getAmount(). "\n";
                echo "Subscription status: " . $response->getSubscription()->getStatus(). "\n";
                echo "Subscription Description: " . $response->getSubscription()->getProfile()->getDescription(). "\n";
                echo "Customer Profile ID: " .  $response->getSubscription()->getProfile()->getCustomerProfileId() . "\n";
                echo "Customer payment Profile ID: ". $response->getSubscription()->getProfile()->getPaymentProfile()->getCustomerPaymentProfileId() . "\n";
                    $transactions = $response->getSubscription()->getArbTransactions();
                    if($transactions != null){
                foreach ($transactions as $transaction) {
                                echo "Transaction ID : ".$transaction->getTransId()." -- ".$transaction->getResponse()." -- Pay Number : ".$transaction->getPayNum()."\n";
                        }
            }
            }
            else
            {
                // Error
                echo "ERROR :  Invalid response\n"; 
                $errorMessages = $response->getMessages()->getMessage();
              echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            }
          }
        else
        {
            // Failed to get response
            echo "Null Response Error";
        }
        return $response;
    }

    public function creditBankAccount($data)
    {
        $amount = $data['amound'];
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        // Bank account number
        $AccountNumber= $data['account_number'];
        // Create the payment data for a Bank Account
        $bankAccount = new AnetAPI\BankAccountType();
        $bankAccount->setAccountType('checking');
        // see eCheck documentation for proper echeck type to use for each situation
        //$bankAccount->setEcheckType('WEB');
        $bankAccount->setRoutingNumber('122000661'); //('122235821'); //('125008547');
        $bankAccount->setAccountNumber($AccountNumber);
        $bankAccount->setNameOnAccount($data['accountholder_name']);
        $bankAccount->setBankName($data['bank_name']);
        
        $paymentBank= new AnetAPI\PaymentType();
        $paymentBank->setBankAccount($bankAccount);
        // Order info
        $order = $this->createOrder($data);
          //create a bank credit transaction
        
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("refundTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($paymentBank);
        $transactionRequestType->setOrder($order);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
                    echo  "Credit Bank Account APPROVED  :" . "\n";
                    echo  "Credit Bank Account AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                    echo  "Credit Bank Account TRANS ID  : " . $tresponse->getTransId() . "\n";
                    echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n";
                    echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
                } else {
                    echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
            } else {
                echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {
                    echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        } else {
            echo  "No response returned \n";
        }
        return $response;
    }

    function debitBankAccount($data)
    {
        $amount = $data['amount'];
        $merchantAuthentication = $this->merchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        //Generate random bank account number
        $AccountNumber= $data['account_number'];
        // Create the payment data for a Bank Account
        $bankAccount = new AnetAPI\BankAccountType();
        $bankAccount->setAccountType('checking');
        // see eCheck documentation for proper echeck type to use for each situation
        $bankAccount->setEcheckType('WEB');
        $bankAccount->setRoutingNumber('122000661');
        $bankAccount->setAccountNumber($AccountNumber);
        $bankAccount->setNameOnAccount($data['accountholder_name']);
        $bankAccount->setBankName($data['bank_name']);
        $paymentBank= new AnetAPI\PaymentType();
        $paymentBank->setBankAccount($bankAccount);
        // Order info
        $order = $this->createOrder($data);
        //create a bank debit transaction
        
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setPayment($paymentBank);
        $transactionRequestType->setOrder($order);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
                    echo " Debit Bank Account APPROVED  :" . "\n";
                    echo " Debit Bank Account AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                    echo " Debit Bank Account TRANS ID  : " . $tresponse->getTransId() . "\n";
                    echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n";
                    echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
                } else {
                    echo "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }
                }
            } else {
                echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {
                    echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        } else {
            echo  "No response returned \n";
        }
        return $response;
    }

    /**
     * PROFILES
     */

    function createCustomerProfile($email, $data)
    {
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
    
        // Create a Customer Profile Request
        //  1. (Optionally) create a Payment Profile
        //  2. (Optionally) create a Shipping Profile
        //  3. Create a Customer Profile (or specify an existing profile)
        //  4. Submit a CreateCustomerProfile Request
        //  5. Validate Profile ID returned
    
        // Set credit card information for payment profile
        /******
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber("4242424242424242");
        $creditCard->setExpirationDate("2038-12");
        $creditCard->setCardCode("142");
        $paymentCreditCard = new AnetAPI\PaymentType();
        $paymentCreditCard->setCreditCard($creditCard);
        */

        $paymentCreditCard = $this->setPayment($data);
    
        // Create the Bill To info for new payment type
        /*
        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName("Ellen");
        $billTo->setLastName("Johnson");
        $billTo->setCompany("Souveniropolis");
        $billTo->setAddress("14 Main Street");
        $billTo->setCity("Pecan Springs");
        $billTo->setState("TX");
        $billTo->setZip("44628");
        $billTo->setCountry("USA");
        $billTo->setPhoneNumber("888-888-8888");
        $billTo->setfaxNumber("999-999-9999");
        */

        $billTo = $this->setCustomerAddress($data);
    
        // Create a customer shipping address
        /*
        $customerShippingAddress = new AnetAPI\CustomerAddressType();
        $customerShippingAddress->setFirstName("James");
        $customerShippingAddress->setLastName("White");
        $customerShippingAddress->setCompany("Addresses R Us");
        $customerShippingAddress->setAddress(rand() . " North Spring Street");
        $customerShippingAddress->setCity("Toms River");
        $customerShippingAddress->setState("NJ");
        $customerShippingAddress->setZip("08753");
        $customerShippingAddress->setCountry("USA");
        $customerShippingAddress->setPhoneNumber("888-888-8888");
        $customerShippingAddress->setFaxNumber("999-999-9999");
        */

        $customerShippingAddress = $this->setCustomerAddress($data);
    
        // Create an array of any shipping addresses
        $shippingProfiles[] = $customerShippingAddress;    
    
        // Create a new CustomerPaymentProfile object
        $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
        $paymentProfile->setCustomerType('individual');
        $paymentProfile->setBillTo($billTo);
        $paymentProfile->setPayment($paymentCreditCard);
        $paymentProfiles[] = $paymentProfile;
    
        // Create a new CustomerProfileType and add the payment profile object
        $customerProfile = new AnetAPI\CustomerProfileType();
        $customerProfile->setDescription("testing customer profile brother");
        $customerProfile->setMerchantCustomerId("M_" . time());
        $customerProfile->setEmail($email);
        $customerProfile->setpaymentProfiles($paymentProfiles);
        $customerProfile->setShipToList($shippingProfiles);    
    
        // Assemble the complete transaction request
        $request = new AnetAPI\CreateCustomerProfileRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setProfile($customerProfile);
    
        // Create the controller and get the response
        $controller = new AnetController\CreateCustomerProfileController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
      
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            // echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
            $paymentProfiles = $response->getCustomerPaymentProfileIdList();
            // echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
            return [
                "profile_id" => $response->getCustomerProfileId(),
                "payment_id" => $paymentProfiles[0],
            ];
        } else {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    } 
    
    function chargeCustomerProfile($profileid, $paymentprofileid, $amount)
    {
        /* Create a merchantAuthenticationType object with authentication details
        retrieved from the constants file */
       
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
        
        $profileToCharge = new AnetAPI\CustomerProfilePaymentType();
        $profileToCharge->setCustomerProfileId($profileid);
        $paymentProfile = new AnetAPI\PaymentProfileType();
        $paymentProfile->setPaymentProfileId($paymentprofileid);
        $profileToCharge->setPaymentProfile($paymentProfile);
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType( "authCaptureTransaction"); 
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setProfile($profileToCharge);
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId( $refId);
        $request->setTransactionRequest( $transactionRequestType);
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null)
        {
            if($response->getMessages()->getResultCode() == "Ok")
            {
                $tresponse = $response->getTransactionResponse();
                
                if ($tresponse != null && $tresponse->getMessages() != null)   
                {
                    /*
                    echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
                    echo  "Charge Customer Profile APPROVED  :" . "\n";
                    echo " Charge Customer Profile AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                    echo " Charge Customer Profile TRANS ID  : " . $tresponse->getTransId() . "\n";
                    echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n"; 
                    echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    */
                    $final_response = [
                        'status' => 1,
                        'data' => [
                            'id' => $tresponse->getTransId(),
                            'credit_card' => [
                                'type' => $tresponse->getAccountType(),
                                'number' => $tresponse->getAccountNumber(),
                                'expiry_month' => '',
                                'expiry_year' => '',
                                'first_name' => '',
                                'last_name' => ''
                            ],
                            'transactions' => $tresponse->getTransId(),
                            'amount' => [
                                'total' => $amount,
                            ],
                            'ref_no' => $refId,
                            'state' => 'completed',
                        ],
                        'response' => $response
                    ];
                    return $final_response;
                }
                else
                {
                    // echo "Transaction Failed \n";
                    if($tresponse->getErrors() != null)
                    {
                        $final_response = [
                            'status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(),
                            'error' => $tresponse->getErrors()[0]->getErrorText()
                        ];
                        return $final_response;
                        // echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        // echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";            
                    }
                }
            }
            else
            {
                // echo "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
                if($tresponse != null && $tresponse->getErrors() != null)
                {
                    // echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    // echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";    
                    $final_response = [
                        'status' => 0, 'code' => $tresponse->getErrors()[0]->getErrorCode(), 
                        'error' => $tresponse->getErrors()[0]->getErrorText()
                    ];
                    return $final_response;                  
                }
                else
                {
                    $final_response = ['status' => 0, 'code' =>$response->getMessages()->getMessage()[0]->getCode(), 'error' => $response->getMessages()->getMessage()[0]->getText()];
                    return $final_response;
                    // echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    // echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }
            }
        }
        else
        {
            echo  "No response returned \n";
        }
        return $final_response;
    }

    function validateCustomerPaymentProfile($customerProfileId, $customerPaymentProfileId) {
        
        $merchantAuthentication = $this->setMerchantAuthentication();
        
        // Set the transaction's refId
        $refId = 'ref' . time();
    
        // Use an existing payment profile ID for this Merchant name and Transaction key
        //validationmode tests , does not send an email receipt
        $validationmode = "testMode";
        $request = new AnetAPI\ValidateCustomerPaymentProfileRequest();
        
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setCustomerProfileId($customerProfileId);
        $request->setCustomerPaymentProfileId($customerPaymentProfileId);
        $request->setValidationMode($validationmode);
        
        $controller = new AnetController\ValidateCustomerPaymentProfileController($request);
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            $validationMessages = $response->getMessages()->getMessage();
            echo "Response : " . $validationMessages[0]->getCode() . "  " .$validationMessages[0]->getText() . "\n";
        }
        else
        {
            echo "ERROR :  Validate Customer Payment Profile: Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }
        return $response;
    }
    
}