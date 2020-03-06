<?php

namespace App\Http\Controllers\Export;

use App\Model\Order;
use App\Traits\ReportGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderPickupExportController extends AbstractExporterController {
	use ReportGenerator;

	public function export(Request $request, $type) {
		if ($type == "csv") {
			$tableFields = ['order_no', 'package_name', 'customer', 'phone_no', 'address', 'delivery_date1', 'delivery_note', 'pickup_date1', 'pickup_note'];
		} else {
			$tableFields = ['order_no', 'package_name', 'customer', 'phone_no', 'address', 'delivery_date1', 'delivery_note', 'pickup_date1', 'pickup_note'];
		}
		$fields = ['Order Number', 'Package Name', 'Customer Name', 'Customer Phone', 'Address', 'Delivery Date', 'Delivery Note', 'Pickup Date', 'Pickup Note'];

		$data = Order::leftjoin('clients as c', 'c.id', 'orders.client_id')
			->leftjoin('addresses as ad', 'ad.id', 'orders.shipping_addr_id')
			->leftjoin('package_prices as p', 'p.id', 'orders.package_id')
			->select(DB::raw('CONCAT(fname, " ", lname) AS customer'), 'c.phone_no', 'p.package_name',
				'ad.add1', 'ad.add2', 'ad.city', 'ad.state', 'ad.country', 'ad.zip', 'orders.*')
			->whereIn("orders.order_status", ['picked_up', 'delivered'])
			->where("orders.is_deleted", 0);

		if ($request->delivery_date) {
			$data = $data->whereDate('delivery_date', Carbon::parse($request->delivery_date)->format('Y-m-d'));
		} elseif ($request->pickup_date) {
			$data = $data->whereDate('pickup_date', Carbon::parse($request->pickup_date)->format('Y-m-d'));
		} elseif ($request->both) {
			$data = $data->where(function ($query) use ($request) {
				$query->where('delivery_date', '=', Carbon::parse($request->both)->format('Y-m-d'))
					->orWhere('pickup_date', '=', Carbon::parse($request->both)->format('Y-m-d'));
			});
		}
		$data = $data->get()->map(function ($order) {
			$order['items'] = $order->items->load('inventory.product.thumb');
			$withBr = function ($string) {
				return $string ? "$string, <br/>" : "";
			};
			$add = $withBr($order->add1) . $withBr($order->add2) . $withBr($order->city) . ($order->state ?: '') . ' - ' . ($order->city);
			$order['address'] = $add;
			if ($order['delivery_date']) {
				$order['delivery_time1'] = !$order['delivery_time'] ? '' : (($time = date_create($order['delivery_time'])) ? $time->format('h:i A') : '');
				$order['delivery_date1'] = format_to_us_date($order['delivery_date']) . '<br>' . $order['delivery_time1'];
			}

			if ($order['pickup_date']) {
				$order['pickup_time1'] = !$order['pickup_time'] ? '' : (($time = date_create($order['pickup_time'])) ? $time->format('h:i A') : '');
				$order['pickup_date1'] = format_to_us_date($order['pickup_date']) . '<br>' . $order['pickup_time1'];
			}

			return $order;
		});
		$mappedArrayData = $this->mapper($tableFields, $data);
		// dd($mappedArrayData);

		$data['table'] = 'Picking And Moving';
		// put search criteria like this associative array
		// $data['request']['Date Range'] = date('m/01/Y - m/t/Y');
		$filename = $this->generate($type, $fields, $mappedArrayData, 'picking_and_moving', 'header_footer');
		return response()->download(storage_path("reports/$filename"))->deleteFileAfterSend(true);
	}

	public function getPrintBlade(): string {
		return "order-pickup-print";
	}

	function mapper($mapField, $data) {
		$dataArr = [];
		foreach ($data as $d) {
			$singleRow = [];
			foreach ($mapField as $map) {
				$singleRow[$map] = $d->$map;
				if ($map == 'delivery_date') {
					$singleRow[$map] = format_to_us_date($d->$map);
				}
				if ($map == 'pickup_date') {
					$singleRow[$map] = format_to_us_date($d->$map);
				}
			}
			array_push($dataArr, $singleRow);
		}
		return $dataArr;
	}
}
