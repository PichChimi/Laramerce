<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="{{ asset('dashboard/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Dashtreme Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ route('backends.dashboard') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
   @can('categoryList')
        <li>
          <a href="{{ route('backends.categories.index') }}">
            <i class="zmdi zmdi-invert-colors"></i> <span>Categories</span>
          </a>
        </li>
    @endcan

      <li>
        <a href="{{ route('backends.products.index') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Products</span>
        </a>
      </li>

      
      <li>
        <a href="{{ route('users.index') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Users</span>
        </a>
      </li>

      @can('menu_contact')
      <li>
        <a href="{{ route('backends.contact.index') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Contact Us</span>
        </a>
      </li>
    @endcan

       @can('home_pages')
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="zmdi zmdi-chevron-down"></i> <span>Home Pages</span>
          </a>
          <ul class="dropdown-menu sidebar-new do-nicescrol">
            <!-- Add additional dropdown items here -->
            <li>
              <a class="dropdown-item" href="{{ route('backends.advertisement.index') }}">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>Advertisement</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="{{ route('backends.newinformation.index') }}">
                <i class="zmdi zmdi-format-list-bulleted"></i> <span>New Information</span>
              </a>
            </li>
           
          
        </li>
      </ul>
    @endcan

       @can('about')
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="zmdi zmdi-chevron-down"></i> <span>About Pages</span>
            </a>
            <ul class="dropdown-menu sidebar-new do-nicescrol">
              <!-- Add additional dropdown items here -->
              <li>
                <a class="dropdown-item" href="{{ route('backends.about.index') }}">
                  <i class="zmdi zmdi-format-list-bulleted"></i> <span>Our Team</span>
                </a>
              </li>          
          </li>
        </ul>
       @endcan
        
    
     
      

     

     
   
   </div>
   <!--End sidebar-wrapper-->