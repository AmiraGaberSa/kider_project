<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     */
    public function index(){
        $appointments = Appointment::get();
        return view('admin.appointment.appointments',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()   //to view input form   عرض نموذج الادخال
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //best method for insert and update
       
        $messages = $this->messages();
        $data = $request->validate([
            'guardianName'=>'required|string|max:50',
            'guardianEmail'=>'required|email',
            'childName' => 'required|string|max:50',
            'childAge' => 'required|integer',
            'message' => 'required|string',      
            ], $messages);  //send messages array with data array
            
            Appointment::create($data);
            return redirect()->back();

        
    }    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointments = Appointment::findOrFail($id);
        return view ('admin.appointment.showAppointment',compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $testimonial = Testimonial::findOrFail($id);
        // return view ('admin.testimonial.updateTestimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::where('id',$id)->delete();
        return redirect('appointments');
    }

    

    public function messages(){
        return [
            'guardianName.string'=>'Should be string',
            'description.required'=> 'should be text',
            'childName' => 'Should be string',
            'childAge' => 'Should be string',
            
            ];
    }
}
