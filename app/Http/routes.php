<?php

Route::group(['middleware' => ['web']], function () {

	
	Route::get('language/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');

	// Authentication routes...
	// Home
	Route::get('/', 'Auth\AuthController@getLogin');

	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

	// Resend routes...
	Route::get('auth/resend', 'Auth\AuthController@getResend');

	// Registration routes...
	Route::get('auth/register/{registration_code}', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	// Password reset link request routes...
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');

	// Admin
	Route::get('admin', ['uses' => 'AdminController@index','as' => 'admin','middleware' => 'admin']);

		// Users	
	Route::resource('user', 'UserController');	//to use blades to point to functios
	Route::get('usertrail', 'UserController@getTrail');

		// Organisation
	Route::get('client', ['uses' => 'ClientController@index','as' => 'client','middleware' => 'client']); //dashboard
	Route::post('invite_organ', 'ClientController@postInvite');	  //by admin
	Route::get('organisation_invites', 'ClientController@getOrgInvites'); //by admin
	Route::resource('organisation', 'ClientController'); //by admin
	Route::get('organisationlist', ['uses'=>'ClientController@getClients','as' => 'organisationlist']); //by admin

			// Program
	Route::get('program', ['uses' => 'ProgrammeController@index','as' => 'program']);//program dashboard
	Route::get('programmelist', 'ProgrammeController@getPrograms'); //by admin
	Route::resource('programme', 'ProgrammeController');//by client
	Route::get('programme_of_org', 'ProgrammeController@getOrgPrograms'); //by client
	Route::get('program_invites', 'ProgrammeController@getProgInvites');//by client 
	Route::post('invite_program', 'ProgrammeController@postInvite');	  //by client

				// Data Manager
	Route::get('field', ['uses' => 'FieldController@index','as' => 'field']);//field dashboard
	Route::get('fieldlist', 'FieldController@getFieldms'); //by admin
	Route::resource('fieldmngr', 'FieldController');//by program
	Route::get('field_of_prog', 'FieldController@getProgramsField'); //by prog
	Route::get('field_invites', 'FieldController@getFieldInvites');//by prog 
	Route::post('invite_fieldmngr', 'FieldController@postInvite');	  //by prog

				// Beneficiary
	Route::resource('beneficiary', 'BeneficiaryController');
	Route::get('beneficiarylist', 'BeneficiaryController@getBeneficiaries');//by admin
	Route::get('beneficiary_of_org', 'BeneficiaryController@getOrgBeneficiaries'); //by client
	Route::get('beneficiary_of_prog', 'BeneficiaryController@getProgBeneficiaries'); //by program
	Route::get('beneficiary_import', 'BeneficiaryController@getProgBenefImport');//by program
	Route::post('importBeneficiaryExcel', 'BeneficiaryController@importExcel'); //importing
	Route::post('register_benef', 'BeneficiaryController@postBenef'); //posting form
	

/*	Route::get('downloadExcel/{type}', 'BeneficiaryController@downloadExcel'); //exporting csv and xcl
	Route::get('exportPDF', 'BeneficiaryController@exportPDF'); //exportg pdf */
	

					// Agro Dealer
	Route::resource('dealer', 'DealerController');
	Route::get('dealerlist', 'DealerController@getDealers');
	Route::get('dealer_of_org', 'DealerController@getOrgDealers');
	Route::get('dealer_of_prog', 'DealerController@getProgDealers');
	Route::get('dealer_import', 'DealerController@getProgDealerImport');//by program 
	Route::post('register_dealer', 'DealerController@postDealer'); //posting form

						// Agents
	Route::resource('agent', 'AgentController');
	Route::get('agentlist', 'AgentController@getAgents');
	Route::get('agent_of_org', 'AgentController@getOrgAgents');
	Route::get('agent_of_prog', 'AgentController@getProgAgents');
	Route::get('agent_import', 'AgentController@getProgAgentImport');//by program

	//vouchers 
	Route::resource('voucher', 'VoucherController');
	Route::get('voucher_types', 'VoucherController@getOverallTypes'); //by admin
	Route::get('voucher_duplicates/{id}', 'VoucherController@getGeneratedDups'); //by admin
	Route::get('voucher_batches', 'VoucherController@getOverallBatches'); 
	Route::post('voucher_create_type', 'VoucherController@postOrgTypes');	  //by client 
	Route::post('voucher_implement_type', 'VoucherController@postProgVouchers');	  //by program
	Route::get('voucher_types_of_org', 'VoucherController@getOrgTypes');
	Route::get('voucher_org_batches', 'VoucherController@getOrgBatches');
	Route::get('voucher_types_of_prog', 'VoucherController@getProgTypes');
	Route::get('voucher_prog_batches', 'VoucherController@getProgBatches');
	Route::get('voucher_generate', 'VoucherController@getGenerateForm'); //by program
	Route::post('voucher_generating', 'VoucherController@postVouchersNos'); //by program
	Route::get('voucher_batch_fill/{batch_id}/{missing}', 'VoucherController@postMissingVouchers'); //by program
	Route::get('voucher_batch_detail/{id}', 'VoucherController@getBatchDetails'); //by program
	Route::resource('voucher_prog_destroy', 'VoucherController@postDeleteProgVoucher'); //by program
	Route::get('voucher_overall_batch_detail/{id}', 'VoucherController@getOverallBatchDetails'); //by admin
	Route::get('voucher_all_dups', 'VoucherController@getOverallGeneratedDups'); //by admin 
	Route::get('voucher_choices', 'VoucherController@selectedOrgTypes');	  //by client 
	Route::get('voucher_choices_all', 'VoucherController@allSelectedOrgTypes');	  //by admin 

	//profile
	Route::get('profile_my_profile', 'UserController@getProfile');
	Route::get('profile_change_pass', ['uses' => 'AdminController@edit','as' => 'profile_change_pass']);
	Route::post('new_password', 'UserController@changePassword');

				// Team member
	Route::get('team', ['uses' => 'TeamController@index','as' => 'team']);//field dashboard
	
	//products 
	Route::resource('productlist', 'ProductController');
	Route::get('productlist', 'ProductController@allProducts');	




	/* 
	Route::put('passadmin/{id}', 'UserController@changePassword');
	Route::get('my_profile', ['uses' => 'UserController@myProfile','as' => 'my_profile']);
	Route::get('user/list', ['uses' => 'UserController@index','as' => 'userlist']);
	
	Route::get('user/sort/{role}', 'UserController@indexSort');
	Route::get('user/roles', 'UserController@getRoles');
	Route::post('user/roles', 'UserController@postRoles');

	Route::put('userseen/{user}', 'UserController@updateSeen');*/

	
		
});
