<?php

namespace App\Http\Controllers\adminController;

use App\Milestone;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class MilestoneController extends Controller
{
    /*This is for milestone fund transfer
        In request milestoneId is milestone ID
        fund is How many amount we have to transfer
    */
    public function MilestoneFundTransfer(Request $request){
        $validator = \Validator::make($request->all(), [
            'milestoneId' => 'required',
            'fund' => 'required',
            'contactId' => 'required',

        ], [
            'milestoneId.required' => "Milestone doesn't match or not found",
            'fund.required' => 'Something went wrong with the Fund',
            'contactId.required' => 'Contact not found'
        ]);
        if ($validator->fails()) {
            $mes = "<div class='alert alert-danger text-center'>";
            foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                foreach ($messages as $mes) {
                    $mes.= "<br/>";
                }
            }
            $mes.=  "</div>";
            echo $mes;
        }else{
            $milestoneId = $request->input('milestoneId');
            $fund = $request->input('fund');
            $contactId = $request->input('contactId');
            $affected =Milestone::where(['id'=>$milestoneId,'fund_release'=>$fund,'contact_id'=>$contactId,'status'=>4])->update(['status'=>2]);
            if($affected!=0){
                echo null;
            }else{
                $mes = "<div class='alert alert-danger text-center'>";
                $mes.=  "Something went wrong, Transaction doesn't complete";
                $mes.=  "</div>";
                echo $mes;
            }
        }
    }

}
