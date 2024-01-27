<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::get();
        return view('admin.teachers.teachers',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.addTeacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'designation'=>'required',
            'facebook' => 'required|email',
            'twitter' => 'required|email',
            'instgram' => 'required|email',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',    
            ], $messages);  //send messages array with data array
            //image upload
            $fileName = $this->uploadFile($request->image,'assets/img'); //html name,path//varible containe file name
            $data['image'] = $fileName;   //store in d.b

            $data['published'] = isset($request->published);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            Teacher::create($data);
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teachers = Teacher::findOrFail($id);
        return view ('admin.teachers.showTeachers',compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view ('admin.teachers.updateTeacher',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'designation'=>'required',
            'facebook' => 'required|email',
            'twitter' => 'required|email',
            'instgram' => 'required|email',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',   
            ], $messages);  //send messages array with data array

            //image upload
            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/img');  
                $data['image'] = $fileName;
                unlink("assets/img/" . $request->oldImage); //delete old image
            }
    
            
            $data['published'] = isset($request->published);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            Teacher::where('id',$id)->update($data);
            return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $importantTeacher = Subject::where('teacher_id',$id)->count();
        if ($importantTeacher){
            return back()->with('error',"This teacher is linked to a class. It can't be deleted");

        }else{
            Teacher::where('id',$id)->delete();
            return redirect('teachers');

        }
        
    }

    public function trashed()
    {
        $teachers = Teacher::onlyTrashed()->get();
        return view('admin.teachers.teachersTrashed', compact('teachers'));
    }

    public function forceDelete(string $id)
    {
        Teacher::where('id',$id)->forceDelete();
        return redirect()->back();
    }

    public function restore(string $id)
    {
        Teacher::where('id',$id)->restore();
        return redirect()->back();
    }


    public function messages()
    {
        return [
            'name.string'=>'Should be string',
            'image.required'=>'Please be sure to select an image',
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
        ];
    }
}
