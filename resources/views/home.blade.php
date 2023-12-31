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
    <x-client-nav :active="$active"></x-client-nav>
    <x-toast></x-toast>
    <div class="vh-100 container h-100 d-flex align-items-center justify-content-between">

        <div class="col text-center text-lg-start">
            <h1 class="fw-bold text-primary-color">YOU ARE NOT ALONE</h1>
            @auth
            @else
            <a href="/signup"><button class="primary-btn mt-4 px-5 py-2 fw-bold">Sign Up Now!</button></a>
            @endauth
        </div>
        <div class="d-lg-block d-none col">
            <img src="/home background.jpg" class="img-fluid cover-img" alt="">
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
                
                <a href="/therapist-list"><button class="primary-btn px-5 py-2 mt-3">Get Matched to a Psychologist</button></a>
            </div>
            <div class="col">
                <img id="home-image-1" src="/psychologist match 1.png" alt="" class="img-fluid">
                <img id="home-image-2" src="/psychologist match 2.png" alt="" class="img-fluid">
            </div>
        </div>



        <div class="py-5">
            <h3 class="fw-bold text-center">HOW IT WORKS?</h3>
            <div class="row row-cols-1 row-cols-xl-5 g-3 mt-5 text-center">
                <div class="col">
                    <div class="card shadow feature-card text-center" style="height: 550px;">
                        <div class="card-body">
                            <img src="/choose.png" class="img-fluid" alt="">
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
                            <img src="/connect.png" class="img-fluid" alt="">
                            <p class="fs-4 fw-bold mt-5">Connect with a Psychologist</p>
                            <p class="lead">Free clients are matched with a psychologist, while premium clients can freely choose from a list of recommended psychologists with YANA.</p>
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
                            <img src="/communicate.png" class="img-fluid" alt="">
                            <p class="fs-4 fw-bold mt-5">Communicate Your Way with YANA</p>
                            <p class="lead">Connect with your psychologist through text, chat, phone, or video, based on your preferred mode of communication.</p>
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
                            <img src="/empty.jpeg" class="img-fluid shadow rounded-4" alt="">
                            @else
                            <img src="/public/storage/{{$feedback['image']}}" class="img-fluid img-cover shadow rounded-4" style="height: 70%; width: 100%" alt="">
                            @endif
                        </div>
                        <div class="col p-lg-5 d-flex align-items-center">
                            <div>
                                <em class="fs-4">{{$feedback['feedback']}}</em>
                                <h3 class="fw-bold mt-lg-5 mt-3">{{$feedback['name']}}</h3>
                            </div>
                            
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
                            <form action="/write-feedback" method="POST">
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


    <x-footer></x-footer>
</body>
    
</html>