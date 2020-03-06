<?php

use App\Http\Controllers\CratesOnSkates\CartController;
use App\Model\Lookup\SectionLookup;
use App\Model\PreferredTime;
use App\User;

function validation_value($code) {
	$rules = [];
	if ($validation = \App\Model\Validation\Validation::where('code', $code)->where('is_deleted', 0)->first()) {
		foreach (explode(',', $validation->value) as $attr) {
			$segments = explode(':', $attr);
			$rules[$segments[0]] = str_replace('-', ':', $segments[1]);
		}
	}
	return $rules;
}

function sectionNameToLookups($name) {
	$sectionLookupQ = SectionLookup::with('lookups')->where(['section' => $name, 'is_deleted' => 0]);
	if ($sectionLookupQ->count()) {
		$lookups = $sectionLookupQ->first()->lookups;
		return $lookups->count() ? $lookups : collect([]);
	}
	return collect([]);
}

/*
 * Get the default company properties wrt given param $property
 *
 * @author React Rakesh
 * */
if (!function_exists('default_company')) {
	function default_company($prop, $returnValue = null) {
		return getDefault($prop) ?: $returnValue;
	}
}

if (!function_exists('has_cart')) {
	function has_cart() {
		return (new CartController())->hasCart();
	}
}

if (!function_exists('format_preffered_time')) {
	function format_preffered_time(PreferredTime $time) {
		return $time->from . '-' . $time->to . strtoupper($time->time_flag);
	}
}

function custom_exploder($delimiter, $string) {
	return explode($delimiter, $string);
}

function getDefault($property) {
	$default = \App\Model\DefaultCompany::where('property', $property)->first();
	if ($default) {
		return $default->value;
	}
	return null;
}
function default_company_name() {
	return \App\Model\DefaultCompany::where('property', "company_name")->first() ? \App\Model\DefaultCompany::where('property', "company_name")->first()->value : "Shubhutech";
}
function settingsValue($code) {
	$setting = \App\Model\SiteSetting::where('code', $code)->where('is_deleted', 0)->first();
	if ($setting) {
		return $setting->value;
	}

	return '';
}

function default_company_logo() {
	return \App\Model\DefaultCompany::where('property', "icon_company")->first() ? "admin/defaultCompany/logo/" . \App\Model\DefaultCompany::where('property', "icon_company")->first()->value : "images/no-image.png";
}
function default_fav_icon() {
	return \App\Model\DefaultCompany::where('property', "icon_favicon")->first() ? "admin/defaultCompany/logo/" . \App\Model\DefaultCompany::where('property', "icon_favicon")->first()->value : "";

}
function default_company_logo_id() {
	return \App\Model\DefaultCompany::where('property', "icon_company")->first() ? \App\Model\DefaultCompany::where('property', "icon_company")->first()->id : "";
}
function default_sidebar_icon() {
	return \App\Model\DefaultCompany::where('property', "icon_sidebar")->first() ? "admin/defaultCompany/logo/" . \App\Model\DefaultCompany::where('property', "icon_sidebar")->first()->value : "images/no-image.png";
}
function default_sidebar_icon_id() {
	return \App\Model\DefaultCompany::where('property', "icon_sidebar")->first() ? \App\Model\DefaultCompany::where('property', "icon_sidebar")->first()->id : "";
}
function default_login_icon() {
	return \App\Model\DefaultCompany::where('property', "icon_login")->first() ? "admin/defaultCompany/logo/" . \App\Model\DefaultCompany::where('property', "icon_login")->first()->value : "images/no-image.png";
}
function default_login_icon_id() {
	return \App\Model\DefaultCompany::where('property', "icon_login")->first() ? \App\Model\DefaultCompany::where('property', "icon_login")->first()->id : "";
}
function format_to_us_date($dateToFormat) {
	return date_create($dateToFormat)->format(settingsValue('dateFormat'));
}

function format_to_time($dateToFormat) {
	return date_create($dateToFormat)->format('h:i A');
}

function priceFormat($price) {
	$price = "$" . number_format($price, 2);
	return $price;
}
function price50($price) {
	$price = "$" . number_format($price / 2, 2);
	return $price;
}
function formatDateRange($range, $format = 'Y-m-d') {
	$range = is_array($range) ? $range : explode('-', $range);
	$range = array_map(function ($date) use ($format) {
		return date_create($date)->format($format);
	}, $range);
	return $range;
}

function get_user_name_by_id($id) {
	$user = User::find($id);
	if ($user) {
		return ucwords($user->name);
	} else {
		return "-";
	}
}
function bladeDate($date) {
	if (!is_null($date)) {
		return date('jS M, Y', strtotime($date));
	}
}
function viewBladeDate($date) {
    if(!is_null($date)){
       return date('j M, Y', strtotime($date));
    }
}

function dateFormat($date) {
	if (!is_null($date)) {
		return date('Y-m-d', strtotime($date));
	}
}
function sDateFormat($date) {
	if (!is_null($date)) {
		return date('d/m/Y', strtotime($date));
	}
}

function to_sql($builder, bool $returnString = false) {
	$query = $builder->toSql();
	$params = $builder->getBindings();
	for ($i = 0, $len = count($params); $i < $len; $i++) {
		$value = $params[$i];
		if (!is_numeric($value)) {
			$value = "'$value'";
		}
		$query = preg_replace('/\?/', $value, $query, 1);
	}
	return $returnString ? $query : dd($query);
}