<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <style>
        
    </style>
    <title>YANA</title>

    
</head>
<body>
    <x-client-nav></x-client-nav>
    <x-toast></x-toast>
    <div class="vh-100 container h-100 d-flex align-items-center justify-content-between">

        <div class="col text-center text-lg-start">
            <h1 class="fw-bold text-primary-color">YOU ARE NOT ALONE</h1>
            @auth
            @else
            <a href="/yana/signup"><button class="primary-btn mt-4 px-5 py-2 fw-bold">Sign Up Now!</button></a>
            @endauth
        </div>
        <div class="d-lg-block d-none col">
            <img src="/yana/home background.jpg" class="img-fluid cover-img" alt="">
        </div>


       

    </div>

    <div class="container py-5 text-center text-lg-start">
        <h3 class="fw-bold text-center">OUR FEATURES</h3>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4 g-3 mt-5">
            <div class="col">
                <div class="card shadow feature-card">
                    <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-primary bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    <p class="fs-4 fw-bold mt-5">YANA Psychologist Specialist</p>
                    <p class="lead">Offers a unique opportunity for 
                            freelance psychologists and volunteer 
                            psychologist to connect with patients 
                            and offer their services. </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow feature-card">
                    <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-primary bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg>
                    <p class="fs-4 fw-bold mt-5">Free and Subscription-Based 
                        Options</p>
                    <p class="lead">Offers free and subscription options for 
connecting with volunteer or licensed
 freelance psychologists.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow feature-card">
                    <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-primary bi bi-clock-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
</svg>
                    <p class="fs-4 fw-bold mt-5">24/7 Access and Support</p>
                    <p class="lead">YANA is available 24/7, allowing 
patients to access the platform and 
connect with psychologists at 
their convenience. </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow feature-card">
                    <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-primary bi bi-chat-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
</svg>
                    <p class="fs-4 fw-bold mt-5">Connect Anywhere, Anytime</p>
                    <p class="lead">Effortless Messaging for Mental Health
Support with YANA: Connect with
Licensed Freelance or Volunteer 
Psychologists, Anywhere, Anytime!</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Find Psychologist Section -->

        <div class="row row-cols-1 row-cols-lg-2 g-3 py-5">
            <div class="col">
                <p class="fw-bold fs-4 text-primary-color">Find YANA Psychologist</p>
                <h1 class="fw-bold">Customized Matching with 
Licensed Psychologists</h1>
                <p class="lead mt-4">YANA utilizes a sophisticated matching algorithm that takes into account patients' 
