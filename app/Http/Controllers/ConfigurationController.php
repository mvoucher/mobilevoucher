<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ConfigurationController extends Controller
{

	public function index(){
		
	}

   public function getVoucherSettings(){
      return view('config.vouchers');
   }

      public function setVoucherSettings(){
      return view('config.set_voucher');
   }

         public function setSerialSettings(){
      return view('config.set_serial');
   }

}
