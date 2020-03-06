<?php

namespace App\Http\Controllers\CratesOnSkates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Authorize\AuthorizePay;
use App\Model\Client;
use App\Model\CustomerPaymentProfile;
use App\Services\Payment\{Payment,AuthorizeNet};
use Exception;

class PaymentController extends AmountCalculator
{   
    /**
     * Client which is doing the payment
     *
     * @var Client
     */
    protected $client;

    /**
     * Requested data
     *
     * @var Request
     */
    protected $request;

    /**
     * Name as per card
     * It is null when the submission is done with customer profile so need to set on chargeCustomerProfile method
     *
     * @var String
     */
    protected $name_per_card;

    /**
     * Initialize Payment
     *
     * @param array $paymentData | (can include getaway key default is authorize.net)
     * @return void
     */
    protected function initPayment(array $data){
        if(!$this->request->has('customer_profile')){ 
            //if there is no selected profile
            $transaction = $this->authorizePayment($data);
            $this->customerPaymentProfile($data, $transaction);
            return $transaction;
        }else{
            //payment with customer profile
            $paymentProfile = CustomerPaymentProfile::find($this->request->customer_profile);
            $this->name_per_card = $paymentProfile->name_per_card;
            if($paymentProfile->client_id === $this->client->id){
                return $this->chargeCustomerProfile($paymentProfile, $data['amount']);
            }else{
                throw new Exception("Sorry your saved credentials not working");
            }
        }
    }

    /**
     * Set the client
     *
     * @param Client $client
     * @return self
     */
    protected function withClient(Client $client) : self{
        $this->client = $client;
        return $this;
    }

    /**
     * Set the request
     *
     * @param Request $request
     * @return self
     */
    protected function withRequest(Request $request) :self{
        $this->request = $request;
        return $this;
    }

    /**
     * Make default authorize net payment
     *
     * @param array $data
     * @return void
     */
    public function authorizePayment(array $data){
        return app('payment.authorizeNet', $data)->makePayment();
    }
    
    /**
     * Create new customer profile
     *
     * @param array $data
     * @return Response
     */
    protected function customerProfile(array $data){
        $at = new AuthorizePay();
        return  $at->createCustomerProfile($data['email'], $data);        
    }

    /**
     * Charge client with profile
     *
     * @param CustomerPaymentProfile $profile
     * @param float $amount
     * @return void
     */
    protected function chargeCustomerProfile(CustomerPaymentProfile $profile, float $amount){
        $at = new AuthorizePay();
        $payment =  $at->chargeCustomerProfile($profile->profile_id, $profile->payment_id, $amount);
        if(gettype($payment) == "array" && isset($payment['error'])){
            throw new \Exception($payment['error'], 500);                
        }
        return $payment;
    }

    /**
     * Save or update customer profile
     *
     * @param array $data
     * @param [type] $transaction
     * @return CustomerPaymentProfile
     */
    public function customerPaymentProfile(array $data, $transaction) :CustomerPaymentProfile{
        $customerProfile = $this->customerProfile($data);
        return $this->duplicateCard($customerProfile, $transaction);        
    }

    /**
     * Check for customer profile duplication
     *
     * @param [type] $customerProfile
     * @param [type] $transaction
     * @return void
     */
    public function duplicateCard($customerProfile, $transaction){
        $paymentProfile = $this->client->paymentProfiles()->where([
            'card' => $transaction['data']['credit_card']['type'],
            'card_no' => $transaction['data']['credit_card']['number'],
        ])->first();
        return $paymentProfile ? $this->updatePaymentProfile($paymentProfile, $transaction) : $this->createPaymentProfile($customerProfile, $transaction);
    }

    /**
     * Update customer profile
     *
     * @param [type] $paymentProfile
     * @param [type] $transaction
     * @return CustomerPaymentProfile
     */
    public function updatePaymentProfile($paymentProfile, $transaction) :CustomerPaymentProfile{
        $paymentProfile->update([
            'card' => $transaction['data']['credit_card']['type'],
            'name_per_card'=> $transaction['data']['credit_card']['name_per_card'],
            'card_no' => $transaction['data']['credit_card']['number'],
            'expiry' => $transaction['data']['credit_card']['expiry'],
        ]);
        return $paymentProfile;
    }

    /**
     * Store customer profile
     *
     * @param [type] $customerProfile
     * @param [type] $transaction
     * @return CustomerPaymentProfile
     */
    public function createPaymentProfile($customerProfile, $transaction) :CustomerPaymentProfile{
        return CustomerPaymentProfile::create(
            array_merge([
                'client_id' => $this->client->id,
                'card' => $transaction['data']['credit_card']['type'],
                'name_per_card'=> $transaction['data']['credit_card']['name_per_card'],
                'card_no' => $transaction['data']['credit_card']['number'],
                'expiry' => $transaction['data']['credit_card']['expiry'],
            ], $customerProfile)
        );
    }

}
