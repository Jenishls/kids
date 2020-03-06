<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\Color;
use App\Model\ProductCategory;
use App\Model\Account;
use App\Model\Size;
use App\Model\ProductSize;
use App\Model\ProductFeature;
use App\Model\Brand;
use App\Model\Review;
use App\Model\Faq;
use App\Model\File as FileUpload;
use App\Model\Category;
use App\Model\Company;
use App\Model\Inventory;
use Illuminate\Support\Facades\File;
use Response;
use App\Lib\Filter\ProductFilter;


class ProductViewController extends Controller
{
    public function index(){
    	return view('supportNew.pages.product.index');
    }
    
    public function addProduct(){
        $brands = Brand::where('is_deleted', 0)->get();
        $categories = Category::where('is_deleted', 0)->get();
        return view('supportNew.pages.product.modal.add1',
        [
            "brands"=>$brands,
            "categories"=>$categories
        ]);
    }
    public function editProduct(Product $product){
        $brand = Brand::find($product->brand_id);
        $c = ProductCategory::where('product_id', $product->id)->first();
        if($c){
            $category = Category::find($c->category_id);
            $sub_cat = Category::where('id', $c->sub_category)->first();
            $child_cat = Category::where('id', $c->child_category)->first();
        }
        else{
            $category = "";
            $sub_cat = "";
            $child_cat = "";
        }
        return view('supportNew.pages.product.modal.edit',
        [
            "brand"=>$brand,
            "category"=> $category,
            "sub_cat"=> $sub_cat,
            "child_cat"=> $child_cat,
            "product"=> $product
        ]);
    }
    
    public function productDetail(Product $product){
        $thumb = FileUpload::where('table_name',"Product_Thumb")->where('table_id', $product->id)->first();
        return view('supportNew.pages.product.includes.detail',
        [
            "product"=> $product,
            "thumb"=> $thumb
        ]);
    }
    
    public function productTabOverall(Product $product){
        return view('supportNew.pages.product.tabs.overall.index',
        [
            "product"=> $product
        ]);
    }
    
    public function productTabCategory(Product $product){
        return view('supportNew.pages.product.tabs.category.index',
        [
            "product"=> $product
        ]);
    }
    
    public function addCategory(){
        return view('supportNew.pages.product.tabs.category.add');
    }
    
    public function addBrand(){
        return view('supportNew.pages.product.modal.addBrand');
    }
    
    public function productEditCategory($product){
        $c = ProductCategory::where('product_id', $product)->first();
        if($c){
            $category = Category::find($c->category_id);
            $sub_cat = Category::where('id', $c->sub_category)->first();
            $child_cat = Category::where('id', $c->child_category)->first();
        }
        return view('supportNew.pages.product.tabs.category.edit', compact("product", "category","sub_cat","child_cat"));
    }

    public function productAddImage($product){
        return view('supportNew.pages.product.tabs.image.add', compact("product"));
    }
    
    public function productAddColor($product){
        $colors = Color::where('is_deleted', 0)->get();
        return view('supportNew.pages.product.tabs.color.add', compact("product", "colors"));
    }
    
    public function productEditColor(ProductColor $color){
        $selcolor = Color::where('is_deleted', 0)->where('id', $color->color_id)->first();
        return view('supportNew.pages.product.tabs.color.edit', compact("color", 'selcolor'));
    }
    
    public function productAddSize($product){
        return view('supportNew.pages.product.tabs.size.add', compact("product"));
    }
    
    public function productEditSize(ProductSize $size){
        $selsize = Size::where('is_deleted', 0)->where('id', $size->size_id)->first();
        return view('supportNew.pages.product.tabs.size.edit', compact("size", 'selsize'));
    }

    public function productTabOverallData($product){
        return Product::where('id',$product)->with('brand')->get();
    }
    
    public function productTabCategoryData(Product $product){
        $data = $product->categories()->withPivot("id")->get();
        foreach($data as $d){
            $d->sub_cat = $product->sub_categories->first();
            $d->child_cat = $product->child_categories->first();
        }
        return $data;
    }
    
    public function productTabColorData($product){
        return Product::join('product_colors','product_colors.product_id','=','products.id')
                            ->join('colors','colors.id','=','product_colors.color_id')
                            ->where('products.id', $product)
                            ->where('product_colors.is_deleted', 0)
                            ->select('colors.*','product_colors.*')->get();
    }
    
    
    public function productTabSizeData($product){
        return Product::join('product_sizes','product_sizes.product_id','=','products.id')
                            ->join('sizes','sizes.id','=','product_sizes.size_id')
                            ->where('products.id', $product)
                            ->where('product_sizes.is_deleted', 0)
                            ->select('sizes.*','product_sizes.*')->get();
    }


    public function productTabSize(Product $product){
        return view('supportNew.pages.product.tabs.size.index',
        [
            "product"=> $product
        ]);
    }
    public function productTabColor(Product $product){
        return view('supportNew.pages.product.tabs.color.index',
        [
            "product"=> $product
        ]);
    }

