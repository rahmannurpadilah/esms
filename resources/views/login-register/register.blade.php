<!doctype html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Page</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->

    <!-- Page -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    <style>
      .authentication-wrapper{
        height: 100vh;
        overflow: hidden;
      }

      .authentication-inner{
        height: 100%;
      }

      .authentication-bg{
        height: 100vh;
        overflow-y: auto;
      }

      .auth-multisteps-bg-height{
        height: 110vh;
        overflow: hidden;
      }
      
    </style>
  </head>

  <body>
    <!-- Content -->

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success alert-dismissible">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    <div class="authentication-wrapper authentication-cover authentication-bg">
      

      <!-- Logo -->
      <a href="{{ route('dashboard') }}" class="app-brand auth-cover-brand">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
              fill="#161616" />
            <path
              opacity="0.06"
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
              fill="#161616" />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0" />
          </svg>
        </span>
        <span class="app-brand-text demo text-heading fw-bold">ESMS</span>
      </a>
      <!-- /Logo -->
      <div class="authentication-inner row">
        <!-- Left Text -->
        <div
          class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
          <img
            src="../../assets/img/illustrations/auth-register-multisteps-illustration.png"
            alt="auth-register-multisteps"
            class="img-fluid"
            width="280" 
            />

          <img
            src="../../assets/img/illustrations/auth-register-multisteps-shape-light.png"
            alt="auth-register-multisteps"
            class="platform-bg"
            data-app-light-img="illustrations/auth-register-multisteps-shape-light.png"
            data-app-dark-img="illustrations/auth-register-multisteps-shape-dark.png" />
        </div>
        <!-- /Left Text -->

        <!--  Multi Steps Registration -->
        <div class="d-flex col-lg-8 align-items-center justify-content-center authentication-bg p-5">
          <div class="w-px-700">
            <div id="multiStepsValidation" class="bs-stepper border-none shadow-none mt-5">
              <div class="bs-stepper-header border-none pt-12 px-0">
                <div class="step" data-target="#accountDetailsValidation">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-file-analytics ti-md"></i></span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Account</span>
                      <span class="bs-stepper-subtitle">Account Details</span>
                    </span>
                  </button>
                </div>
                <div class="line">
                  <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#personalInfoValidation">
                  <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle"><i class="ti ti-user ti-md"></i></span>
                    <span class="bs-stepper-label">
                      <span class="bs-stepper-title">Personal</span>
                      <span class="bs-stepper-subtitle">Enter Information</span>
                    </span>
                  </button>
                </div>
              </div>
              <div class="bs-stepper-content px-0">
                <form id="multiStepsForm" onSubmit="return false" action="{{ route('register-store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Account Details -->
                  <div id="accountDetailsValidation" class="content">
                    <div class="content-header mb-6">
                      <h4 class="mb-0">Account Information</h4>
                      <p class="mb-0">Enter Your Account Details</p>
                    </div>
                    <div class="row g-6">
                      <div class="col-md-12">
                        <label class="form-label" for="email">Email</label>
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="form-control"
                          placeholder="example@gmail.com"
                          aria-label="example" />
                      </div>
                      <div class="col-sm-6 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="multiStepsPass2" />
                          <span class="input-group-text cursor-pointer" id="multiStepsPass2"
                            ><i class="ti ti-eye-off"></i
                          ></span>
                        </div>
                      </div>
                      <div class="col-sm-6 form-password-toggle">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="multiStepsConfirmPass2" />
                          <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"
                            ><i class="ti ti-eye-off"></i
                          ></span>
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-label-secondary btn-prev" disabled>
                          <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                          <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                          <i class="ti ti-arrow-right ti-xs"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- Personal Info -->
                  <div id="personalInfoValidation" class="content">
                      <div class="content-header mb-6">
                        <h4 class="mb-0">Personal Information</h4>
                        <p class="mb-0">Enter Your Personal Information</p>
                      </div>
                      <div class="row g-6">
                        <div class="col-md-12">
                          <label class="form-label" for="fullname">Full Name</label>
                          <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            class="form-control"
                            placeholder="Enter Your Full Name" />
                        </div>
                        <div class="col-sm-12">
                          <label class="form-label" for="no_hp">No. Handphone</label>
                          <div class="input-group">
                            <span class="input-group-text">ID (+62)</span>
                            <input
                              type="text"
                              id="no_hp"
                              name="no_hp"
                              class="form-control multi-steps-mobile"
                              placeholder="8xxxxxxxxxx" 
                              maxlength="12"
                              />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="no_ktp">No. KTP</label>
                          <input
                            type="number"
                            id="no_ktp"
                            name="no_ktp"
                            class="form-control multi-steps-pincode"
                            placeholder="No. KTP"
                            maxlength="16" 
                            />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="address">Address</label>
                          <input
                            type="text"
                            id="address"
                            name="address"
                            class="form-control"
                            placeholder="Address" />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="mothers_name">biological mother's name</label>
                          <input
                            type="text"
                            id="mothers_name"
                            name="mothers_name"
                            class="form-control"
                            placeholder="Enter Your Biological Mother's Name" />
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label d-block">Gender</label>
                          <div class="form-check form-check-inline mt-4">
                              <input
                              class="form-check-input"
                              type="radio"
                              name="gender"
                              id="gender1"
                              value="0"/>
                              <label class="form-check-label" for="gender1">Man</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input
                              class="form-check-input"
                              type="radio"
                              name="gender"
                              id="gender2"
                              value="1" />
                              <label class="form-check-label" for="gender2">Woman</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <label class="form-label d-block">Marital Status</label>
                          <div class="form-check form-check-inline mt-4">
                              <input
                              class="form-check-input"
                              type="radio"
                              name="maritalstatus"
                              id="maritalstatus1"
                              value="0"/>
                              <label class="form-check-label" for="maritalstatus1">Not married yet</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input
                              class="form-check-input"
                              type="radio"
                              name="maritalstatus"
                              id="maritalstatus2"
                              value="1" />
                              <label class="form-check-label" for="maritalstatus2">Married</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="profile_picture">Profile Picture</label>
                          <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            class="form-control"
                            />
                        </div>
                      <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-label-secondary btn-prev">
                          <i class="ti ti-arrow-left ti-xs me-sm-2 me-0"></i>
                          <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
                <div class="mt-8 mb-4">
                  <a href="{{ route('show-login') }}">
                    <span class="me-2">
                      <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                    </span>
                    <span>Already have an account?</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Multi Steps Registration -->
      </div>
    </div>

    <script>
      // Check selected custom option
      window.Helpers.initCustomOptionCheck();
    </script>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/pages-auth-multisteps.js"></script>
  </body>
</html>
