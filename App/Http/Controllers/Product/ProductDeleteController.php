<?php

namespace App\Http\Controllers\product;

use App\Model\Product;
use App\Model\Size;
use App\Model\Color;
use App\Model\File;
use App\Model\ProductCategory;
use App\Model\FaqReply;
use App\Model\Review;
use App\Model\ProductColor;
use App\Model\ProductFeature;
use App\Model\Inventory;
use App\Model\ProductInventory;
use App\Model\ProductSize;
use App\Model\Faq;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDeleteController extends Controller
{
    public function deleteProduct(Product $product){
        $product->is_deleted = 1;
        $product->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $product
        ]); 
    }
    
    
    public function productDeleteColor(ProductColor $color){
        $color->is_deleted = 1;
        $color->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $color
        ]); 
    }
    
    public function productDeleteInventory(Inventory $inventory){
        $inventory->is_deleted = 1;
        $inventory->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $inventory
        ]); 
    }
    
    public function productDeleteSize(ProductSize $size){
        $size->is_deleted = 1;
        $size->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $size
        ]); 
    }

    public function productDeleteImage(File $image){
        $image->is_deleted = 1;
        $image->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $image
        ]); 
    }

    public function productDeleteFeature(productFeature $feature){
        $feature->is_deleted = 1;
        $feature->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $feature
        ]); 
    }

    public function productDeleteFaq(Faq $faq){
        $faq->is_deleted = 1;
        $faq->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $faq
        ]); 
    }

    public function productDeleteReview(Review $review){
        $review->is_deleted = 1;
        $review->update();
        return response()->json([
            "message" => "Product Deleted Successfully.",
            "data" => $review
        ]); 
    }


}
