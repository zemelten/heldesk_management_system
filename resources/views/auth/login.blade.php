<!DOCTYPE html>
<html>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg- p-3 rounded-10" style="background-color: #0067ba;"> 
                    <div class="text-center">
                        <img src="/images/JU.jpg" alt="" style="width: 100px; ">
                        <div>
                          <a href="#" class="h1"style="color: white" ><b>HELP</b>DESK</a>
                          </div>
                    </div>
                </div>

    <!-- Below is custom css for login form -->
    <link rel="stylesheet" href="{{ asset('desk_css/custom-login.css') }}" />
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <!-- Change below img tag to use the image from the project folder -->
                            <img src="{{ asset('desk_image/logo.png') }}" alt="JU Logo" width="100"
                                height="120" />
                        </div>
                        <h5 class="text-center mb-4">JU HELPDESK</h5>
                        <form method="POST" action="{{ route('login') }}" class="login-form" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Email"
                                    name="email" required="" />
                                   @error('email')
                                    <span class="" role="">
                                        <p class="text-danger">{{ $message }}</p>
                                       
                                    </span>
                                @enderror
                            </div>
                             
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password"
                                    name="password" required="" />
                                @error('password')
                                    <span class="" role="">
                                        <p class="text-danger">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    Login
                                </button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50"></div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
