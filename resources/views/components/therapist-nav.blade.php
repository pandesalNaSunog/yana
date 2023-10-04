<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <h4 class="fw-bold text-primary-color">YANA</h4>
        </div>
        @auth
        <button data-bs-toggle="modal" data-bs-target="#conversation-modal" class="btn btn-link d-block d-lg-none mx-auto p-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
</svg></button>
        @endauth
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
                                <a href="/therapist" class="dropdown-item">Profile</a>
                            </li>
                            <li>
                                <hr class="drodown-divider">
                            </li>
                            <li>
                                <a href="/logout" class="dropdown-item">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            @endauth
            
        </div>
    </div>
</nav>