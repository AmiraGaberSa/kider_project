<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UnreadMessageController;

Auth::routes(['verify'=>true]);
Route::group(['middleware' => ['verified']], function () { //confirm verify by middleware
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

//admin testimonial
Route::get('addTestimonial', [TestimonialController::class, 'create'])->name('addTestimonial');
Route::post('storeTestimonial', [TestimonialController::class, 'store'])->name('storeTestimonial');
//view testimonials from d.b(show,edit,delete)
Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials');  
//edit
Route::get('updateTestimonial/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
Route::put('updateTestimonial/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
//show
Route::get('showTestimonial/{id}', [TestimonialController::class, 'show'])->name('showTestimonial');
//delete
Route::get('deleteTestimonial/{id}', [TestimonialController::class, 'destroy'])->name('deleteTestimonial'); 
Route::get('trashedTestimonial', [TestimonialController::class, 'trashed'])->name('trashedTestimonial'); 
Route::get('forceDeleteTestimonial/{id}', [TestimonialController::class, 'forceDelete'])->name('forceDeleteTestimonial');  
Route::get('restoreTestimonial/{id}', [TestimonialController::class, 'restore'])->name('restoreTestimonial');   

//appointment
//d.b store from page form
Route::post('storeAppointment',[AppointmentController::class,'store'])->name('storeAppointment');
//fetch data from d.b
Route::get('appointments',[AppointmentController::class,'index'])->name('appointments');
//show and delete
Route::get('showAppointment/{id}',[AppointmentController::class,'show'])->name('showAppointment');
Route::get('deleteAppointment/{id}', [AppointmentController::class, 'destroy'])->name('deleteAppointment'); 

//contact
//d.b store from page form
Route::post('storeContact',[ContactController::class,'store'])->name('storeContact');
//fetch data from d.b
Route::get('contacts',[ContactController::class,'index'])->name('contacts');
//show and delete
Route::get('showContact/{id}',[ContactController::class,'show'])->name('showContact');
Route::get('deleteContact/{id}', [ContactController::class, 'destroy'])->name('deleteContact'); 

//admin add new teacher
Route::get('addTeacher', [TeacherController::class, 'create'])->name('addTeacher');
Route::post('storeTeacher', [TeacherController::class, 'store'])->name('storeTeacher');
 //fetch teachers from d.b
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers'); 
//show
Route::get('showTeachers/{id}', [TeacherController::class, 'show'])->name('showTeachers');
//edit
Route::get('updateTeacher/{id}', [TeacherController::class, 'edit'])->name('editTeacher');
Route::put('updateTeacher/{id}', [TeacherController::class, 'update'])->name('updateTeacher');
//delete
Route::get('deleteTeacher/{id}', [TeacherController::class, 'destroy'])->name('deleteTeacher'); 
Route::get('teachersTrashed', [TeacherController::class, 'trashed'])->name('teachersTrashed'); 
Route::get('forceDeleteTeacher/{id}', [TeacherController::class, 'forceDelete'])->name('forceDeleteTeacher');  
Route::get('restoreTeacher/{id}', [TeacherController::class, 'restore'])->name('restoreTestimonial');   

//admin add new subject
Route::get('addSubject', [SubjectController::class, 'create'])->name('addSubject');
Route::post('storeSubject', [SubjectController::class, 'store'])->name('storeSubject');
//fetch subjects from d.b
Route::get('subjects', [SubjectController::class, 'index'])->name('subjects'); 
//show
Route::get('showSubjects/{id}', [SubjectController::class, 'show'])->name('showSubjects'); 
//edit
Route::get('updateSubject/{id}', [SubjectController::class, 'edit'])->name('editSubject');
Route::put('updateSubject/{id}', [SubjectController::class, 'update'])->name('updateSubject');
//delete
Route::get('deleteSubject/{id}', [SubjectController::class, 'destroy'])->name('deleteSubject'); 

//unread messages 
Route::get('unreadMessages',[UnreadMessageController::class,'index'])->name('unreadMessages');
Route::get('showUnreadMessages/{id}',[UnreadMessageController::class,'show'])->name('showUnreadMessages');
Route::get('deleteUnreadMessage/{id}',[UnreadMessageController::class,'destroy'])->name('deleteUnreadMessage');
});