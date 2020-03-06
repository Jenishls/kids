<?php

namespace App\Http\Controllers\Order;

use App\Model\Order;
use App\Model\Payment;
use App\Model\Audit;
use App\Model\Activity;
use App\Model\Client;
use App\Model\OrderItem;
use App\Model\Invoicehead;
use App\Model\PackagePriceItem;
use App\Model\PackagePrice;
use App\Lib\Filter\OrderFilter;
use App\Lib\Filter\OrderItemFilter;
use App\Lib\Filter\InvoiceFilter;
use App\Lib\Filter\PackagePriceFilter;
use App\Lib\Filter\PaymentFilter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Export\OrderDetailExportController;
use App\Model\Inventory;
use App\User;
use DateTime;
use Carbon\Carbon;
use DB;

class OrderViewController extends OrderDetailExportController
{
    public function index(){
    	return view('supportNew.pages.order.index');
    }
	
	public function addOrder(){
    	return view('supportNew.pages.order.modal.add');
    }
	
	public function editOrder(Order $order){
    	return view('supportNew.pages.order.modal.edit', compact('order'));
    }
    
    public function orderDetail(Order $order){
       $audits = Audit::Where('table_name', 'App\Model\Address')
						->orWhere('table_name', 'App\Model\Order')
						->orWhere('table_name', 'App\Model\Payment')
						->orderBy('created_at','desc')
						->get();
    	return view('supportNew.pages.order.includes.detail', compact('order', 'audits'));
    }
    
    public function orderData(Request $request){
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
    	$query = Order::with('client','company','package', 'tax')->select('*')->where("orders.is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('lname', $sort['sort'])->orderBy('fname', $sort['sort']);
			}
			elseif($sort['field'] === "client.phone_no"){
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
			}
			elseif($sort['field'] === "package.package_name"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			}
			elseif($sort['field'] === "package.price"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			}
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new OrderFilter($request);
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
		$res = $paginatedBuilder->get()->map(function($order){
		if(isset($order->invoices)){
			$order->total_inv = $order->drInvoices()->sum('amount');
		}
		else {
			$order->total_inv = 0;
		}
		return $order;
		})->pipe(function($orders) use ($sort, $field){
			if ($field === "total_inv") {
				$sortBy = $sort == "desc"?"sortByDesc":"sortBy";
				return $orders->$sortBy('total_inv')->values();
			}
			return $orders;
		});
		$data['data'] = $res;
    	return response()->json($data);
    }
	
	public function paymentData(Request $request, $order){
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
    	$query = Payment::with('order', 'creator')->select('*')->where("payments.order_id", $order)->where("payments.is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "order.order_no") {
                return $q->join('orders as o', 'o.id', 'payments.order_id')->orderBy('order_no', $sort['sort']);
			}
			
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new PaymentFilter($request);
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
		$data['data'] = $paginatedBuilder->get();
    	return response()->json($data);
    }
	
	public function invoiceData(Request $request, $order){
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
    	$query = Invoicehead::with('client','company','order.tax')->select('*')->where("order_id", $order)->where("invoice_heads.is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'invoice_heads.client_id')->orderBy('c.fname', $sort['sort']);
			}
			// elseif($sort['field'] === "client.contact.phone_no"){
            //     return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
			// }
			// elseif($sort['field'] === "package.package_name"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			// }
			// elseif($sort['field'] === "package.price"){
            //     return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			// }
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new InvoiceFilter($request);
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
		$data['data'] = $paginatedBuilder->get();
    	return response()->json($data);
    }
	
