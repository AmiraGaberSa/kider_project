<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="{{ route('index')}} " class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Teachers</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">                            
                            <a href="{{ route('addTeacher')}} " class="dropdown-item {{ request()->is('addTeacher') ? 'active': ''}}">New</a>
                            <a href="{{ route('teachers')}} " class="dropdown-item {{ request()->is('teachers') ? 'active': ''}}">All Teachers</a>
                            <a href="{{ route('teachersTrashed')}} " class="dropdown-item {{ request()->is('teachersTrashed') ? 'active': ''}}">Trashed</a>                            
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Classes</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">                            
                            <a href="{{ route('addSubject')}} " class="dropdown-item {{ request()->is('addSubject') ? 'active': ''}}">New </a>
                            <a href="{{ route('subjects')}} " class="dropdown-item {{ request()->is('subjects') ? 'active': ''}}">All Classes</a>                            
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Testimonial</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">                            
                            <a href="{{ route('addTestimonial')}} " class="dropdown-item {{ request()->is('addTestimonial') ? 'active': ''}}">Add new</a>
                            <a href="{{ route('testimonials')}} " class="dropdown-item {{ request()->is('testimonials') ? 'active': ''}}">All</a>
                            <a href="{{ route('trashedTestimonial')}} " class="dropdown-item {{ request()->is('trashedTestimonial') ? 'active': ''}}">Trashed</a>                            
                        </div>
                    </div>                

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">                            
                            <a href="{{ route('contacts')}} " class="dropdown-item {{ request()->is('contacts') ? 'active': ''}}">Contact Us</a>
                            <a href="{{ route('appointments')}} " class="dropdown-item {{ request()->is('appointments') ? 'active': ''}}">Appointments</a>
                            <a href="{{ route('unreadMessages')}} " class="dropdown-item">Unread Messages</a> 
                                                  
                        </div>
                    </div>

                   

  
                
        </nav>
        <!-- Navbar End -->
