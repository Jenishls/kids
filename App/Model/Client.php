<?php

namespace App\Model;

use App\Lib\ProgrammableSMS\SMSReader;
use App\Model\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Model\Address;

class Client extends Model
{
    protected $guarded = [];
    protected $with = ['address', 'contact', 'image'];
    protected $appends = ['isLatest'];

    public static function boot()
    {
        parent::boot();
        Relation::morphMap([
            'clients' => static::class
        ]);
    }
    public function companies()
    {
        return $this->belongsToMany('App\Model\Company', 'company_clients', 'client_id', 'company_id')
            ->where('companies.is_deleted', 0);
        // return $this->belongsToMany(Client::class, CompanyClient::class, 'client_id', 'id', 'id', 'id')

    }

    public function fullname($mname = true)
    {
        if ($mname) {
            return ucwords(join(" " . $this->mname . " ", [$this->fname, $this->lname]));
        }
        return ucwords(join(" ", [$this->mname, $this->lname]));
    }

    public function getFirstNameAttribute()
    {
        return $this->fname;
    }

    public function getMiddleNameAttribute()
    {
        return $this->mname;
    }

    public function getLastNameAttribute()
    {
        return $this->lname;
    }

    public function getPersonalEmailAttribute()
    {
        return $this->email;
    }

    public function getFnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMobileNoAttribute()
    {
        return $this->phone_no;
    }

    public function image()
    {
        return $this->morphOne(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'profile');
    }

    public function attachments()
    {
        return $this->morphMany(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'attachment');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function ordersAssociatedPhones()
    {
        return Address::whereIn('id', $this->orders->pluck('shipping_addr_id')->all())->get()->pluck('phone')->all();
    }


    public function getSmsLogs()
    {
        $logs = [];
        foreach ($this->ordersAssociatedPhones() as $phone) {
            $twilio = app('twilio.client.inbound');
            $logs = array_merge(
                $logs,
                $twilio
                    ->phone("+" . default_company('default_phone_code') . $phone)
                    ->getReplies()
                    ->getMessages()
            );
        }
        return $logs;
    }

    public function latestOrder()
    {
        return $this->hasOne(Order::class, 'client_id', 'id')->latest();
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable', 'table', 'table_id')->where('is_deleted', 0)->latest('updated_at');
    }

    public function address()
    {
        return $this->morphMany(Address::class, 'addressable', 'table', 'table_id')->where('is_deleted', 0);
    }

    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable', 'table', 'table_id')->where('is_deleted', 0);
    }

    public function payments()
    {
        $payments = [];
        if ($this->orders) {
            foreach ($this->orders as $order) {
                if ($order->payments) {
                    foreach ($order->payments as $payment) {
                        $payment->load('order');
                        $payments[] = $payment;
                    }
                }
            }
        }
        return collect($payments);
    }

    public function comm_preferences()
    {
        return $this->belongsToMany('App\Model\Lookup\Lookup', 'client_communication_preferences', 'client_id', 'comm_preference_id')
            ->where('lookups.is_deleted', 0);
    }
    public function getIsLatestAttribute()
    {
        if ($this->id == Client::latest('updated_at')->first()->id) {
            return true;
        }
        return false;
    }

    public function paymentProfiles()
    {
        return $this->hasMany(CustomerPaymentProfile::class);
    }
}
