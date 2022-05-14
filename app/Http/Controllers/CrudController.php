<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student; 
use App\Models\User; 

class CrudController extends Controller
{
    // Show all data on student
	 public function index()
    {
		$get_all = Student::all();	
        return view('crud',compact("get_all"));
    }
	
	
	//Add new data of student table
	public function insert(Request $request){
		$name     = $request->input('name');		
		$email    = $request->input('email');		
		$phone    = $request->input('phone');		
		$address  = $request->input('address');		
		if($files = $request->file('image')){  
			$images = $files->getClientOriginalName(); 
			$files->move('images',$images);  	
		} 
		$addnew = new Student([
				'name' => $name,
				'email'=> $email,
				'phone'=> $phone,
				'address'=> $address,
				'image'=> $images
			]);
		$addnew->save(); 	
		return Response()->json($addnew);
	}
	
	
	
	
	// edit the student table data
	public function student($id){
		$Student = Student::find($id);
		return Response()->json($Student);
	}
	
	// update the student table data	
	public function updatecrud(Request $request){
		$edit_id       = $request->input('edit_id');		
		$edit_name     = $request->input('edit_name');		
		$edit_email    = $request->input('edit_email');		
		$edit_phone    = $request->input('edit_phone');		
		$edit_address  = $request->input('edit_address');		
		if($files = $request->file('edit_image')){  
			$images = $files->getClientOriginalName(); 
			$files->move('images',$images);  	
		} 
		if(!empty($images)){
			$upload_image = $images;
		}else{
			$upload_image = $request->input('edit_image_hidden');
		}
		$updatecrud   		  = Student::find($edit_id);
		$updatecrud->name     = $edit_name; 
		$updatecrud->email    = $edit_email; 
		$updatecrud->phone    = $edit_phone; 
		$updatecrud->address  = $edit_address; 
		$updatecrud->image    = $upload_image; 
		$updatecrud->update();  
		return Response()->json($updatecrud);	
	}
	
	// Destroy student data.
	public function destroy($id){
	  $delete = Student::find($id);
	  $delete->delete();
	  return Response()->json($delete);
	 
	}
	
}
