<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <h4 class="fw-bold text-primary-color">YANA</h4>
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>
        <div id="navmenu" class="collapse navbar-collapse">
            <ul class="navbar-nav text-dark">
                <li class="nav-item">
                    <a href="" class="nav-link fw-bold active-nav-link mx-3">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link fw-bold">Services</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link fw-bold">About</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link fw-bold">Contact</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="#" class="nav-link fw-bold">Careers</a>
                </li>
            </ul>
            @auth
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center ms-auto">
                    @if(auth()->user()->profile_picture == "")
                    <img src="/empty.jpeg" class="rounded-circle" style="height: 30px; width: 30px; object-fit: cover" alt="">
                    @else
                    <img src="/public/storage/{{auth()->user()->profile_picture}}" class="rounded-circle" style="height: 30px; width: 30px; object-fit: cover" alt="">
                    @endif
                    <p class="nav-link ms-2 m-0">Welcome, {{auth()->user()->first_name}}</p>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profile" class="dropdown-item">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="/logout" class="dropdown-item">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            @else
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login" class="nav-link"><button class="primary-btn px-3 py-2">Sign In</button></a>
                </li>
                <li class="nav-item">
                    <a href="/signup" class="nav-link"><button class="primary-outline-btn px-3 py-2">Sign Up</button></a>
                </li>
            </ul>
            @endauth
            
        </div>
    </div>
</nav>