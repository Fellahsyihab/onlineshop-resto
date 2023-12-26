        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                  </div>
                  <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Fellah Syihab</span>
                    <span class="text-secondary text-small">Full Stack Web Developer</span>
                  </div>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('forms') }}">
                    <span class="menu-title">Forms</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <span class="menu-title">Product</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product-cards.index') }}">
                    <span class="menu-title">Product Cards</span>
                    <i class="mdi mdi-card menu-icon"></i>
                </a>
            </li>

            @auth
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                        <span class="menu-title">Logout</span>
                        <i class="mdi mdi-logout menu-icon"></i>
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <span class="menu-title">Login</span>
                    <i class="mdi mdi-login menu-icon"></i>
                </a>
            </li>
        @endauth

          </nav>
          <!-- partial -->
