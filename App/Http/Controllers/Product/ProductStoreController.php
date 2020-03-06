<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Model\AddOn;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Color;
use App\Model\Faq;
use App\Model\FaqReply;
use App\Model\File as FileUpload;
use App\Model\Inventory;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ProductColor;
use App\Model\ProductFeature;
use App\Model\ProductSize;
use App\Model\Review;
use App\Model\Size;
use Auth;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductStoreController extends Controller
{
    public function storeProduct(Request $request)
    {
        \DB::beginTransaction();
        try {
            $d = DateTime::createFromFormat('m/d/Y', $request->manu_date);

            $product = new Product;
            $product->code = $request->code;
            $product->name = $request->name;
            $product->short_desc = $request->desc;
            $product->manufacture_date = $d;
            $product->brand_id = $request->brand_id;
            $product->unit_price_label = $request->unit_price_label;
            $product->damage_price = $request->damage_price;
            $product->damage_price_type = $request->damage_price_type;
            $product->userc_id = Auth::id();
            $product->save();

            $adds_on = new AddOn;
            $adds_on->product_id = $product->id;
            $adds_on->step = $request->step;
            $adds_on->sales = $request->sales;
            $adds_on->userc_id = Auth::id();
            $adds_on->save();

            if ($request->category_id) {
                $pc = new ProductCategory;
                $pc->product_id = $product->id;
                $pc->category_id = $request->category_id;
                $pc->sub_category = $request->sub_category_id;
                $pc->child_category = $request->child_category_id;
                $pc->save();

            }

            \DB::commit();
            return response()->json([
                "message" => "Product added Successfully.",
                "data" => $product,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function storeProductCategory(Request $request)
    {
        \DB::beginTransaction();
        try {
            $check = is_numeric($request->category_id);
            if ($check != true) {
                $pc = new Category;
                $pc->category = $request->category_id;
                $pc->userc_id = Auth::id();
                $pc->save();
            } else {
                $pc = Category::find($request->category_id);
            }
            if ($request->sub_category_id) {
                if (!is_numeric($request->sub_category_id)) {
                    $psc = new Category;
                    $psc->category = $request->sub_category_id;
                    $psc->parent_id = $pc->id;
                    $psc->userc_id = Auth::id();
                    $psc->save();
                } else {
                    $psc = Category::find($request->sub_category_id);
                }
            }

            if ($request->child_category_id) {
                if (!is_numeric($request->child_category_id)) {
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
                "data" => $check,
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    public function storeProductColor(Request $request, $product)
    {
        $color_ids = array_filter($request->color_id, 'is_numeric');
        $saveNewColors = array_diff($request->color_id, $color_ids);
        $save_id = [];

        foreach ($saveNewColors as $color_name) {
            $image_upload = "";
            $idx = array_search($color_name, $request->color_id);
            if ($request->image[$idx]) {
                $image_upload = $this->uploadImage($request->image[$idx]);
            }

            $color = Color::create([
                'color' => $color_name,
                'seq_no' => $request->seq[$idx],
                'color_code' => $request->color_code[$idx],
                'image' => $image_upload,
            ]);
            $color_ids[] = $color->id;
        }

        foreach ($color_ids as $id) {
            $check = ProductColor::where('product_id', $product)->where('color_id', $id)->first();
            if (!$check) {
                $save_id[] = $id;
            }
        }

        Product::find($product)->colors()->attach($save_id);
        return response()->json([
            "message" => "Color Added Successfully.",
            "data" => $product,
        ]);
    }

    public function storeProductSize(Request $request, $product)
    {
        $size_ids = array_filter($request->size, 'is_numeric');
        $saveNewSize = array_diff($request->size, $size_ids);
        $save_id = [];

        foreach ($saveNewSize as $size) {
            $idx = array_search($size, $request->size);

            $size = Size::create([
                'size' => $size,
                'long' => $request->long[$idx],
                'wide' => $request->wide[$idx],
                'high' => $request->high[$idx],
                'measurement_type' => $request->measurement_type[$idx],
                'userc_id' => Auth::id(),
            ]);

            $size_ids[] = $size->id;
        }

        foreach ($size_ids as $id) {
            $check = ProductSize::where('product_id', $product)->where('size_id', $id)->first();
            if (!$check) {
                $save_id[] = $id;
            }
        }

        Product::find($product)->sizes()->attach($save_id);
        return response()->json([
            "message" => "Color Added Successfully.",
            "data" => $product,
        ]);
    }

    public function storeProductFeature(Request $request, $product)
    {
        foreach ($request->feature as $feature) {
            $size = ProductFeature::create([
                'product_id' => $product,
                'feature' => $feature,
                'userc_id' => Auth::id(),
            ]);
        }

        return response()->json([
            "message" => "Feature Added Successfully.",
            "data" => $product,
        ]);
    }

    public function storeProductReview(Request $request, $product)
    {
        $review = new Review;
        $review->product_id = $product;
        $review->stars = $request->stars;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->userc_id = Auth::id();
        $review->save();

        return response()->json([
            "message" => "Review Added Successfully.",
            "data" => $product,
        ]);
    }

    public function storeProductFaq(Request $request, $product)
    {
        $faq = new Faq;
        $faq->table = "FAQ";
        $faq->table_id = $product;
        $faq->question = $request->question;
        $faq->userc_id = Auth::id();
        $faq->save();

        return response()->json([
            "message" => "FAQ Added Successfully.",
            "data" => $product,
        ]);
    }

    public function replyProductFaq(Request $request, Faq $faq)
    {
        $faqReply = new FaqReply;
        $faqReply->faq_id = $faq->id;
        $faqReply->answer = $request->answer;
        $faqReply->userc_id = Auth::id();
        $faqReply->save();

        return response()->json([
            "message" => "FAQ Added Successfully.",
            "data" => $faq,
        ]);
    }

    public function storeProductQuestion(Request $request, $product)
    {
        $faq = new Faq;
        $faq->table = "Question";
        $faq->table_id = $product;
        $faq->question = $request->question;
        $faq->userc_id = Auth::id();
        $faq->save();

        return response()->json([
            "message" => "Question Added Successfully.",
            "data" => $product,
        ]);
    }

    public function replyProductQuestion(Request $request, Faq $faq)
    {
        $answer = new Faq;
        $answer->table = "Answer";
        $answer->table_id = $faq->table_id;
        $answer->parent_id = $faq->id;
        $answer->question = $request->answer;
        $answer->userc_id = Auth::id();
        $answer->save();

        return response()->json([
            "message" => "Answer Added Successfully.",
            "data" => $faq,
        ]);
    }

    public function storeProductInventory(Request $request, $product)
    {
        // dd($request->all());
        foreach ($request->name as $key => $name) {
            Inventory::create([
                'company_id' => $request->company_id[$key],
                'product_id' => $product,
                'name' => $name,
                'color_id' => $request->color_id[$key],
                'size_id' => $request->size_id[$key],
                'price' => $request->price[$key]?:$product->unit_price_label,
                'quantity' => $request->quantity[$key],
                'userc_id' => Auth::id(),
            ]);
        }

        return response()->json([
            "message" => "Inventory Added Successfully.",
            "data" => $product,
        ]);
    }

    public function storeProductImage(Request $request, $product)
    {
        foreach ($request->file as $file) {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = md5(time() . rand());
            $fileName .= "." . $fileExtension;

            if (!file_exists(storage_path("product/images"))) {
                mkdir(storage_path("product/images"), 0777, true);
            }
            $file->move(storage_path("product/images") . DIRECTORY_SEPARATOR, $fileName);

            $file = new FileUpload;
            $file->type = $fileExtension;
            $file->file_name = $fileName;
            $file->table_name = "Product";
            $file->table_id = $product;
            $file->userc_id = Auth::id();
            $file->save();

        }
        return response()->json([
            "message" => "Image Added Successfully.",
            "data" => $product,
        ]);
    }

    public function uploadImage($file)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = md5(time() . rand());
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path("product/colors/images"))) {
            mkdir(storage_path("product/colors/images"), 0777, true);
        }
        $file->move(storage_path("product/colors/images") . DIRECTORY_SEPARATOR, $fileName);
        return $fileName;
    }

    public function storeBrand(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->shortName = $request->shortName;
        $brand->seq_no = $request->seq_no;
        $brand->userc_id = Auth::id();
        $brand->save();

        return response()->json([
            "message" => "Brand Added Successfully.",
            "data" => $brand,
        ]);
    }
}