    // Info
    public function productTabInfo(Product $product){
        return view('supportNew.pages.product.tabs.additionalInfo.index',
        [
            "product"=> $product
        ]);
    }

    public function productEditInfo(Product $product){
        return view('supportNew.pages.product.tabs.additionalInfo.edit', compact('product'));
    }

    // end

    // Feature
    public function productTabFeature(Product $product){
        return view('supportNew.pages.product.tabs.feature.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddFeature($product){
        return view('supportNew.pages.product.tabs.feature.add', compact("product"));
    }
    
    public function productEditFeature(ProductFeature $feature){
        return view('supportNew.pages.product.tabs.feature.edit', compact("feature"));
    }

    public function productTabFeatureData(Product $product){
        return $product->features;
    }
    
    // feature end
    
    // Inventory
    public function productTabInventory(Product $product){
        return view('supportNew.pages.product.tabs.inventory.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddInventory($product){
        $colors = Color::where('is_deleted', 0)->get();
        $sizes = Size::where('is_deleted', 0)->get();
        return view('supportNew.pages.product.tabs.inventory.add', compact("product","colors", "sizes"));
    }
    
    public function productEditInventory(Inventory $inventory){
        if($inventory->company_id){
            $company = Account::where('id', $inventory->company_id)->first();
        }
        else{
            $company = null;
        }
        $colors = $inventory->product->colors;
        $sizes = $inventory->product->sizes;
        return view('supportNew.pages.product.tabs.inventory.edit', compact("inventory","colors", "sizes", "company"));
    }

    public function productTabInventoryData($product){
        
        return Inventory::leftjoin('products','products.id', 'inventories.product_id')
                        ->leftjoin('accounts','accounts.id','inventories.company_id')
                        ->leftjoin('sizes','sizes.id','inventories.size_id')
                        ->leftjoin('colors','colors.id','inventories.color_id')
                        ->where('products.id', $product)
                        ->where('inventories.is_deleted', 0)
                        ->select('accounts.company_name','sizes.size','colors.color','inventories.*')
                        ->get();
    }
    
    // Inventory end

    // Image
    public function productTabImage(Product $product){
        return view('supportNew.pages.product.tabs.image.index',
        [
            "product"=> $product
        ]);
    }
   
    public function editProductThumb($product){
        
        return view('supportNew.pages.product.tabs.image.editThumb',
        [
            "product"=> $product
        ]);
    }
   
    public function categoryAddImage($product){
        return view('supportNew.pages.product.tabs.image.add', compact("product"));
    }
    
    public function productEditImage(FileUpload $image){
        return view('supportNew.pages.product.tabs.image.edit', compact("image"));
    }
    
    // image end
    
     // Faq
     public function productTabFaq(Product $product){
        return view('supportNew.pages.product.tabs.faq.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddFaq($product){
        return view('supportNew.pages.product.tabs.faq.add', compact("product"));
    }
    
    public function replyProductFaq(Faq $faq){
        return view('supportNew.pages.product.tabs.faq.reply', compact("faq"));
    }
    
    public function replyProductQuestion(Faq $faq){
        return view('supportNew.pages.product.tabs.answer.reply', compact("faq"));
    }
    
    public function productEditFaq(Faq $faq){
        return view('supportNew.pages.product.tabs.faq.edit', compact("feature"));
    }
    
    
    // FAQ end

    // Feature
    public function productTabReview(Product $product){
        return view('supportNew.pages.product.tabs.review.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddReview($product){
        return view('supportNew.pages.product.tabs.review.add', compact("product"));
    }
    
    public function productEditReview(Review $review){
        return view('supportNew.pages.product.tabs.review.edit', compact("review"));
    }

    public function productTabReviewData(Product $product){
        return $product->reviews;
    }    
    // feature end

    // Order
    public function productTabOrder(Product $product){
        return view('supportNew.pages.product.tabs.order.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddOrder($product){
        return view('supportNew.pages.product.tabs.review.add', compact("product"));
    }

    public function productTabOrderData(Product $product){
        return $product->reviews;
    }    
    // order end
    
    
    // Message
    public function productTabMessage(Product $product){
        return view('supportNew.pages.product.tabs.message.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddMessage($product){
        return view('supportNew.pages.product.tabs.message.add', compact("product"));
    }

    public function productTabMessageData(Product $product){
        return $product->reviews;
    }    
    // Message end
    
    
    // Answer
    public function productTabAnswer(Product $product){
        return view('supportNew.pages.product.tabs.answer.index',
        [
            "product"=> $product
        ]);
    }

    public function productAddAnswer($product){
        return view('supportNew.pages.product.tabs.answer.add', compact("product"));
    }

    public function productTabAnswerData(Product $product){
        return $product->reviews;
    }    
    // Message end


    // All Product Data
    public function allProductData(Request $request){
        $page = $request->pagination['page'] ?: 1;
    	$perPage = $request->pagination['perpage'] ?: 50;
    	$offset = ($page - 1) * $perPage;
    	if ($request->sort) {
    	    $sort = $request->sort['sort'];
    	    $field = $request->sort['field'];
    	}else {
    	    $sort = '';
    	    $field = '';
    	}
    	$query =  Product::where('products.is_deleted', 0)->with('brand', 'categories')->select('products.*');
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "brand.name") {
                return $q->join('brands as b', 'b.id', 'products.brand_id')->orderBy('b.name', $sort['sort']);
			}
			elseif($sort['field'] === "row.categories[0].category"){
                return $q->join('product_categories as pc', 'pc.product_id', 'products.id')
                    ->join('categories as c', 'c.id', 'pc.category_id')->orderBy('c.category', $sort['sort']);
			}
			elseif($sort['field'] === "package.package_name"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			}
			elseif($sort['field'] === "package.price"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			}
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new ProductFilter($request);
    	$queryBuilder = $queryFilter->getQuery($query);
    	$total = $queryBuilder->count();
    	$paginatedBuilder =  $queryBuilder->limit($perPage)
    	    ->offset($offset);
    	$data['meta'] = [
    	    "page" => $request->pagination["page"],
    	    "pages" => ceil($total / $perPage),
    	    "perpage" => $perPage,
    	    "total" => $total,
    	    "sort" => $sort,
    	    "field" => $field,
    	];
    	$data['data'] = $paginatedBuilder->orderBy('products.created_at', 'desc')->get();
    	return response()->json($data);
    }
    
    
    public function allCategories(Request $request){
        $search = $request->term;
        if($search == ''){
            $categories = Category::where('is_deleted', 0)->where('parent_id', NULL)->select("id","category as name")->get();
        }else{
            $categories = Category::where('is_deleted', 0)->where('parent_id', NULL)->select("id","category as name")->where('category', 'like', '%' .$search . '%')->get();
        }
        return  $categories;
        
    }
    
    public function allColors(Request $request){
        $search = $request->term;
        if($search == ''){
            $color = Color::where('is_deleted', 0)->select("id","color as name")->get();
        }else{
            $color = Color::where('is_deleted', 0)->select("id","color as name")->where('color', 'like', '%' .$search . '%')->get();
        }
        return  $color;
        
    }

    public function productselect2Relation(Request $request, $relation){
        if($relation){
            if($request->product && $request->product !== 'null')
            {
                return Product::with($relation)->where('id',$request->product)->where('is_deleted', 0)->first()->$relation;
            }
            $class = 'App\\Model\\'.ucwords(rtrim($relation,'s'));
            if (class_exists($class)) {
                $data = $class::where('is_deleted',0)->get();
                return $data;
            } 
            return [];
        }
    }
    
    public function allSizes(Request $request){
        $search = $request->term;
        if($search == ''){
            $sizes = Size::where('is_deleted', 0)->select("id","size as name")->get();
        }else{
            $sizes = Size::where('is_deleted', 0)->select("id","size as name")->where('size', 'like', '%' .$search . '%')->get();
        }
        return  $sizes;
        
    }
    
    public function allCompanies(Request $request){
        $search = $request->term;
        if($search == ''){
            $Companies = Account::where('is_deleted', 0)->select("id","company_name as name")->get();
        }else{
            $Companies = Account::where('is_deleted', 0)->select("id","company_name as name")->where('company_name', 'like', '%' .$search . '%')->get();
        }
        return  $Companies;
        
    }
    
    public function allBrands(Request $request){
        $search = $request->term;
        if($search == ''){
            $brands = Brand::where('is_deleted', 0)->select("id","name")->get();
        }else{
            $brands = Brand::where('is_deleted', 0)->select("id","name")->where('name', 'like', '%' .$search . '%')->get();
        }
        return  $brands;
        
    }
    
    public function subCategories(Request $request){
        $search = $request->term;

        if($request->category){   
            if($search == ''){
                $employees = Category::where('is_deleted', 0)->where('parent_id', $request->category)->select("id","category as name")->get();
            }else{
                $employees = Category::where('is_deleted', 0)->where('parent_id', $request->category)->select("id","category as name")->where('category', 'like', '%' .$search . '%')->get();
            }
            return  $employees;
        }
        // else{
        //     if($search == ''){
        //         $employees = Category::where('is_deleted', 0)->select("id","category as name")->get();
        //     }else{
        //         $employees = Category::where('is_deleted', 0)->select("id","category as name")->where('category', 'like', '%' .$search . '%')->get();
        //     }
        // }
        // return  $employees;
        
    }

    public function viewImage($image)
    {
        $path = storage_path('product/images/' . $image);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    
    public function viewColorImage($image)
    {
        $path = storage_path('product/colors/images/' . $image);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function fillColorFields(Color $color){
        return  $color;   
    }
    
    public function fillSizeFields(Size $size){
        return  $size;   
    }

    public function getImage($foldername,$filename){
        $location = $foldername."/images/".$filename;
        if (file_exists(storage_path($location))) {
            return response()->file(storage_path($location));
        } else {
            return response()->file(public_path("/images/noimage.png"));
        }
    }
    
}
