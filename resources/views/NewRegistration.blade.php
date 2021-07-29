<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/coustomAuth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" {{asset('/coustomAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href=" {{asset('/coustomAuth/css/multipleselect.css')}}" rel="stylesheet">
    <link href=" {{asset('/coustomAuth/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{route('registration.post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                                  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="fname" id="exampleFirstName"
                                            placeholder="First Name">
                                            <span class="text-danger"> {{ $errors->first('fname')}} </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lname" id="exampleLastName"
                                            placeholder="Last Name">
                                            <span class="text-danger"> {{ $errors->first('lname')}} </span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                        placeholder="Email Address">
                                        <span class="text-danger"> {{ $errors->first('email')}} </span>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                            <span class="text-danger"> {{ $errors->first('password')}} </span>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="password_confirmation" placeholder="Repeat Password">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user" name="dob">
                                        <span class="text-danger"> {{ $errors->first('dob')}} </span>

                                    </div>
                                    <div class="col-sm-6" style="margin-top: 12px;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio1" name="gander" checked value="male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineRadio2" name="gander" value="female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">                                        
                                      <p>
                                        <label for="amount">Annual Income:</label>
                                        <input type="text" id="amount" name="a_income" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                      </p>
                                      <div id="slider-range"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class ="occupation" name="occupation[]" multiple="multiple" >
                                            <option value ="Private Job" >Private Job</option>
                                            <option value ="Government Job" >Government Job</option>
                                            <option value ="Business" >Business</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class ="family" name="family[] " multiple="multiple" >
                                            <option value ="Joint Family" >Joint Family</option>
                                            <option value ="Nuclear Family" >Nuclear Family</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="manglik" class="form-control">
                                            <option value="">--Select Manglik--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="Both">Both</option>
                                        </select>
                                        <span class="text-danger"> {{ $errors->first('manglik')}} </span>

                                    </div>
                                    
                                </div>
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                                    
                               
                                <hr>
                               
                            </form>
                            
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="{{url('/')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('./coustomAuth/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('./coustomAuth/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('./coustomAuth/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('./coustomAuth/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('./coustomAuth/css/multipleselect.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>

<script>
// Requires jQuery

// Initialize slider:
$(document).ready(function(){
  $('.occupation').multiselect({		
        nonSelectedText: 'Select Occupation'				
    });
    $('.family').multiselect({		
        nonSelectedText: 'Select Family Type'				
    });



})
$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 100000,
      max: 1000000,
      values: [ 100000, 300000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "INR " + ui.values[ 0 ] + " - INR " + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "INR " + $( "#slider-range" ).slider( "values", 0 ) +
      " -  INR " + $( "#slider-range" ).slider( "values", 1 ) );
  } );     
  

  
</script>