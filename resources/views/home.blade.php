@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-sm-10">
		</div>	
		<div class="col-sm-2">
			<button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#myModal">
				Add New
			</button>
		</div>
    </div><br/><br/>
    <table class="table">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Image</th>
			<th>Action</th>
		  </tr>
		</thead>
		<tbody>
				<tr>
					<td>ddd</td>
					<td>Test@gmail.com</td>
					<td>7845785841</td>
					<td>mohali</td>
					<td><img src="/Adminpanel/public/images/" width="100" height="100"></td>
					
					<td><button type="button" class="btn btn-primary text-right" value="1" data-toggle="modal" data-target="#editmodel"><i class="fa fa-pencil m-r-5"></i> Edit</button>
					</td>
					<td><a href="1">Delete</a></td>
				</tr>
		
		</tbody>
    </table>
</div>



<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div class="container">
			<form action=" " class="btn-submit" method="post" enctype="multipart/form-data">
			    @csrf
				<div class="form-group">
				  <label for="name">Name:</label>
				  <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
				</div>
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				</div>
				<div class="form-group">
				  <label for="video">Phone:</label>
				  <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
				</div>
				<div class="form-group">
				  <label for="video">Address:</label>
					 <textarea id="address" name="address" rows="4" cols="50" class="form-control">
						
					</textarea>
				  
				</div>
				<div class="form-group">
				  <label for="image">Image:</label>
				  <input type="file" class="form-control" id="image" name="image">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			  </form>
			</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
  
  
  <!-- The Modal -->
  <div class="modal fade" id="editmodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<p class="success-message"></p>
			<div class="container">
			<form action=" " class="btn-update" method="post" enctype="multipart/form-data">
			    @csrf
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="form-group">
				  <label for="name">Name:</label>
				  <input type="text" class="form-control" id="edit_name" name="edit_name">
				</div>
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input type="email" class="form-control" id="edit_email" placeholder="Enter email" name="edit_email">
				</div>
				<div class="form-group">
				  <label for="image">Image:</label>
				  <input type="hidden" name="edit_image_hidden" id="edit_image_hidden">
				 <input type="file" class="form-control" id="edit_image" name="edit_image">
				</div>
				<div class="form-group">
				  <label for="video">Video:</label>
				  <input type="hidden" name="edit_video_hidden" id="edit_video_hidden">
				  <input type="file" class="form-control" id="edit_video" placeholder="Enter video" name="edit_video">
				</div>
				<!--<div class="form-group">
				  <label for="password">Password:</label>
				  <input type="password" class="form-control" id="edit_password" placeholder="Enter password" name="edit_password">
				  
				</div>-->
				
				<button type="submit" class="btn btn-primary">Submit</button>
			  </form>
			</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
