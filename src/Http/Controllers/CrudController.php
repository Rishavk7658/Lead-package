<?php

namespace Netweb\Lead\Http\Controllers;

use Illuminate\Http\Request;
use Netweb\Lead\Models\LeadLogs;
use Netweb\Lead\Models\Register;
use Netweb\Lead\Models\PackageLogs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Netweb\Lead\Models\InterestAndLeadStatus;


class CrudController extends Controller
{
   public function index($id = NULL){
      $data['id']               = $id;
      if($id != null)
      {
          $data['data']         = Register::find($id);
      }
      
      $temp                     = config('lead.CountryModalNameSpace');
      $modal                    = new $temp;
      $data['countries']        = $modal->all();

      $modal_namespace2         = config('lead.StateModalNameSpace');
      $modal2                   = new $modal_namespace2;
      $data['states']           = $modal2->all();

      $modal_namespace3         = config('lead.CityModalNameSpace');
      $modal3                   = new $modal_namespace3;
      $data['cities']           = $modal3->all();

      $data['interest_level']   = InterestAndLeadStatus::where('option_name','interest_level')->get();
      $data['lead_status']      = InterestAndLeadStatus::where('option_name','lead_status')->get();


           return view('crud::crud-index',compact('data'))->render(); 

   }



   public function insert(Request $req)
   {
       if($req){ 
         $logs= new PackageLogs();
                        if($req->id == ''){
                          $logs->action='Insert';
                          }

                              $logs->user_type        =  'user';
                              $logs->section          =  'Registration';
                              $logs->action           =  'Update';
                              $logs->mobile_number    =   $req->mobile_number;
                              $logs->email            =   $req->email;
                      
                        if($logs->save())
                        {
                          $data=Register::where('id',$req->id)->first();
                          if($req->id == ''){
                            $data=new Register();
                          }
                              $data->first_name     = $req->first_name;
                              $data->last_name      = $req->last_name;
                              $data->user_id        = $req->sponser_id;
                              $data->email          = $req->email;
                              $data->mobile_number  = $req->mobile_number;
                              $data->country        = $req->country;
                              $data->city           = $req->city;
                              $data->state          =$req->state;                              $data->interest_level = $req->interest_level;
                              $data->lead_status    = $req->lead_status;
                              $data->next_follow_up_date=$req->next_follow_up_date;
                              $data->description    = $req->description;
                    
                              if($data->save())
                              {
                                if($req->id == ''){

                                  $logs->update(['user_id' =>$data->id,
                                                  'status' => 1]);
                                      $leads_log=new LeadLogs();
                                      $leads_log->lead_id             =$data->id;
                                      $leads_log->user_id             =$req->sponser_id;
                                      $leads_log->description         =$data->description;
                                      $leads_log->next_follow_up_date=$req->next_follow_up_date;
                                      $leads_log->status                =0;
                                      $leads_log->remark                ='First lead created';
                                      $leads_log->save();
                                }
                                return [
                                  'status' =>'success',
                                  'msg' => "Registration Successful"
                                ];
                              }
                          }

      }
    }
  


     public function admin_interest_level()
     {
        $interest_level=InterestAndLeadStatus::where('option_name','interest_level')->get();

        return view('crud::interest-level',compact('interest_level'))->render(); 
     }

     public function store_interest_level(Request $req)
     { 
        if($req)
        {
                $logs= new PackageLogs();
                $logs->user_id      = config('lead.admin_id');
                $logs->user_type    = 'admin';
                $logs->section      = 'Interest Level';
                if($req->id != '' ){
                  $logs->action     = 'Update';
                }else{
                  $logs->action     = 'Insert';
                }
                $logs->email        = config('lead.admin_email');
        
          if($logs->save())
           {
              $interst_level = InterestAndLeadStatus::where('id', $req->id)->first();
                  if($req->has('interest_level')){
                        $option_name      = 'interest_level';
                        $option_value     = $req->interest_level;
                    }else
                    {
                        $option_name      = 'lead_status';
                        $option_value     = $req->lead_status;
                    }

                      if (!$interst_level)
                      {
                          $interst_level                 = new InterestAndLeadStatus();
                      }
                          $interst_level->option_name    = $option_name;
                          $interst_level->option_value   = $option_value;
                        if($interst_level->save())
                        { 
                          $logs->update(['status' => 1]);

                            return response([
                              'status' => 'success',
                            ]);
                        }
            }

        }
     }

