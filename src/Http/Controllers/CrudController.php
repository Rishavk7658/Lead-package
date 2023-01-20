<?php

namespace Netweb\Lead\Http\Controllers;

use Illuminate\Http\Request;
use Netweb\Lead\Models\Register;
use App\Http\Controllers\Controller;
use Netweb\Lead\Models\InterestAndLeadStatus;
use App\Models\Countries;

class CrudController extends Controller
{
   public function index(){
    $countries=Countries::all();
      $interest_level=InterestAndLeadStatus::where('option_name','interest_level')->get();
      $lead_status=InterestAndLeadStatus::where('option_name','lead_status')->get();
      return view('crud::crud-index',compact('interest_level','lead_status','countries'))->render(); 

   }



   public function insert(Request $req){
    // dd($req->all());
     if($req){
      $data=new Register();
      $data->first_name=$req->first_name;
      $data->last_name=$req->last_name;
      $data->sponser_id=$req->sponser_id;
      $data->email=$req->email;
      $data->mobile_number=$req->mobile_number;
      $data->country=$req->country;
      $data->interest_level=$req->interest_level;
      $data->lead_status=$req->lead_status;
      $data->next_follow_up_date=$req->next_follow_up_date;
      $data->description=$req->description;
      
      if($data->save()){
        return [
          'status' =>'success',
          'msg' => "Registration Successful"];
       }

      }
     }
  


     public function admin_interest_level(){
      $interest_level=InterestAndLeadStatus::where('option_name','interest_level')->get();

      return view('crud::interest-level',compact('interest_level'))->render(); 
     }
     public function store_interest_level(Request $req){
   
      $interst_level = InterestAndLeadStatus::where('id', $req->id)->first();
      if (!$interst_level) {
          $interst_level = new InterestAndLeadStatus();
      }
      $interst_level->option_name='interest_level';
      $interst_level->option_value=$req->interest_level;
      if($interst_level->save()){
          return response([
            'status' => 'success',
        ]);
      }
     
     }
     public function edit_interest_level(Request $req){
      // dd($req->all());
      $record =  InterestAndLeadStatus::find($req->id);
      return ['status' =>'success',
      'data' => $record];

     }
     public function delete_interest_level(Request $req){
      // dd($req->all());
      $record =  InterestAndLeadStatus::find($req->id);
      $record->delete();
      return ['status' =>'success',
   ];

     }

     public function admin_lead_status(){
      $lead_status=InterestAndLeadStatus::where('option_name','lead_status')->get();
      return view('crud::lead-status',compact('lead_status'))->render(); 
     }

     public function store_lead_status(Request $req){
   
      $lead_status = InterestAndLeadStatus::where('id', $req->id)->first();
      if (!$lead_status) {
          $lead_status = new InterestAndLeadStatus();
      }
      $lead_status->option_name='lead_status';
      $lead_status->option_value=$req->lead_status;
      if($lead_status->save()){
          return response([
            'status' => 'success',
        ]);
      }
     
     }
     
}
