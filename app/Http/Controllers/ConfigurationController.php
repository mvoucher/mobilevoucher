<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\VoucherLimits;
use App\Http\Requests\VoucherLimitRequest;

class ConfigurationController extends Controller
{

	public function index(){
		
	}

   public function getVoucherSettings(){
         $limits = new VoucherLimits;

          //fetch set seral limits
         $set_vnos = $limits->where('limit','=','voucherno')->first();

      return view('config.set_voucher',compact('set_vnos'));
   }

      public function getSerialSettings(){
         $limits = new VoucherLimits;

       //fetch set seral limits
         $set_snos = $limits->where('limit','=','serialno')->first();

      return view('config.set_serial',compact('set_snos'));
   }

      public function setNewLimit(VoucherLimitRequest $request,$limit){

         $vc = new VoucherLimits;
         $vc->where('limit','=',$limit)->update(
            array(
         'min' => $request->min,
         'max' => $request->max
         ));
      return redirect()->back()->with('ok','Limit successfully updated');
   }


}