needs,preferences, and goals to connect them with the most suitable licensed 
freelance psychologists and volunteer psychologist.Patients can choose from a diverse 
pool of experienced psychologists with various specialties and backgrounds, 
ensuring personalized and effective care.</p>
                <div class="text-start">
                    <div>
                        <span class="me-4"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-primary bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg></span><span>100% free app designed to help you find the right Psychologist doctor for you. </span>
                    </div>
                    <div class="mt-2">
                        <span class="me-4"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-primary bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg></span><span>Available Licensed Freelance Psychologist and Volunteer Psychologist.</span>
                    </div>
                    <div class="mt-2">
                        <span class="me-4"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-primary bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg></span><span>Connect with them, Anywhere and Anytime</span>
                    </div>
                </div>
                
                <a href="/yana/therapist-list"><button class="primary-btn px-5 py-2 mt-3">Get Matched to a Psychologist</button></a>
            </div>
            <div class="col">
                <img id="home-image-1" src="/yana/psychologist match 1.png" alt="" class="img-fluid">
                <img id="home-image-2" src="/yana/psychologist match 2.png" alt="" class="img-fluid">
            </div>
        </div>



        <div class="py-5">
            <h3 class="fw-bold text-center">HOW IT WORKS?</h3>
            <div class="row row-cols-1 row-cols-xl-5 g-3 mt-5 text-center">
                <div class="col">
                    <div class="card shadow feature-card text-center" style="height: 550px;">
                        <div class="card-body">
                            <img src="/yana/choose.png" class="img-fluid" alt="">
                            <p class="fs-4 fw-bold mt-5">Choose Your Option</p>
                            <p class="lead">Select between YANA's free or 
                                subscription-based options to access our 
                                platform and connect with licensed
                                psychologists.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center d-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-primary-color w-75 h-100 bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg>
                </div>
                <div class="col">
                    <div class="card shadow feature-card text-center" style="height: 550px;">
                        <div class="card-body">
                            <img src="/yana/choose.png" class="img-fluid" alt="">
                            <p class="fs-4 fw-bold mt-5">Choose Your Option</p>
                            <p class="lead">Select between YANA's free or 
                                subscription-based options to access our 
                                platform and connect with licensed
                                psychologists.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center d-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-primary-color w-75 h-100 bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg>
                </div>
                <div class="col">
                    <div class="card shadow feature-card text-center" style="height: 550px;">
                        <div class="card-body">
                            <img src="/yana/choose.png" class="img-fluid" alt="">
                            <p class="fs-4 fw-bold mt-5">Choose Your Option</p>
                            <p class="lead">Select between YANA's free or 
                                subscription-based options to access our 
                                platform and connect with licensed
                                psychologists.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-5">
            <h3 class="fw-bold text-center">Hear What Our Users Have to Say About YANA!</h3>
        </div>
        
    </div>
    <div class="py-5 light-blue-background">
        <div class="container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($feedbacks as $key => $feedback)
                <div class="carousel-item <?php if($key == 0){ echo 'active';}?>">
                    <div class="row row-cols-1 row-cols-lg-2 g-lg-5 g-2">
                        <div class="col d-flex align-items-center">
                            @if($feedback['image'] == "")
                            <img src="/yana/empty.jpeg" class="img-fluid shadow rounded-4" alt="">
                            @else
                            <img src="/yana/public/storage/{{$feedback['image']}}" class="img-fluid img-cover shadow rounded-4" style="height: 70%; width: 100%" alt="">
                            @endif
                        </div>
                        <div class="col p-lg-5">
                            <em class="fs-4">{{$feedback['feedback']}}</em>
                            <h3 class="fw-bold mt-lg-5 mt-3">{{$feedback['name']}}</h3>
                            <!-- <p class="lead fs-5">Student</p> -->
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
            
        </div>
    </div>
    @auth
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <div class="col">
                    <h4 class="fw-bold text-primary-color">Provide feedback to enhance our services</h4>
                </div>
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="/yana/write-feedback" method="POST">
                                @csrf
                                <input required type="text" name="feedback" placeholder="Write your feedback here..." class="form-control">
                                @error('feedback')
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                                <button class="primary-btn w-100 py-2 mt-3">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <div class="py-5 bg-primary">
        <div class="container">
            <div class="text-center text-light">
                <h2 class="fw-bold">Join YANA today and take the first step towards better mental health! </h2>
                <p class="lead">You are not alone on this journey, and we are here to support you every step of the way.</p>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row row-cols-1 row-cols-lg-6 g5">
            <div class="col">
                <h4 class="fw-bold text-primary-color">YANA</h4>
                <p class="mt-3">Provides a wide range of resources including self-assessment tools, 
educational materials,and coping strategies for various 
mental health conditions.Our platform is designed to 
empower patients with knowledge and tools to better 
understand and manage their mental health.</p>
            </div>
            <div class="col d-none d-lg-block">

            </div>
            <div class="col">
                <h4 class="fw-bold mb-4">Overview</h4>
                <p>Psychologist Job</p>
                <p>Online Therapy</p>
                <p>FAQ</p>
            </div>
            <div class="col">
                <h4 class="fw-bold mb-4">Company</h4>
                <p>Home</p>
                <p>Services</p>
                <p>Contact</p>
            </div>
            <div class="col">
                <h4 class="fw-bold mb-4">Explore</h4>
                <p>Terms & Conditions</p>
                <p>Privacy Policies</p>
                <p>Cookies</p>
            </div>
            <div class="col">
                <h4 class="fw-bold mb-4">Social Media</h4>
                <div class="d-flex justify-content-evenly">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg>
                </div>
            </div>
        </div>
    </div>
</body>
    
</html>