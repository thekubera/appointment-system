<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Officer;
use App\Models\WorkDays;
use App\Models\Activity;

class OfficerController extends Controller
{
    public function index() {
        $data = Officer::get();
        return view('officer.index', [
            'data' => $data
        ]);
    }

    public function viewAppointment(Request $request) {
        $activity = Activity::select('aname', 'atype', 'astatus', 'adate', 'startTime', 'endTime', 'oname', 'vname')
            ->leftjoin('officers','activities.officer_id','=','officers.id')
            ->leftjoin('visitors','activities.visitor_id','=','visitors.id')
            ->whereRaw('officer_id = ? AND atype = ?', [$request->id, 'Appointment'])
            ->orderBy('adate', 'DESC')
            ->get()->all();

            return view('officer.view_appointment', [
            'data' => $activity
        ]);
    }

    public function store(Request $request) {
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
            'post' => 'required|alpha',
            'status' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'days' => 'required'
        ]);

        $clientErrors = array();

        if($validator->fails()) {
            $errors = $validator->errors()->getMessages();  
            foreach ($errors as $key => $value) {
                $clientErrors[$key] = $value[0];
            }

            $response = array(
                'status' => 'error',
                'errors' => $clientErrors
            );

            return response()->json($response);
        }

        if(strtotime($request->start_time) >= strtotime($request->end_time)) {
               //if(! Arr::exists($clientErrors, 'start_time')) 
                $clientErrors['start_time'] = 'Start time must be smaller than end time';

                $response = array(
                    'status' => 'error',
                    'errors' => $clientErrors
                );
                return response()->json($response);
        }

        // now insert into database+
        $officer = Officer::create([
           'oname' => $request->name,
           'post' => $request->post,
           'ostatus' => $request->status,
           'workStartTime' => $request->start_time,
           'workEndTime' => $request->end_time 
        ]);

        foreach($request->days as $key=>$name) {
                $obj1 = new WorkDays();
                $obj1->officer_id = $officer->id;
                $obj1->dayofweek = $name;
                $obj1->save();
        }

        return response()->json(['success' => 'Data inserted successfully.']);
    }

    public function toggleStatus(Request $request) {

        if($request->status == "Active") {
            $obj = Officer::findOrFail($request->id);

            $obj->ostatus = ($request->status == "Active") ? "Inactive": "Active";
            $obj->save();

            Activity::where('officer_id', '=', $request->id)->update([
                'astatus' => 'Deactivated'
            ]);

            return response()->json(['success' => 'Toggled successfully']);   
        } else if($request->status == "Inactive") {
            $obj = Officer::findOrFail($request->id);

            $obj->ostatus = ($request->status == "Active") ? "Inactive": "Active";
            $obj->save();

            Activity::where('officer_id', '=', $request->id)->update([
                'astatus' => 'Active'
            ]);

            return response()->json(['success' => 'Toggled successfully']);
        }

        return null;     
    }

    public function edit(Request $request) {

        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z\s]*$/'],
            'post' => 'required|alpha',
            'workStartTime' => 'required|date_format:H:i',
            'workEndTime' => 'required|date_format:H:i',
            'days' => 'required'
        ]);

        $clientErrors = array();

        if($validator->fails()) {
            $errors = $validator->errors()->getMessages();  
            foreach ($errors as $key => $value) {
                $clientErrors[$key] = $value[0];
            }

            $response = array(
                'status' => 'error',
                'errors' => $clientErrors
            );

            return response()->json($response);
        }



        if(strtotime($request->workStartTime) >= strtotime($request->workEndTime)) {
               //if(! Arr::exists($clientErrors, 'start_time')) 
                $clientErrors['workStartTime'] = 'Start time must be smaller than end time';

                $response = array(
                    'status' => 'error',
                    'errors' => $clientErrors
                );
                return response()->json($response);
        }

        $officer = Officer::findOrFail($request->id);

        $officer->oname = $request->name;
        $officer->post = $request->post;
        $officer->workStartTime = $request->workStartTime;
        $officer->workEndTime = $request->workEndTime;


         WorkDays::where('officer_id', $request->id)->delete();

         foreach($request->days as $key=>$name) {
                $workDay = new WorkDays();
                $workDay->officer_id = $request->id;
                $workDay->dayofweek = $name;
                $workDay->save();
        }
        $officer->save();

        return response()->json(['success' => 'Data updated successfully.']); 
    }

    public function getDetail(Request $request) {
        $officer = Officer::select('id', 'oname as name', 'post', 'workStartTime', 'workEndTime')->findOrFail($request->id);
        $workDays = WorkDays::where('officer_id', $request->id)->get();

        return response()->json([
            'officer' => $officer,
            'workDays' => $workDays
        ]);
    }
}