	public function orderItemsData(Request $request, $order){
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
		$query = OrderItem::with('inventory.product.thumb')->has('inventory')->select('*')
			->where("order_items.order_id", $order)
			->where("order_items.is_deleted", 0);
            // why below query Manish??
		//	->whereDate("order_items.pickup_date", '>', Carbon::today()->toDateString());
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "inventory.price") {
                return $q->join('inventories as i', 'i.id', 'order_items.inv_id')->orderBy('price', $sort['sort']);
			}
			elseif($sort['field'] === "product.name"){
				return $q->join('inventories as i', 'i.id', 'order_items.inv_id')
							->join('products as p', 'p.id', 'i.product_id')
							->orderBy('p.name', $sort['sort']);
			}
			elseif($sort['field'] === "package.price"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			}
    	    // return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	new OrderItemFilter($request, $query);
    	$total = $query->count();
    	$paginatedBuilder =  $query->limit($perPage)
    	    ->offset($offset);
    	$data['meta'] = [
    	    "page" => $request->pagination["page"],
    	    "pages" => ceil($total / $perPage),
    	    "perpage" => $perPage,
    	    "total" => $total,
    	    "sort" => $sort,
    	    "field" => $field,
		];
		$res = $paginatedBuilder->get()->map(function($product){
		if(isset($product->inventory)){
			$product->total = $product->quantity * (float)($product->inventory->price) - $product->dis_amt;
		}
		else {
			$product->total = 0;
		}
		return $product;
		})->pipe(function($products) use ($sort, $field){
			if ($field === "total") {
				$sortBy = $sort == "desc"?"sortByDesc":"sortBy";
                return $products->$sortBy('total')->values();
			}
			return $products;
		});
		$data['data'] = $res;
		
