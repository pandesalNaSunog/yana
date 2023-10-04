
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="navbar-brand">
            <h4 class="fw-bold">YANA</h4>
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>
        <div id="navmenu" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto fw-bold">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link <?php if($active == 'dashboard'){ echo 'active'; }?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/patients" class="nav-link <?php if($active == 'patients'){ echo 'active'; }?>">Patients</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/therapists" class="nav-link <?php if($active == 'therapists'){ echo 'active'; }?>">Therapists</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/library" class="nav-link <?php if($active == 'library'){ echo 'active'; }?>">Library</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/feedbacks" class="nav-link <?php if($active == 'feedbacks'){ echo 'active'; }?>">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/admin/change-password" class="dropdown-item">Change Password</a>
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
        </div>
    </div>
</nav>