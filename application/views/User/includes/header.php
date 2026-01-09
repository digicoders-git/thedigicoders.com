<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">


<style>
  body {
    font-family: "Poppins", sans-serif;
  }
</style>

<header class="top-header">
  <nav class="navbar navbar-expand gap-3">
    <div class="mobile-toggle-icon fs-3">
      <i class="bi bi-list"></i>
    </div>
    <div class="top-navbar-right ms-auto">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item search-toggle-icon">
          <a class="nav-link" href="#">
            <div class="">
              <i class="bi bi-search"></i>
            </div>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-user-setting">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
            <div class="user-setting d-flex align-items-center">
              <img src="<?= base_url('public/assets/images/favicon.png')?>" class="user-img" alt="">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <img src="<?= base_url('public/assets/images/favicon.png')?>" alt="" class="rounded-circle" width="54" height="54">
                  <div class="ms-3">
                    <h6 class="mb-0 dropdown-user-name">Student panel</h6>
                    <small class="mb-0 dropdown-user-designation text-secondary">Student Name</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item logout_btn" href="javascript:void(0)">
                <div class="d-flex align-items-center">
                  <div class=""><i class="bi bi-lock-fill"></i></div>
                  <div class="ms-3"><span>Logout</span></div>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>