<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
// use Illuminate\Notifications\Notification;

class AdminController extends Controller
{
    public function addview()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;

        $image = $request->file; //get the image file
        $imagename = time() . '.' . $image->getClientoriginalExtension(); //use the time function to make the image not repeat
        $request->file->move('doctorimage', $imagename); //move the image to the file in public which is doctorimage
        $doctor->image = $imagename; //save the filename to the database

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function showappointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $appointment = Appointment::all();
                return view('admin.showappointment', compact('appointment'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = "Approved";
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status = "Canceled";
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $doctor = Doctor::all();
                return view('admin.showdoctor', compact('doctor'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $doctor = Doctor::find($id);
                return view('admin.update_doctor', compact('doctor'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $image = $request->file; //get the image file
        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension(); //use the time function to make the image not repeat
            $request->file->move('doctorimage', $imagename); //move the image to the file in public which is doctorimage
            $doctor->image = $imagename; //save the filename to the database
        }
        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }

    public function emailview($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $appointment = Appointment::find($id);
                return view('admin.email_view', compact('appointment'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function sendemail(Request $request, $id)
    {
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email sended successfully');
    }
}
