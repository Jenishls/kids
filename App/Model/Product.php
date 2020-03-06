<?php

namespace App\Model;

use App\Model\Brand;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['averagePrice', 'availableQuantity', 'inventoryHold', 'inventorySold', 'totalOrders', 'isRental'];
    public function thumb()
    {
        return $this->hasOne(File::class, 'table_id', 'id')->where('table_name', "Product_Thumb")->where('is_deleted', 0);
    }

    public function adds_on()
    {
        return $this->hasOne(AddOn::class, 'product_id', 'id')->where('is_deleted', 0);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id')->where('is_deleted', 0);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category', 'product_categories', 'product_id', 'category_id')
            ->where('product_categories.is_deleted', 0);
    }

    public function sub_categories()
    {
        return $this->belongsToMany('App\Model\Category', 'product_categories', 'product_id', 'sub_category')
            ->where('product_categories.is_deleted', 0);
    }

    public function child_categories()
    {
        return $this->belongsToMany('App\Model\Category', 'product_categories', 'product_id', 'child_category')
            ->where('product_categories.is_deleted', 0);
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color', 'product_colors', 'product_id', 'color_id')->where('product_colors.is_deleted', 0);
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Model\Size', 'product_sizes', 'product_id', 'size_id')->where('product_sizes.is_deleted', 0);
    }

    public function files()
    {
        return $this->hasMany(File::class, 'table_id', 'id')->where('table_name', "Product")->where('is_deleted', 0);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'product_id', 'id')->where('is_deleted', 0);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'table_id', 'id')->where('table', 'FAQ')->where('is_deleted', 0);
    }

    public function questions()
    {
        return $this->hasMany(Faq::class, 'table_id', 'id')->where('table', 'Question')->where('is_deleted', 0);
    }

    public function answered_questions()
    {
        return $this->hasMany(Faq::class, 'table_id', 'id')->where('table', 'Answer')->where('is_deleted', 0);
    }

    public function unAnswered_questions()
    {
        return $this->hasMany(Faq::class, 'table_id', 'id')->where('table', 'Answer')->where('is_deleted', 0);
    }

    // public function answeredQuestions()
    // {
    //     return $this->hasMany(FaqReply::class, 'table_id', 'id')->where('table', 'Answer')->where('is_deleted', 0);
    // }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id')->where('is_deleted', 0);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function getInventory()
    {
        return Inventory::where("product_id", $this->id)->first();
    }

    public function addon()
    {
        return $this->hasOne(AddOn::class, 'product_id', 'id');
    }

    public function addonRemaster(){
        return $this->hasOne(AddOn::class, 'product_id', 'id');
    }

    public function isRental(){
        return $this->addonRemaster ? $this->addon()->first()->sales === "rent" : false;
    }

    public function getIsRentalAttribute(){
        return $this->isRental();
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getAveragePriceAttribute()
    {
        if ($this->inventories->count()) {
            if (!($this->inventories->count() == 1)) {
                return number_format($this->inventories->average('price'), 2, '.', '');
            }
            return number_format($this->inventory->price, 2, '.', '');
        }
        return 0.00;
    }

    public function getAvailableQuantityAttribute()
    {
        return $this->inventories->sum('availableQuantity');
    }

    public function getInventoryHoldAttribute()
    {
        return $this->inventories->sum('inv_hold');
    }

    public function getInventorySoldAttribute()
    {
        return $this->inventories->sum('inv_sold');
    }

    public function getTotalOrdersAttribute()
    {
        return $this->inventories->sum('inv_sold');
    }
}
