<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Address;
use App\Traits\StoreAudit;
use PHPUnit\Framework\Constraint\IsFalse;

class Member extends Model
{
    use StoreAudit;

    protected static $recordEvents= ['updated','created'];

    protected $guarded = [];

    protected $table = 'members';


   public function addresses()
   {
        return $this->hasMany(Address::class);
   } 
   public function address()
   {
       return $this->hasOne(Address::class)->where('is_deleted', 0);
   }

   public function contact()
   {
       return $this->morphOne(Contact::class, 'contactable', 'table', 'table_id')->where('is_deleted', 0);
   }
   public function storeAddress(array $address){
     return $this->addresses()->create($this->formatAddress($address));
   }

   public function formatAddress(array $address){
     return $address;
   }
  public function fullname($middlename = true){
     if($middlename){
          return ucwords(join(" ".$this->middle_name." ", [$this->first_name, $this->last_name]));
     }
     return ucwords(join(" ", [$this->first_name, $this->last_name]));
   }
   
  public function image()
  {
    return $this->hasOne(File::class,'table_id','id')->where([
                          'table_name' => 'members',
                          'is_deleted' => 0,
                          'type' => 'profile'
                    ])->where('is_deleted', 0);
  }

}
