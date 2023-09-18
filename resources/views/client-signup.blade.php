<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Sign Up</title>
</head>
<body>
    <div class="row row-cols-1 row-cols-lg-2 vh-100">
        <div class="col col-lg-5 d-flex align-items-center" style="background-image: url('/signup.png'); background-size: cover">
            <div class="text-light text-center py-5">
            <p class="m-0 fs-5">"What lies behind you and what lies in front of you, pales in comparison to what lies inside of you."</p>
            <p class="mt-3"><small>Ralph Waldo Emerson</small></p>
            </div>
        </div>
        <div class="col col-lg-7 p-5">
            <h3 class="text-primary-color fw-bold mb-5">YANA</h3>
            <br>
            <br>
            <br>
            <h5>Create Account</h5>
            <form action="/signup" method="POST">
                @csrf
                <div class="mt-5 card shadow">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-lg-2 g-3">
                            <div class="col">
                                <label class="form-label">First Name</label>
                                <input value="{{old('first_name')}}" name="first_name" type="text" class="form-control">
                                @error('first_name')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Last Name</label>
                                <input value="{{old('last_name')}}" name="last_name" type="text" class="form-control">
                                @error('last_name')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label>
                                <input value="{{old('email')}}" name="email" type="text" class="form-control">
                                @error('email')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Contact Number</label>
                                <input value="{{old('contact_number')}}" name="contact_number" type="text" class="form-control">
                                @error('contact_number')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Date of Birth</label>
                                <input value="{{old('birth_date')}}" name="birth_date" type="date" class="form-control">
                                @error('birth_date')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row row-cols-1 row-cols-lg-2 g-3">
                            <div class="col">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control">
                                @error('password')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                                @error('password_confirmation')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                            </div>
                        </div>

                        
                    </div>
                    
                </div>

                <br>
                <br>
                <br>
                <div class="text-center">
                    <button class="primary-btn px-5 py-2">Create Account</button>
                    
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="/signup-therapist"><button class="primary-outline-btn px-5 py-2">I'm a Therapist</button></a>
            </div>
           
            
            <div class="text-center mt-5">
                
                <p><small>Already have an Account? <a href="/login">Sign In</a></small></p>
            </div>
            
        </div>
    </div>
    
</body>
</html>