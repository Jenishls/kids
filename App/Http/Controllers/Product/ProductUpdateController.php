<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Size;
use App\Model\Color;
use App\Model\File as FileUpload;
use App\Model\ProductCategory;
use App\Model\Category;
use App\Model\FaqReply;
use App\Model\Review;
use App\Model\ProductColor;
use App\Model\ProductFeature;
use App\Model\Inventory;
use App\Model\ProductInventory;
use App\Model\ProductSize;
use App\Model\AddOn;
use Auth;
use DateTime;
use Illuminate\Support\Facades\File;


class ProductUpdateController extends Controller
{
    public function updateProduct(Request $request, Product $product){
        $d  = DateTime::createFromFormat('m/d/Y', $request->manu_date);
        $product->code = $request->code?:$product->code;
        $product->name = $request->name?:$product->name;
        $product->short_desc = $request->desc?:$product->short_desc;
        $product->manufacture_date = $d?:$product->manufacture_date;
        $product->brand_id = $request->brand_id?:$product->brand_id;
        $product->unit_price_label = $request->unit_price_label?:$product->unit_price_label;
        $product->damage_price = $request->damage_price?:$product->damage_price;
        $product->damage_price_type = $request->damage_price_type?:$product->damage_price_type;
        $product->update();

        $check = AddOn::where('product_id', $product->id)->first();
        if($check){
            $check->step = $request->step;
            $check->sales = $request->sales;
            $check->update(); 
        }
        else{
            $adds_on = new AddOn;
            $adds_on->product_id = $product->id;
            $adds_on->step = $request->step;
            $adds_on->sales = $request->sales;
            $adds_on->userc_id = Auth::id();
            $adds_on->save();
        }

        $pc = ProductCategory::where('product_id', $product->id)->first();
        if($pc){
            $pc->category_id = $request->category_id?:$pc->category_id;
            $pc->sub_category = $request->sub_category_id?:$pc->sub_category;
            $pc->child_category = $request->child_category_id?:$pc->child_category;
            $pc->update();
        }
        else {
            $pc = new ProductCategory;
            $pc->product_id = $product->id;
            $pc->category_id = $request->category_id;
            $pc->sub_category = $request->sub_category_id;
            $pc->child_category = $request->child_category_id;
            $pc->save();
        }
        return response()->json([
            "message" => "Product Updated Successfully.",
            "data" => $product
        ]);     
    }
    
    public function ProductUpdateInfo(Request $request, Product $product){
        $product->title = $request->title?:$product->title;
        $product->sub_title = $request->sub_title?:$product->sub_title;
        $product->weight = $request->weight?:$product->weight;
        $product->weight_type = $request->weight_type?:$product->weight_type;
        $product->manufacture_date = $request->manufacture_date?:$product->manufacture_date;
        $product->unit_price_label = $request->unit_price_label?:$product->unit_price_label;
        $product->update();
        return response()->json([
            "message" => "Additional Info Updated Successfully.",
            "data" => $product
        ]);     
    }
    
    public function updateProductDescription(Request $request, Product $product){
        $product->short_desc = $request->short_desc?:$product->short_desc;
        $product->useru_id = Auth::id();
        $product->update();
        return response()->json([
            "message" => "Description Updated Successfully.",
            "data" => $product
        ]);   
    }

    public function ProductUpdateColor(Request $request, ProductColor $color){
        if(is_numeric($request->color_id)){
            $check = ProductColor::where('product_id', $color->product_id)->where('color_id', $request->color_id)->first();
            if(!$check){
                $color->product_id = $color->product_id;
                $color->color_id = $request->color_id;
                $color->useru_id = Auth::id();
                $color->update();
                return response()->json([
                    "message" => "Color Added Successfully.",
                    "data" => $color
                ]); 
            }
            else{
                $image_upload = "";
                if($request->image){
                    $image_upload = $this->uploadImage($request->image);
                }
                $saveColor = Color::find($color->color_id);
                $saveColor->color = $saveColor->color;
                $saveColor->color_code = $request->color_code;
                $saveColor->seq_no = $request->seq;
                $saveColor->image = $image_upload;
                $saveColor->update();
                return response()->json([
                    "message" => "Color Already exists.",
                    "data" => ""
                ]); 
            }
        }
        else{
            $image_upload = "";
            if($request->image){
                $image_upload = $this->uploadImage($request->image);
            }

            $saveColor = new Color;
            $saveColor->color = $request->color_id;
            $saveColor->color_code = $request->color_code;
            $saveColor->seq_no = $request->seq;
            $saveColor->image = $image_upload;
            $saveColor->save();

            $pc = new ProductColor;
            $pc->product_id = $color->product_id;
            $pc->color_id = $saveColor->id;
            $pc->save();

            return response()->json([
                "message" => "Color Added Successfully.",
                "data" => $color
            ]); 
        }
    }
    
