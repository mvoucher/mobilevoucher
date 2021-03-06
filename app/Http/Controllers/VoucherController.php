<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\VouchertypeRepository;
use App\Http\Requests\VouchertypesRequest;
use App\Models\Vouchertype;

use App\Http\Requests\ProgramVoucherRequest;
use App\Models\Programvouchertype;

use App\Repositories\UserRepository;
use App\Models\User;

use App\Http\Requests\VoucherNoRequest;
use App\Models\Voucherno;

use App\Models\Batch;

use Carbon\Carbon;

class VoucherController extends Controller
{

      protected $vouchertype_gestion;
      protected $user_gestion;


   public function __construct(
      VouchertypeRepository $vouchertype_gestion,
      UserRepository $user_gestion)
   {
      $this->vouchertype_gestion = $vouchertype_gestion;
      $this->user_gestion = $user_gestion;

      //$this->middleware('admin');
   }

	public function index(){
		
	}

//all types in the system
   public function getOverallTypes(){
         $voucher_type = new Vouchertype;
      $voucher_types = $voucher_type->get();
      return view('vouchers.overall_types',compact('voucher_types'));
   }

//all the batches in the system
   public function getOverallBatches(){
       $batch = new Batch;
      $batches = $batch->get();
      return view('vouchers.overall_batches',compact('batches'));
   }

//fetch voucher types of tht org
   public function getOrgTypes(){
      $voucher_type = new Vouchertype;
      $org_id = auth()->user()->id;
      $voucher_types = $voucher_type->where('user_id','=',$org_id)->get();
      return view('vouchers.org_types',compact('voucher_types'));
   }

//creating major voucher types
   public function create(){
      return view('vouchers.org_create');
   }

//all batches generated by programmes unders a given org
   public function getOrgBatches(){
    $batch = new Batch;

    $batches = $batch
            ->join('users', 'users.id', '=', 'batchs.user_id')
            ->where('users.org_id', '=', auth()->user()->id)
            ->select('batchs.*')
            ->get(); 

      return view('vouchers.org_batches',compact('batches'));
   }

   //vouchers implemented by a logged programme
   public function getProgTypes(){

      //fetch vouchers of my organisation only by org id
      $my_org = auth()->user()->org_id;
      $voucher_type = new Vouchertype;
      $voucher_types = $voucher_type->where('user_id','=',$my_org)->get();
      return view('vouchers.prog_types',array_merge(compact('voucher_types'),$this->getProgramImplementedVoucher()));
   }

     //vouchers implemented by a an org's programme
   public function selectedOrgTypes(){
    $impltd = new Programvouchertype;
    $get_impltd = $impltd->where('org_id','=',auth()->user()->id)->get();
    return view('vouchers.org_choices',array_merge(compact('get_impltd')));
   }

        //vouchers implemented by a overall programmes
   public function allSelectedOrgTypes(){
    $impltd = new Programvouchertype;
    $get_impltd = $impltd->get();
    return view('vouchers.overall_choices',array_merge(compact('get_impltd')));
   }
   

//vouchers a program has subscribed to
   public function getProgramImplementedVoucher(){
      $my_org = auth()->user()->org_id; //fetch vouchers of my organisation only by org id
      $my_id = auth()->user()->id;

      $prog_voucher = new Programvouchertype;
      $imp_voucher = $prog_voucher->where('user_id','=',$my_id)->where('org_id','=',$my_org)->get();
      return compact('imp_voucher');
   }

//vouchers a program has not subscribed to
      public function getProgramNonImpmtdVou($id){
      $my_org = auth()->user()->org_id; //fetch vouchers of my organisation only by org id
      $my_id = auth()->user()->id;

      $prog_voucher = new Programvouchertype;
      $imp_voucher = $prog_voucher
                     ->where('user_id','=',$my_id)
                     ->where('org_id','=',$my_org)
                     ->where('vouchertype_id','=',$id)
                     ->first();
      
      if (is_null($imp_voucher)) {
    // It does not exist
         return false;
} else {
    // It exists
   return true;
}
   }

   //batches generated by a program
   public function getProgBatches(){
      $batch = new Batch;
      $batches = $batch->where('user_id','=',auth()->user()->id)->get();
      return view('vouchers.prog_batches',compact('batches'));
   } 

   //generate vouchers form
   public function getGenerateForm(){
      return view('vouchers.prog_generate',$this->getProgramImplementedVoucher());
   }

   //get batch details
   public function getBatchDetails($id){
       $batchdetails = new Voucherno;
      $batchdetail = $batchdetails->where('batch_id','=',$id)->get();
      return view('vouchers.prog_batch_detail',compact('batchdetail'));
   }

   //overall batch detail
   public function getOverallBatchDetails($id){
       $batchdetails = new Voucherno;
      $batchdetail = $batchdetails->where('batch_id','=',$id)->get();
      return view('vouchers.overall_batch_detail',compact('batchdetail'));
   }

