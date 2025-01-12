
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
    <a class="navbar-brand" href="{{ route('about.index') }}">
        <span class="d-block d-lg-none">Admin</span>
        <span class="d-none d-lg-block">
            <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('img/profile.jpeg') }}" alt="Admin Profile Picture" />
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbarResponsive" aria-controls="adminNavbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNavbarResponsive">
        <ul class="navbar-nav">
            <!-- Manage About Section -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about.index') }}">About</a>
            </li>
            
            <!-- Manage Certifications -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('certification.index') }}">Certifications</a>
            </li>

            <!-- Manage Experiences -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('experience.index') }}">Experiences</a>
            </li>

            <li class="nav-item">
                <div class="nav-link">
                    <form action="{{route('logout')}}" method="POST" style="display: hidden;" class="justify-content-center text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="display: hidden;">
                        Logout
                    </button>
                    </form>
                </div>
            </li>

        </ul>
    </div>
</nav>