    public function ProductUpdateSize(Request $request, ProductSize $size){
        if(is_numeric($request->size)){
            $check = ProductSize::where('product_id', $size->product_id)->where('size_id', $request->size)->first();
            if(!$check){
                $size->product_id = $size->product_id;
                $size->size_id = $request->size;
                $size->useru_id = Auth::id();
                $size->update();
                return response()->json([
                    "message" => "Size Added Successfully.",
                    "data" => $size
                ]); 
            }
            else{
                return response()->json([
                    "message" => "Size Already exists.",
                    "data" => ""
                ]); 
            }
        }
        else{
            $saveSize = new Size;
            $saveSize->size = $request->size;
            $saveSize->high = $request->high;
            $saveSize->wide = $request->wide;
            $saveSize->long = $request->long;
            $saveSize->measurement_type = $request->measurement_type;
            $saveSize->userc_id = Auth::id();
            $saveSize->save();

            $size->product_id = $size->product_id;
            $size->size_id = $saveSize->id;
            $size->useru_id =Auth::id();
            $size->update();

            return response()->json([
                "message" => "Size Added Successfully.",
                "data" => $size
            ]); 
        }
    }
    
    public function ProductUpdateReview(Request $request, Review $review){
        $review->title = $request->title?:$review->title;
        $review->content = $request->content?:$review->content;
        $review->stars = $request->stars?:$review->stars;
        $review->useru_id = Auth::id();
        $review->update();
        return response()->json([
            "message" => "Review Updated Successfully.",
            "data" => $review
        ]); 
    }
    
    public function ProductUpdateFeature(Request $request, ProductFeature $feature){
        $feature->feature = $request->feature?:$feature->feature;
        $feature->useru_id = Auth::id();
        $feature->update();
        return response()->json([
            "message" => "Feature Updated Successfully.",
            "data" => $feature
        ]); 
    }
    
    public function ProductUpdateFaqReply(Request $request, FaqReply $faq){
        $faq->answer = $request->answer?:$faq->answer;
        $faq->useru_id = Auth::id();
        $faq->update();
        return response()->json([
            "message" => "FAQ Reply Updated Successfully.",
            "data" => $faq
        ]); 
    }
    
