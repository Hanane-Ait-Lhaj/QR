<?php $isAdmin = $this->session->admin; ?>

<!doctype html>
<?php if ($this->session->theme == 'dark') { ?>
  <html id="content" lang="ar" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-bs-theme="dark">

  </html>
<?php } else { ?>

  <html id="content" lang="ar" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

  </html>
<?php } ?>

<head>
  
  <meta charset="utf-8" />
  <title>ادارة كلية الشريعة بفاس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>plugins/img/logo1.png">
  <!--datatable css-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
  <!--datatable responsive css-->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

  <!-- jsvectormap css -->
  <link href="<?= base_url() ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

  <!-- Layout config Js -->
  <script src="<?= base_url() ?>assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?= base_url() ?>assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url() ?>assets/css/app-rtl.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="<?= base_url() ?>assets/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />



  <!-- css datatable for search -->
  <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <style>
.nav-link span{
  color : var(--vz-body-bg);
}

    #myTable_wrapper input[type="search"] {
      background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
      background-repeat: no-repeat;
      background-color: var(--vz-info-bg-subtle);
      background-position: 0px 1px !important;
      padding-left: 20px;
      border: none;
    }

    #myTable_wrapper input:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    div.dt-container .dt-search {
      text-align: center;
    }

    body {
      /* background-image: url(<?= base_url() ?>plugins/img/bg.png); */

      <?php if ($this->session->userdata('theme') == 'light') { ?>
        background-color: var(--vz-secondary-bg);
      <?php } ?>
      /* position: relative;
    z-index: 333; */
    }

    /* CSS for the loading indicator */
    #loading-indicator {
      display: block;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    /* HTML: <div class="loader"></div> */
    .loader {
      width: 48px;
      height: 48px;
      border: 5px solid;
      border-color: #FF3D00 transparent;
      border-radius: 50%;
      display: inline-block;
      box-sizing: border-box;
      animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body dir="rtl">


  <div id="loading-indicator">
    <div class="row">
      <div class="col-md-12 center-div">
        <div class="content">
          <span class="loader"></span>

        </div>
      </div>
    </div>
  </div>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="layout-width">
        <div class="navbar-header">
          <div class="d-flex">

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
              id="topnav-hamburger-icon">
              <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </button>

          </div>

          <div class="d-flex align-items-center">

            <div class="ms-1 header-item d-none d-sm-flex">
              <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
              </button>
            </div>

            <div class="ms-1 header-item d-none d-sm-flex">
              <button type="button" id="theme"
                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                <i class='bx bx-moon fs-22'></i>
              </button>
            </div>

            <div class="dropdown ms-sm-3 header-item topbar-user">
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                  <img class="rounded-circle header-profile-user"
                    src="<?= base_url() ?>assets/images/users/user-dummy-img.jpg" alt="Header Avatar">
                  <span class="text-start ms-xl-2">
                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><?= $this->session->username ?></span>
                  </span>
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->

                <a class="dropdown-item" href="<?= base_url() ?>admin/adminProfile"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">الحساب</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>admin/logout"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">تسجيل الخروج</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <!-- <div class="app-menu navbar-menu bg-info-subtle bg-gradient"> -->
    <div class="app-menu navbar-menu" style="background-image: linear-gradient(to bottom, #8ca6c3, #ff8282);">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <!-- <div class="navbar-brand-box bg-info-subtle bg-gradient"> -->

        <a href="<?= base_url() ?>admin" class="logo logo-light">
          <span class="logo-sm">
            <img src="<?= base_url() ?>plugins/img/logo1.png" alt="" height="23">
          </span>
          <span class="logo-lg">
            <img src="<?= base_url() ?>plugins/img/logo.png" alt="" height="50">
          </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
          id="vertical-hover">
          <i class="ri-record-circle-line"></i>
        </button>
      </div>

      <div id="scrollbar">
        <div class="container-fluid">

          <div id="two-column-menu"> </div>
          <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
              <a class="nav-link menu-link" href="<?= base_url() ?>admin">
                <!-- <i class="ri-dashboard-2-line"></i> <span>الصفحة الرئيسية</span> -->
                <i class=" ri-home-2-line"></i> <span>الصفحة الرئيسية</span>

              </a>

            </li> <!-- end Dashboard Menu -->
            <?php if ($isAdmin) { ?>
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?= base_url() ?>admin/tableUser" aria-expanded="false">
                  <i class="ri-apps-2-line"></i> <span>لائحة المستعملين</span>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link menu-link" href="<?= base_url() ?>admin/tableSeminar" role="button"
                aria-expanded="false">
                <i class="ri-layout-3-line"></i> <span>الندوات</span>
              </a>

            </li> <!-- end Dashboard Menu -->
            <li class="nav-item">
              <a class="nav-link menu-link" href="<?= base_url() ?>admin/tableInscrit" role="button"
                aria-expanded="false">
                <i class="ri-team-fill"></i> <span>المتسجلين</span>
              </a>

            </li> <!-- end Dashboard Menu -->

          </ul>
        </div>
        <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content" style="display:none;">


      <div class="page-content">