     public function edit_interest_level(Request $req)
     {

          $record =  InterestAndLeadStatus::find($req->id);
          return ['status' =>'success',
                   'data'  => $record
                 ];

     }
     public function delete_interest_level(Request $req)
     {
      if($req){
        $record =  InterestAndLeadStatus::find($req->id);
            if($record->option_name == 'interest_level')
            {
              $section_name     ='Interest Level'; 
            }else 
            {
              $section_name     ='Lead Status'; 
            }
            $logs= new PackageLogs();
            $logs->user_id      = config('lead.admin_id');
            $logs->user_type    = 'admin';
            $logs->section      = $section_name;
            $logs->action       ='Delete';
            $logs->email        = config('lead.admin_email');
            if($logs->save()){
              if($record->delete()){
                $logs->update(['status' => 1]);
                return ['status' =>'success'];
              }

            }

       }
          

     }

     public function admin_lead_status()
     {
      $lead_status=InterestAndLeadStatus::where('option_name','lead_status')->get();

      return view('crud::lead-status',compact('lead_status'))->render(); 
     }


    public function delete_lead($id){
      if($id){
        $record =  Register::find($id);
            $logs= new PackageLogs();
            $logs->user_id    = $record->id;
            $logs->user_type  = 'users';
            $logs->section    = 'Registration';
            $logs->action     ='Delete';
            $logs->email      = $record->email;
            if($logs->save()){
              if($record->delete()){
                $all_leads=LeadLogs::where('lead_id',$id)->delete();
                $logs->update(['status' => 1]);
                return Redirect::back();
              }

            }

       }

    }
    public function add_next_foolow_up(Request $req){
      // dd($req->all());
      if($req){

        $leads_log=new LeadLogs();
        $leads_log->lead_id               = $req->lead_id;
        $leads_log->user_id               = Auth::user()->user_id; 
        $leads_log->description           = $req->description2;
        $leads_log->next_follow_up_date   = $req->next_follow_up_date2;
        $leads_log->status                = $req->status;
        $leads_log->remark                = $req->remark;
        if($leads_log->save()){

          return ['status'   =>'success',
                  'message'  =>'Next Follow Up Added Successfully'
                ];
        }
        return ['status'   =>'unsuccess',
                'message'  =>'Somthing went wrong Try again later'
                ];


      }
    }
    public function lead_history_view(){
      $leads=Register::
                        where('user_id',Auth::user()->user_id)->
                        get();
      
      return view('crud::leads-history',compact('leads'));

    }
    public function get_lead_history(){
      $lead_id = $_GET['lead_id'];
      // dd($lead_id);
      $history=  LeadLogs::select('description','next_follow_up_date')
                         ->where('lead_id' , $lead_id)
                         ->WhereNotNull('next_follow_up_date')
                          ->where('user_id',Auth::user()->user_id)
                          ->groupby('description','next_follow_up_date')
                          ->orderBy('next_follow_up_date', 'ASC')
                          ->get();
                          $html='';
                          $count=0;
                          foreach($history as $val)
                          {
                            $class = ($count%2 != 0) ? "right" : "";
                                    $html.=' <div class="timeline-year" month-data= '.date("F", strtotime($val->next_follow_up_date
                                        )).'>
                                        <div class="timeline-box '.$class.'">
                                          <div class="timeline-content">
                                            <h4 class="dateTimeline">'.date("d F", strtotime($val->next_follow_up_date
                                              )).'</h4>
                                            <p>'.$val->description.'</p>
                                          </div>
                                        </div>
                                      </div>';

                                      $count++;
                    
                          }
                            return ['status'   =>'success',
                                    'html'  => $html
                            ];

    }
     
}
