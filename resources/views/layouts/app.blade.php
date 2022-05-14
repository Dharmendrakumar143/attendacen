<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	 
	<style>	
		.form-control {
			width: 48%;
		}
		.alert.alert-danger {
			width: 48%;
		}
	</style>	
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
							<li class="nav-item dropdown">
							  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								{{ Auth::user()->name }}
							  </a>
							  <div class="dropdown-menu">
								 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
							  </div>
							</li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
	
	<script>
		
		$(function() {
			jQuery.validator.addMethod("exactlength", function(value, element, param) {
			 return this.optional(element) || value.length == param;
			}, $.validator.format("Please enter exactly {0} characters."));
				
				$("#addStudent").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
					rules:{
						name:{
							required:true,
						},
						email:{
							required:true,
						},
						phone:{
							required:true,
							digits:true,
							exactlength:10
						},
						address:{
							required:true,
						},
						image:{
							required:true,
						}
					},
					messages:{
						name:{
							required:"Please enter the name",
						},
						phone:{
							required:"Please phone number",
						},
						phone:{
							required:"Please enter your 10 digits mobile number",
							digits:"Please enter only number",
							exactlength:"Please enter only 10 digits mobile number"
						},
						address:{
							required:"Please enter your full address",
						},
						image:{
							required:"Please select you pic",
						}
					},
				});
				
			   $("#addStudent").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				var url = '{{route('insert')}}';
				$.ajax({
				   url:url,
				   method:'POST',	
				   data:data,
				   contentType: false,
				   processData: false,
				   success:function(data){
					  var student = '<td>' + data.name + '</td>';
					  student += '<td>' + data.email + '</td>';
					  student += '<td>' + data.phone + '</td>';
					  student += '<td>' + data.address + '</td>';
					  student += '<td><img src=/Adminpanel/public/images/'+ data.image+' width="100" height="100"></td>';
					  student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a></td>';
					  student += '<td><a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
					  student += '</tr>';            
					  $('#studentTable tbody').prepend(student);
					  $('#addStudent')[0].reset();
					  $('#myModal').modal('hide');
				   }
				});
			});
		});
		
		
	$('body').on('click', '.btnEdit', function () {
		    var student_id = $(this).attr('data-id');
			$.get('student/'+student_id, function (data) {
			   $('#editmodel').modal('show');
				$("#edit_id").val(data.id);
				$("#edit_name").val(data.name);
				$("#edit_email").val(data.email);
				$("#edit_phone").val(data.phone);
				$("#edit_address").val(data.address);
				$("#edit_image_hidden").val(data.image);
			}) 
	   });
		
		
		$(function() {
			
			$("#updateStudent").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
					rules:{
						edit_name:{
							required:true,
						},
						edit_email:{
							required:true,
						},
						edit_phone:{
							required:true,
							digits:true,
							exactlength:10
						},
						edit_address:{
							required:true,
						},
					},
					messages:{
						edit_name:{
							required:"Please enter the name",
						},
						edit_email:{
							required:"Please enter you email",
						},
						edit_phone:{
							required:"Please enter your 10 digits mobile number",
							digits:"Please enter only number",
							exactlength:"Please enter only 10 digits mobile number"
						},
						edit_address:{
							required:"Please enter your full address",
						},
					},
				});
			
			
			$("#updateStudent").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				var url = '{{route('updatecrud')}}';
				$.ajax({
				   url:url,
				   method:'POST',	
				   data:data,
				   contentType: false,
				   processData: false,
				   success:function(data){
						var student = '<td>' + data.name + '</td>';
						student += '<td>' + data.email + '</td>';
						student += '<td>' + data.phone + '</td>';
						student += '<td>' + data.address + '</td>';
						student += '<td><img src=/Adminpanel/public/images/'+ data.image+' width="100" height="100"></td>';
						student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a></td>';
						student += '<td><a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
						student += '</tr>';            
						$('#studentTable tbody').prepend(student);
						$('#updateStudent')[0].reset();
						$('#editmodel').modal('hide');
				    }
				});
			});
		});
		
		
		//delete student
	$('body').on('click', '.btnDelete', function () {
      var student_id = $(this).attr('data-id');
	  $.get('destroy/'+student_id, function (data) {
          //console.log(data);
		  $('#studentTable tbody #'+ student_id).remove();
      })
	  //alert(student_id);
	  
	  /* var student_id = $(this).attr('data-id');
      $.get('student/' + student_id +'/delete', function (data) {
          $('#studentTable tbody #'+ student_id).remove();
      }) */
   });	
		
		
		
		
		$(".text-right").click(function(){
			var id = $(this).val();
			$.ajax({
				type:"GET",
				url:"/Adminpanel/public/editcrud/"+id,
				success: function(response){
					$("#edit_id").val(response.editcrud.id);
					$("#edit_name").val(response.editcrud.name);
					$("#edit_email").val(response.editcrud.email);
					$("#edit_image_hidden").val(response.editcrud.images);
					//$("#clients").val(response.editcrud.client);
					$("#edit_video_hidden").val(response.editcrud.videos);
					//$("#edit_password").val(response.editcrud.password);
					/*$("#descriptions").val(response.editcrud.description); 
					$("#files").val(response.editcrud.file);  */
				}
			}); 
		});
		
		
		
		$(function() {
			//hang on event of form with id=myform
			$(".btn-update").submit(function(e) {
				//debugger
				e.preventDefault();
				//debugger
				//var data = $(this).serialize();
				var data = new FormData(this);
				//debugger
				//console.log(data);
				var url = '{{route('updatecrud')}}';
				$.ajax({
				   url:url,
				   method:'POST',	
				   data:data,
				   contentType: false,
					processData: false,
				   success:function(response){
					   console.log(response);
					   if(response.status==200){

						$('.success-message').text(response.message);
						setTimeout(function () {
								 location.reload();	
							 }, 3000);
					  }
					   //console.log(response);
					  
				   }
				});

			});
		});
		
		
	</script>
</body>
</html>
