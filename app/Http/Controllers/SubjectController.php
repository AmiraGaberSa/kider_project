<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use App\Traits\Common;

class SubjectController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::get();
        return view('admin.subjects.subjects',compact('subjects'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects= Subject::get();
        $teachers= Teacher::get();
        return view('admin.subjects.addSubject',compact('subjects','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'age'=>'required|string',
            'time' => 'required|string',
            'capacity' => 'required|integer',
            'cost' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'teacher_id' => 'required|exists:teachers,id',
        ], $messages);
        //use method from traits called uploadFile
        $fileName = $this->uploadFile($request->image, 'assets/img');
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Subject::create($data);
        return redirect('classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subjects = Subject::findOrFail($id);
        return view('admin.subjects.showSubjects',compact('subjects'));
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects = Subject::findOrFail($id);
        $teachers = Teacher::get();
        return view('admin.subjects.updateSubject', compact("subjects", "teachers"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'age'=>'required|string',
            'time' => 'required|string',
            'capacity' => 'required|integer',
            'cost' => 'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'teacher_id' => 'required',
        ], $messages);
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/img');
            $data['image'] = $fileName;
            //remove old image 
            unlink("assets/img/".$request->oldImageName);
        }
        $data['published'] = isset($request->published);

        Subject::where('id', $id)->update($data);
        return redirect('subjects');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::where('id',$id)->delete();
        return redirect('subjects');
    }


    public function messages()
    {
        return [
            'name.string'=>'Should be string',
            'image.required'=>'Please be sure to select an image',
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
            'teacher_id.exists'=>'Choose teacher whithin our given teachers',
        ];
    }
}
