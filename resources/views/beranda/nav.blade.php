<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="{{ asset('landing-page') }}/images/icon-semut-gajah.png" alt="">
        </div>

        <span class="logo_name">SemutGajah</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="/beranda">
                <i class="uil uil-estate"></i>
                <span class="link-name">Dashboard</span>
            </a></li>
            <li><a href="/beranda/briefing">
                <i class="uil uil-files-landscapes"></i>
                {{-- <i class="uil uil-briefcase-alt"></i> --}}
                <span class="link-name">Briefing</span>
            </a></li>
            <li><a href="/beranda/meeting">
                <i class="uil uil-meeting-board"></i>
                <span class="link-name">Meeting</span>
            </a></li>
            <li><a href="/beranda/visit">
                <i class="uil uil-shopping-cart"></i>
                <span class="link-name">Market Visit</span>
            </a></li>
            
        </ul>
        
        <ul class="logout-mode">
            <li><a href="{{ url('auth/logout') }}">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                <span class="link-name">Dark Mode</span>
            </a>

            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
        </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>
        
        <img src="images/profile.jpg" alt="">
    </div>
