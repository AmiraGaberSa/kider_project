<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;


class TestimonialController extends Controller
{
    use Common;
    //private $columns = ['name','profession','description','image','published'];
    /**
     * Display a listing of the resource.
     
     */
    public function index(){
        $testimonials = Testimonial::get();
        return view('admin.testimonial.testimonials',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()   //to view input form   عرض نموذج الادخال
    {
        return view('admin.testimonial.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //best method for insert and update
       
        $messages = $this->messages();
        $data = $request->validate([
             'name'=>'required|string|max:50',
             'profession'=> 'required|string',
             'description'=> 'required|string',             
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',             
            ], $messages);  //send messages array with data array
            //image upload
            $fileName = $this->uploadFile($request->image,'assets/img'); //html name,path//varible containe file name
            $data['image'] = $fileName;   //store in d.b

            $data['published'] = isset($request->published);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            Testimonial::create($data);
            return redirect()->back();

        
    }    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view ('admin.testimonial.showTestimonial',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view ('admin.testimonial.updateTestimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
             'name'=>'required|string|max:50',
             'profession'=> 'required|string',
             'description'=> 'required|string',             
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',             
            ], $messages);  //send messages array with data array

            //image upload
            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/img');  
                $data['image'] = $fileName;
                unlink("assets/img/" . $request->oldImage); //delete old image
            }
    
            
            $data['published'] = isset($request->published);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            Testimonial::where('id',$id)->update($data);
            return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id',$id)->delete();
        return redirect('testimonials');
    }

    public function trashed()
    {
        $testimonials= Testimonial::onlyTrashed()->get();
        return view('admin.testimonial.testimonialTrashed', compact('testimonials'));
    }

    public function forceDelete(string $id)
    {
        Testimonial::where('id',$id)->forceDelete();
        return redirect()->back();
    }

    public function restore(string $id)
    {
        Testimonial::where('id',$id)->restore();
        return redirect()->back();
    }


    public function messages(){
        return [
            'name.string'=>'Should be string',
            'profession.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please be sure to select an image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ];
    }
}