    public function updateProductCategory(Request $request, $product){
        \DB::beginTransaction();
        try{
            $category = ProductCategory::where('product_id', $product)->first();
            $check = is_numeric($request->category_id);
            $pc= Null;
            $psc= Null;
            $pgc= Null;
            if($check != true){
                $pc = new Category;
                $pc->category = $request->category_id;
                $pc->userc_id = Auth::id();
                $pc->save();
            }
            else{
                $pc = Category::find($request->category_id);
            }
            if($request->sub_category_id){
                if(!is_numeric($request->sub_category_id)){
                    $psc = new Category;
                    $psc->category = $request->sub_category_id;
                    $psc->parent_id = $pc->id;
                    $psc->userc_id = Auth::id();
                    $psc->save();
                }
                else{
                    $psc = Category::find($request->sub_category_id);
                }
            }
            
            if($request->child_category_id){
                if(!is_numeric($request->child_category_id)){
                    $pgc = new Category;
                    $pgc->category = $request->child_category_id;
                    $pgc->parent_id = $psc->id;
                    $pgc->userc_id = Auth::id();
                    $pgc->save();
                }
                else{
                    $pgc = Category::find($request->child_category_id);
                }
            }

            $category->category_id = $pc->id?:$category->category_id;
            $category->sub_category = $psc?$psc->id:$category->sub_category;
            $category->child_category = $pgc?$pgc->id:$category->child_category;
            $category->useru_id = Auth::id();
            $category->update();
            \DB::commit();
            return response()->json([
                "message" => "Category Updated Successfully.",
                "data" => $category
            ]); 
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function storeProductCategory(Request $request){
        \DB::beginTransaction();
        try{
            $check = is_numeric($request->category_id);
            if($check != true){
                $pc = new Category;
                $pc->category = $request->category_id;
                $pc->userc_id = Auth::id();
                $pc->save();
            }
            else{
                $pc = Category::find($request->category_id);
            }
            if($request->sub_category_id){
                if(!is_numeric($request->sub_category_id)){
                    $psc = new Category;
                    $psc->category = $request->sub_category_id;
                    $psc->parent_id = $pc->id;
                    $psc->userc_id = Auth::id();
                    $psc->save();
                }
                else{
                    $psc = Category::find($request->sub_category_id);
                }
            }
            
            if($request->child_category_id){
                if(!is_numeric($request->child_category_id)){
                    $pgc = new Category;
                    $pgc->category = $request->child_category_id;
                    $pgc->parent_id = $psc->id;
                    $pgc->userc_id = Auth::id();
                    $pgc->save();
                }
            }
            \DB::commit();
            return response()->json([
                "message" => "Category Added Successfully.",
                "data" => $check
            ]); 
        } 
        catch (\Exception $e) 
        {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }
    
    public function ProductUpdateInventory(Request $request, Inventory $inventory){
        $inventory->name = $request->name?:$inventory->name;
        $inventory->price = $request->price?:$inventory->price;
        $inventory->quantity = $request->quantity?:$inventory->quantity;
        $inventory->color_id = $request->color_id?:$inventory->color_id;
        $inventory->size_id = $request->size_id?:$inventory->size_id;
        $inventory->company_id = $request->company_id?:$inventory->company_id;
        $inventory->useru_id = Auth::id();
        $inventory->update();
        return response()->json([
            "message" => "Inventory Updated Successfully.",
            "data" => $inventory
        ]); 
    }
    
    public function ProductDeleteColor(ProductColor $color){
        $color->is_deleted = 1;
        $color->userd_id = Auth::id();
        $color->update();
        return response()->json([
            "message" => "Color Deleted Successfully.",
            "data" => $color
        ]); 
    }
    
    public function ProductUpdateThumb(Request $request, $product){
        $fileExtension = $request->file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("product/images"))) {
            mkdir(storage_path("product/images"), 0777, true);
        }
        $request->file->move(storage_path("product/images") . DIRECTORY_SEPARATOR, $fileName);

        $check = FileUpload::where('table_id', $product)->where('table_name', "Product_Thumb")->first();

        if(!$check){
            $file = new FileUpload;
            $file->type = $fileExtension;
            $file->file_name = $fileName;
            $file->table_name = "Product_Thumb";
            $file->table_id = $product;
            $file->userc_id = Auth::id();;
            $file->save();
            return response()->json([
                "message" => "Thumbnail Added Successfully.",
                "data" => $fileName
            ]); 
        }
        else{
            $check->type = $fileExtension;
            $check->file_name = $fileName;
            $check->useru_id = Auth::id();;
            $check->update();
            return response()->json([
                "message" => "Thumbnail Updated Successfully.",
                "data" => $fileName
            ]); 
        }
    }
    
    public function ProductUpdateImage(Request $request, FileUpload $image){
        $fileExtension = $request->file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("product/images"))) {
            mkdir(storage_path("product/images"), 0777, true);
        }
        $request->file->move(storage_path("product/images") . DIRECTORY_SEPARATOR, $fileName);

        $image->type = $fileExtension;
        $image->file_name = $fileName;
        $image->useru_id = Auth::id();;
        $image->update();
        
        return response()->json([
            "message" => "Image Updated Successfully.",
            "data" => $fileName
        ]);         
    }

    public function uploadImage($file){
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("product/colors/images"))) {
            mkdir(storage_path("product/colors/images"), 0777, true);
        }
        $file->move(storage_path("product/colors/images") . DIRECTORY_SEPARATOR, $fileName);
        return $fileName;
    }
}
