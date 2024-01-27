<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Appointment;
use App\Models\Teacher;
use App\Models\Subject;

class WebController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('published', 1)->orderBy('id','DESC')->take(3)->get();
        $teachers = Teacher::where('published', 1)->orderBy('id','DESC')->take(3)->get();
        $subjects = Subject::where('published', 1)->orderBy('id', 'desc')->take(9)->get();
        return view('index',compact('testimonials','teachers','subjects'));
    }

    public function testimonial()
    {
        $testimonials=Testimonial::get();
        return view('testimonial',compact('testimonials'));
    }

    public function appointment()
    {
        return view('appointment');
    }

    public function about()
    {
        $teachers=Teacher::get();
        return view('about', compact('teachers'));
    }

    public function callToAction()
    {
        return view('callToAction');
    }

    public function contact()
    {
        return view('contact');
    }

    public function facility()
    {
        return view('facility');
    }

    public function classes()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        $subjects = Subject::where('published', 1)->get();
        return view('classes',compact('testimonials','subjects'));
    }

    public function team()
    {
        $teachers=Teacher::get();
        return view('team',compact('teachers'));
    }

    

}
