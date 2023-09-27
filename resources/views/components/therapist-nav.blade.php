<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top" style="height: 8vh">
    <div class="container">
        <div class="navbar-brand">
            <h4 class="fw-bold text-primary-color">YANA</h4>
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>
        <div id="navmenu" class="collapse navbar-collapse">
            <ul class="navbar-nav text-dark">
                <li class="nav-item">
                    <a href="#" class="nav-link fw-bold active-nav-link mx-3">Home</a>
                </li>
            </ul>
            @auth
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center ms-auto">
                    @if(auth()->user()->profile_picture == "")
                    <img src="/yana/empty.jpeg" class="rounded-circle" style="height: 30px; width: 30px; object-fit: cover" alt="">
                    @else
                    <img src="/yana/public/storage/{{auth()->user()->profile_picture}}" class="rounded-circle" style="height: 30px; width: 30px; object-fit: cover" alt="">
                    @endif
                    <p class="nav-link ms-2 m-0">Welcome, {{auth()->user()->first_name}}</p>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/yana/therapist" class="dropdown-item">Profile</a>
                            </li>
                            <li>
                                <hr class="drodown-divider">
                            </li>
                            <li>
                                <a href="/yana/logout" class="dropdown-item">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            @endauth
            
        </div>
    </div>
</nav>