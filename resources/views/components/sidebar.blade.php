<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center w-100 d-block">
  <span class="font-weight-bold text-white fs-4">Galeriku</span>
</a>

    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="/">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/studio">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-easel2-fill"></i>
            </div>
            <span class="nav-link-text ms-1">Studio</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        @auth
        <li class="nav-item">
          <form action="/logout" method="post">
              @csrf
            <button type="submit" class="nav-link text-white" style="background: none; border: none;">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right"></i>
              </div>
              <span class="nav-link-text ms-1">Log Out</span>
            </button>
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link text-white " href="/sign-in">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="/sign-up">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">assignment</i>
              </div>
              <span class="nav-link-text ms-1">Sign Up</span>
            </a>
        </li>
        @endauth

        </ul>
      </div>
    </aside>