<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){
        $doctor = new Doctor();
        $image = $request->file;
        $imagename =time(). '.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image = $imagename;
        
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->specialty=$request->specialty;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');



    }
    public function showappointment()
    {
        $data = Appointment::all();
        return view('admin.showappointment',compact('data'));
    }
    public function approved($id){
        $data = Appointment::find($id);
        $data->status = 'Approved';

        $data->save();

        return redirect()->back();
    }

    public function canceled($id){
        $data = Appointment::find($id);
        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();
    }
    public function showdoctor(){

        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }
    public function deletedoctor($id){

        $data = Doctor::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id){
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->specialty = $request->specialty;
        
        $image = $request->file;

        if($image){
            $imagename = time(). '.'.$image->getClientoriginalExtension();

                $request->file->move('doctorimage',$imagename);

                $doctor->image = $imagename;
        }

    

            $doctor->save();

            return redirect()->back()->with('message','Doctor Details update successfully');


    }
    public function email_send($id){
        $data = Appointment::find($id);
        return view('admin.email_send',compact('data'));
    }

    public function send_email(Request $request,$id){

        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];
        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email was sent successfully');
    }
}