   //post voucher types
   public function postOrgTypes(VouchertypesRequest $request){

      $vouchertype = new Vouchertype;
      $vouchertype->name = $request->name;
      $vouchertype->category = $request->category;
      $vouchertype->color = $request->color;
      $vouchertype->value = $request->value;
      $vouchertype->user_id = auth()->user()->id;
      $vouchertype->save();

      return redirect('voucher_types_of_org')->with('ok', 'Voucher type successfully created.');


   }

   //post a program voucher types
   public function postProgVouchers(ProgramVoucherRequest $request){

      $prog_voucher = new Programvouchertype;
      $prog_voucher->vouchertype_id = $request->vouchertype_id;
      $prog_voucher->user_id = $request->user_id;
      $prog_voucher->org_id = $request->org_id;
      $prog_voucher->save();

     return redirect('voucher_types_of_prog')->with('ok', 'Voucher type successfully added to list.');

}

//generate missing vouchers
public function postMissingVouchers($batch_id, $missing){

      //storend post a all generated numbers
      $this->storationArry($missing,$batch_id);
      return redirect()->back()->with('ok','Vouchers successfully generated');
}

//generating voucher numbers
public function postVouchersNos(VoucherNoRequest $request){
  ini_set('max_execution_time', 300); //300 seconds = 5 minutes
 
        $batch = new Batch;
        $batch->vouchertype_id = $request->type;
        $batch->quantity = $request->number;
        $batch->user_id = auth()->user()->id;
        $batch->save();

        //last inserted id
        $batchno = $batch->id;

        //get set number of vouchers to generate
        $numberofvouchers = $batch->where('id','=',$batchno)->first();
        $max_number =  $numberofvouchers->quantity;  

      //storend post a all generated numbers
      $this->storationArry($max_number,$batchno);

        return redirect('voucher_prog_batches')->with('ok','Vouchers successfully generated. Click the [plus] button in case a batch has defaulted vouchers');
    }

    //with array that stores the generated numbers and posts them to db
    public function storationArry($max_number,$batchno){
              for ($i = 0; $i<$max_number; $i++) 
         {
            $insert[]= [
              'batch_id' => $batchno,
              'voucherno' => $this->genVoucherNo(),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
            ];
         }
         // Remove the duplicates
          $output = array_intersect_key($insert, array_unique(array_column($insert, 'voucherno')));
         $vouchers = new Voucherno;
         $vouchers->insert($output);
    }

       //generate a voucher number combination
    public function genVoucherNo(){
     $exserialnos = new Voucherno; 

      do{
          $vouchernos =sprintf('%07d',mt_rand(999,900000));
      }while (!is_null($exserialnos->where('voucherno','=',$vouchernos)->first()));
          return $vouchernos;      
    }

        //generated all voucher numbers duplicates
    public function getOverallGeneratedDups(){
      $vouchers = new Voucherno;

      $duplicates = $vouchers->whereIn('voucherno', function($query){
      $query->select('voucherno')
              ->from('vouchernos')
              ->groupBy('voucherno')
              ->havingRaw('COUNT(voucherno) > 1');  })->get();   

        return view('vouchers.overall_duplicates',compact('duplicates'));
    }

    //count the actual number of generated vouchers
    public function actualVouchInsert($batch_id){
      $voucherno = new Voucherno;
      $vouchernos = $voucherno->where('batch_id','=',$batch_id)->count();
      return $vouchernos;
    }


    //generated voucher numbers duplicates
    public function getGeneratedDups($id){
      $vouchers = new Voucherno;

      $duplicates = $vouchers
    ->select('voucherno')
    ->where('batch_id', $id)
    ->groupBy('voucherno')
    ->havingRaw('COUNT(*) > 1')
    ->get();

        return view('vouchers.duplicates',compact('duplicates'));
    }

    public function duplicateExist($id){
$vouchers = new Voucherno;

      $duplicates = $vouchers
    ->select('voucherno')
    ->where('batch_id', $id)
    ->groupBy('voucherno')
    ->havingRaw('COUNT(*) > 1')
    ->get();



    if ($duplicates->count()) {
      return true;
    }else{
      return false;
    }

    }

    //load edit view for voucher types
    public function edit($id){
      $edit_vtypes = new Vouchertype;
      $vouchertype = $edit_vtypes->where('id','=',$id)->first();
      return view('vouchers.org_edit',compact('vouchertype'));
    }

    //update voucher type
    public function update(VouchertypesRequest $request,$id){
        $vouchertype = new Vouchertype;
      $vouchertype->where('id','=',$id)->update(
        array(
      'name' => $request->name,
      'category' => $request->category,
      'color' => $request->color,
      'value' => $request->value
      ));
    return redirect('voucher_types_of_org')->with('ok', 'Voucher type updated successfully');
  }

    //delete programme voucher
    public function postDeleteProgVoucher($id){
      //deleter must be the creator
      $my_id = auth()->user()->id;
      $prog_voucher = new Programvouchertype;
      $prog_voucher->where('user_id','=',$my_id)
                     ->where('id','=',$id)
                     ->delete();

      return redirect()->back()->with('ok','You have successfully unsubscribed');

    }

    public function destroy(){
      return redirect()->back()->with('ok','You have successfully deleted voucher type');
    }



}