    	return response()->json($data);
	}
	
	// Pickup
	public function editPickup(Order $order){
		$fdate = $order->delivery_date;
		$tdate = $order->pickup_date;
		$datetime1 = new DateTime($fdate);
		$datetime2 = new DateTime($tdate);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
    	return view('supportNew.pages.order.modal.editPickup', compact('order', 'days'));
    }
	
	// Moving/Delivery
	public function editMoving(Order $order){
		$fdate = $order->delivery_date;
		$tdate = $order->pickup_date;
		$datetime1 = new DateTime($fdate);
		$datetime2 = new DateTime($tdate);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
    	return view('supportNew.pages.order.modal.editMoving', compact('order', 'days'));
    }
	
	public function addInvoice(Request $request, Order $order){
		$new_pickup_date = $request->new_pickup_date?:"";
		$new_moving_date = $request->new_moving_date?:"";
		$amount = 0;
		$addOnAmount = 0;
		if($new_pickup_date){
			$fdate = $order->pickup_date;
			$tdate = $new_pickup_date;
			$datetime1 = new DateTime($fdate);
			$datetime2 = new DateTime($tdate);
			$interval = $datetime1->diff($datetime2);
			$days = $interval->format('%a');
			if($order->package){
				$amount = $this->priceCalculatorWithPackageWRTPickupDate($order ,$new_pickup_date);
			}
			else{
				$addOnAmount = $this->priceCalculatorWithoutPackageWRTPickupDate($order ,$request->new_pickup_date);
			}
		}
		elseif ($new_moving_date) {
			$fdate = $new_moving_date;
			$tdate = $order->delivery_date;
			$datetime1 = new DateTime($fdate);
			$datetime2 = new DateTime($tdate);
			$interval = $datetime1->diff($datetime2);
			$days = $interval->format('%a');
			$amount = 0;
			if($order->package){
				$amount = $this->priceCalculatorWithPackageWRTMovingDate($order , $new_moving_date);
			}
			else{
				$addOnAmount = $this->priceCalculatorWithoutPackageWRTMovingDate($order ,$new_moving_date);
			}
		}
		$tax_amt = default_company('sales_tax')/100 * $amount;
		$amount = $amount + $addOnAmount + $tax_amt;
    	return view('supportNew.pages.order.modal.addInvoice', compact('order','new_pickup_date','new_moving_date', 'days', 'amount'));
    }
	
	
	public function refundInvoice(Request $request, Order $order){
		$new_pickup_date = $request->new_pickup_date?:"";
		$new_moving_date = $request->new_moving_date?:"";
		if($new_pickup_date){
			$fdate = $order->pickup_date;
			$tdate = $new_pickup_date;
			$datetime1 = new DateTime($fdate);
			$datetime2 = new DateTime($tdate);
			$interval = $datetime1->diff($datetime2);
			$days = $interval->format('%a');
			$amount = $this->refundPickupPriceCalculatorWRTDate($order ,$new_pickup_date);
		}
		elseif ($new_moving_date) {
			$fdate = $new_moving_date;
			$tdate = $order->delivery_date;
			$datetime1 = new DateTime($fdate);
			$datetime2 = new DateTime($tdate);
			$interval = $datetime1->diff($datetime2);
			$days = $interval->format('%a');
			$amount = $this->refundMovingPriceCalculatorWRTDate($order ,$new_moving_date);
		}
		
    	return view('supportNew.pages.order.modal.refundInvoice', compact('order', 'new_pickup_date','new_moving_date', 'days', 'amount'));
    }
	
	public function addOrderItems(Request $request, Order $order){
		$items = Inventory::where('is_deleted', 0)->with('color','size','product.brand','product.thumb')->take(10)->get(); 
		return view('supportNew.pages.order.modal.addOrderItems', compact('order', 'items'));
	}
	
	public function pickupOrderItems(Request $request, Order $order){
		return view('supportNew.pages.order.modal.pickupOrderItems', compact('order'));
	}

	// All Packages
	public function allPackage(Request $request){
        $search = $request->term;
        if($search == ''){
            $packages = PackagePrice::where('is_deleted', 0)->select("id","package_name")->get();
        }else{
			$packages = PackagePrice::where('is_deleted', 0)
				->select("id","package_name")
				->where('package_name', 'like', '%' .$search . '%')
				->get();
        }
        return  $packages;
        
	}
	
	// All Users
	public function allUsers(Request $request){
        $search = $request->term;
        if($search == ''){
			$users = User::where('is_deleted', 0)
			->select('name', 'id')
			->get();
        }else{
			$users = User::where('is_deleted', 0)
				->select('name', 'id')
				->where('name','like','%'.$search.'%')
				->get();
        }
        return  $users;
        
	}
	
	// Audit
	public function viewAudit(Audit $audit){
		// dd(json_decode($audit->new_data));
    	return view('supportNew.pages.order.modal.viewAudit', compact('audit'));
    }
	
	
	// Status
	public function editStatus(Request $request, Order $order){
		$status = $request->status;
    	return view('supportNew.pages.order.modal.editStatus', compact('order','status'));
    }
	
	// Payment
	public function makePayment(Request $request, Order $order){
		$tax = $order->drInvoices()->sum('amount') * default_company('sales_tax')/100;
		$balance = number_format($order->drInvoices()->sum('amount') + $tax - $order->Payments()->sum('amount') , 2, '.', ',');
    	return view('supportNew.pages.order.modal.makePayment', compact('order','balance'));
	}
	
	//Direct Payment
	public function makeDirectPayment(Request $request, Order $order){
		if($request->balance){
			$balance = $request->balance;
		}
		else if($request->package_id){
			$balance = PackagePrice::find($request->package_id)->price;
		}
    	return view('supportNew.pages.order.modal.makeDirectPayment', compact('order','balance'));
	}
	

	// refund calculator fro pickup date
    public function priceCalculatorWithPackageWRTPickupDate($order, $new_pickup_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_pickup_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime1->diff($datetime3);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		$package_amt = $order->package->price;
		$new_days = $new_days - $days;
		foreach($order->addOnItems as $item){
			$amount += $item->amount * $item->quantity; 
		}
		if((int)$new_days > 7){
			$days = $days-7;
			$package_amt = $order->package->price + (($days/7)*($order->packag->price/2)); //(50% off) 
		}
		return $package_amt + ($amount * $new_days);	
    }
	
	// refund calculator fro pickup date
    public function priceCalculatorWithoutPackageWRTPickupDate($order, $new_pickup_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_pickup_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime1->diff($datetime3);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		
		$new_days = $new_days - $days;
		foreach($order->addOnItems as $item){
			$amount += $item->amount * $item->quantity; 
		}
        return ($amount * $new_days);  
    }
	
	// Extend with package ad new moving date
    public function priceCalculatorWithPackageWRTMovingDate($order, $new_moving_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_moving_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime3->diff($datetime2);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		$package_amt = $order->package->price;
		$new_days = $new_days - $days;
		foreach($order->addOnItems as $item){
			$amount += $item->amount * $item->quantity; 
		}
		if((int)$new_days > 7){
			$days = $days-7;
			$package_amt = $order->package->price + (($days/7)*($order->packag->price/2)); //(50% off) 
		}
		return $package_amt + ($amount * $new_days);	
    }
	
	// refund calculator fro pickup date
    public function priceCalculatorWithoutPackageWRTMovingDate($order, $new_moving_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_moving_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime3->diff($datetime2);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		
		$new_days = $new_days - $days;
		foreach($order->addOnItems as $item){
			$amount += $item->amount * $item->quantity; 
		}
        return ($amount * $new_days);  
    }
	
	// refund calculator fro pickup date
    public function refundPickupPriceCalculatorWRTDate($order, $new_pickup_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_pickup_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime1->diff($datetime3);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		$addsONAmount = 0;

		if($order->package){
			if((int)$new_days > 7){
			$new_days = $days - $new_days;
			$amount = (($order->package->price/$days) * $new_days/2); //(50% off) 
			}
			else{
				$new_days = 7 - $new_days;
				$full_ref_amt = ($order->package->price/$days) * $new_days;
				$amount = $full_ref_amt + (($order->package->price/$days) * ($days-7)/2);
			}
		}
		else{
			$new_days = $days - $new_days;
			foreach($order->addOnItems as $item){
				$addsONAmount += $item->amount * $item->quantity; 
			}
		}
		return $amount + ($addsONAmount * $new_days);
    }
    
    // refund calculator for moving date
    public function refundMovingPriceCalculatorWRTDate($order, $new_moving_date){
        $datetime1 = new DateTime($order->delivery_date);
        $datetime2 = new DateTime($order->pickup_date);
        $datetime3 = new DateTime($new_moving_date);
        $interval = $datetime1->diff($datetime2);
        $new_interval = $datetime3->diff($datetime2);
        $days = $interval->format('%a'); //(pahilako days)
        $new_days = $new_interval->format('%a'); // (naya days)
		$amount = 0;
		$addsONAmount = 0;
		
		if($order->package){
			if((int)$new_days > 7){
				if((int)$new_days > (int)$days){
					$new_days = $new_days - $days;
				}
				else {
					$new_days = $days - $new_days;
				}
				$amount = (($order->package->price/$days) * $new_days/2); //(50% off) 
			}
			else{
				$new_days = 7 - $new_days;
				$full_ref_amt = ($order->package->price/$days) * $new_days;
				$amount = $full_ref_amt + (($order->package->price/$days) * ($days-7)/2);
			}
		}
		else{
			$new_days = $days - $new_days;
			foreach($order->addOnItems as $item){
				$addsONAmount += $item->amount * $item->quantity; 
			}
		}
		return $amount + ($addsONAmount * $new_days);
	}
	
	// Add Package Order
	public function addOrderPackage(Order $order){
    	return view('supportNew.pages.order.modal.addOrderPackage', compact('order'));
	}


	// Order pickup and delivery PDF
	public function pickup(){
    	return view('supportNew.pages.order.pickup.index');
	}
	
	public function orderPickupData(Request $request){
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
		$query = Order::with('client','company','package')->select('*')
			->whereIn("orders.order_status", ['picked_up', 'delivered'])
			->where("orders.is_deleted", 0);
    	$query->when($request->sort, function ($q, $sort) use ($request) {
			if ($sort['field'] === "customer_name") {
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('lname', $sort['sort'])->orderBy('fname', $sort['sort']);
			}
			elseif($sort['field'] === "client.phone_no"){
                return $q->join('clients as c', 'c.id', 'orders.client_id')->orderBy('phone_no', $sort['sort']);
			}
			elseif($sort['field'] === "package.package_name"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('package_name', $sort['sort']);
			}
			elseif($sort['field'] === "package.price"){
                return $q->join('package_prices as p', 'p.id', 'orders.package_id')->orderBy('price', $sort['sort']);
			}
    	    return $q->orderBy($sort['field'], $sort['sort']);
    	});
    	$queryFilter = new OrderFilter($request);
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
    	$data['data'] = $paginatedBuilder->orderBy('orders.created_at', 'desc')->get();
    	return response()->json($data);
	}
	
	// Mail
	public function compose(Request $request, Order $order){
		$setting = User::find(auth()->id())->emailSetting;
		$to = null;
		$pdf = null;
		if($order->client){
			$to = $order->client->email;
		}
		elseif ($order->company) {
			if($order->company->account){
				if($order->company->account->contact){
					$to = $order->company->account->contact->email;
				}
			}
		}

		if($request->pdf){
			$request->request->add(['order' => $order->id, 'is_email' => true]);
			$pdf = $this->export($request, 'pdf');
			$pdf_name_only =explode("reports\\",$pdf);
            $pdf = $pdf_name_only[1];
		}
    	return view('supportNew.pages.Order.modal.compose', compact('order', 'setting', 'to', 'pdf'));
    }
	
}
