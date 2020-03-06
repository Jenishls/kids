<?php

Route::view('admin/reports', 'supportNew.pages.reports.index');

// left section click
Route::view('admin/reports/section/{section}', 'supportNew.pages.reports.include.rightSection');

// datatable ajax data
Route::post('admin/reports/datatable', 'ReportDataController@datatable');

// right section generate for modal (individual)
Route::view('admin/reports/generateModal/product-list', 'supportNew.pages.reports.modals.productListModal');
Route::view('admin/reports/generateModal/sql-raw', 'supportNew.pages.reports.modals.rawSQLModal');

// individual report generate
Route::post('admin/reports/generate/product-list', 'ReportDataController@productList');
Route::post('admin/reports/generate/sql-raw', 'ReportRawSQLController@rawSQL');

// download report
Route::get('admin/reports/download/{report}', function (\App\Model\ReportLog $report) {
    return response()->download(storage_path("reports/$report->file_name"));
});

Route::post('admin/reports/delete/{report}', 'ReportDataController@destroy');

/*
save and load template
 */
Route::view('admin/reports/save-template/{template}', 'supportNew.pages.reports.modals.saveTemplate');
Route::view('admin/reports/load-template/{template}', 'supportNew.pages.reports.modals.loadTemplate');
Route::view('admin/reports/delete-template/{id}', 'supportNew.pages.reports.modals.deleteTemplate');
Route::post('admin/reports/save-template', 'ReportTemplateController@store');
Route::post('admin/reports/destroy-template/{report_template}', 'ReportTemplateController@destroy');
