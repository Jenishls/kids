<?php
Route::prefix('/admin/tasks/')->group(function(){  

    Route::get('', 'TaskViewController');
    Route::get('/fetch', 'TaskViewController@fetch');
    Route::get('/modal/add', 'TaskViewController@modalAdd');
    Route::get('/edit/{task}', 'TaskViewController@modalUpdate');
    Route::post('/validate/tasks/{value}', 'TaskViewController@validateTask');
    Route::post('/validate', 'TaskViewController@validMember');
    Route::post('/attachments', 'TaskStoreController@uploadAttachment');
    Route::post('/store', 'TaskStoreController@store');

    Route::post('/update/info', 'TaskUpdateController@updateInfo');
    Route::post('/update/members', 'TaskUpdateController@updateMember');
    Route::post('/update/attachments', 'TaskUpdateController@updateAttachments');
    Route::get('/{task}', 'TaskViewController@detail');
    
    Route::post('/update/description', 'TaskUpdateController@updateDescription');
    Route::post('/update/conclusion', 'TaskUpdateController@updateConclusion');

    Route::get('/detail/update', 'TaskViewController@updateDetail');
    Route::post('/detail/update', 'TaskUpdateController@updateDetail');


    // Route::get('table_view', 'TaskViewController@tableView');
    // Route::get('board_view', 'TaskViewController@boardView');
    // Route::get('get_tasks', 'TaskViewController@getTasks');    
    // Route::get('view/{task}', 'TaskViewController@detail');


    // Route::get('all/{project_id}', 'TaskViewController@getTasksByProject');

    // Route::post('update/priority', 'TaskEditController@updatePriority');
    // Route::post('update/due_date', 'TaskEditController@updateDueDate');
    // Route::post('update/reminder_date', 'TaskEditController@updateReminderDate');
    // Route::post('update/estimated_hours', 'TaskEditController@updateEstimatedHour');

    // Route::get('create', 'TaskViewController@create');
    // Route::get('edit/{task}', 'TaskViewController@edit');
    // Route::get('grab/{task}', 'TaskViewController@grab');
    // Route::get('mark/{task}', 'TaskStoreController@mark');
    // Route::get('unmark/{task}', 'TaskStoreController@unmark');
    // Route::get('grab_now/{task}', 'TaskStoreController@grab');
    // Route::get('update/{task}', 'TaskViewController@modalAdd');
    // Route::get('delete/{task}', 'taskEditController@delete');
    // Route::post('validate', 'TaskStoreController@validateWizard');
    // Route::post('store', 'TaskStoreController@store');
    // Route::get("/modal/members", "TaskViewController@getMember");
    // Route::get("/view/{section}/{task}", "TaskViewController@showSection");

    // Route::prefix('email')->group(function(){
    //     Route::get('modal', 'TaskMailController@massEmail');
    //     Route::get('preview', 'TaskMailController@previewEmail');
    //     Route::post('getPreviewDetails', 'TaskMailController@previews');
    //     Route::get('recipents_modal', 'TaskMailController@emailRecipients');
    //     Route::post('send', 'TaskMailController@sendMail');
    // });

    // Route::prefix('case')->group(function(){
    //     Route::get('comments/{workflowUserCase}', 'WorkflowController@comments');
    // });

    // Route::prefix('add')->group(function(){
    //     Route::get('desc/{task}', 'TaskViewController@description');
    //     Route::get('cause/{task}', 'TaskViewController@cause');
    //     Route::get('conclusion/{task}', 'TaskViewController@conclusion');
    //     Route::get('comments/{task}', 'TaskViewController@comments');
    // });

    // Route::prefix('update')->group(function(){
    //     Route::post('task/{task}', 'taskEditController@task');
    //     Route::post('assignees/{task}', 'taskEditController@assignees');
    //     Route::post('uploads/{task}', 'taskEditController@uploads');
    //     Route::post('desc/{task}', 'TaskStoreController@detailUpdate');
    //     Route::post('cause/{task}', 'TaskStoreController@detailUpdate');
    //     Route::post('conclusion/{task}', 'TaskStoreController@detailUpdate');
    //     Route::post('comments/{task}', 'TaskStoreController@comments');
    //     Route::post('developers_update/{task}', 'WorkflowController@devUpdate');
    //     Route::get('workflow/{task}/{workflowUserCase}/{reject}', 'TaskViewController@workflowUpdate');
    //     Route::post('workflow/{task}/{workflowTypeID}/{workflowUserCase}', 'WorkflowController@workflowUpdate');
    // });
    
    // Route::prefix('sub_tasks')->group(function(){
    //     Route::get('find/{task}', 'SubTaskController@task');
    //     Route::get('create/{type}/{project}', 'SubTaskController@create');
    //     Route::get('remove/{task}', 'SubTaskController@remove');
    //     Route::post('store/{type}', 'SubTaskController@store');  
    //     Route::get('edit/{task}', 'SubTaskController@edit');      
    //     Route::get('update/{task}', 'SubTaskController@update');  

    //     Route::prefix('update')->group(function(){
    //         Route::post('task/{task}', 'SubTaskController@updateTask');
    //         Route::post('uploads/{task}', 'SubTaskController@updateUploads');
    //     });  

    // });

});

