<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108811011-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108811011-1');
  </script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/DataTables/datatables.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/fancybox-master/jquery.fancybox.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/select2/css/select2.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/select2/css/select2-bootstrap4.min.css')}}"/>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@yield('modal_title')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @yield('modal_body')
        </div>
      </div>
    </div>
  </div>

  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fa fa-bars"></span>
        </button>
      </div>
      <a class="pull-right notification" style="margin-right: 30px; color: #FFFFFF; font-size:20px;" href="#"><i class="fa fa-bell"></i></a>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('portfolio.index')}}">
              <i class="menu-icon fa fa-file fa-fw"></i>
              <span class="menu-title">Portfolio</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('marketer.index')}}">
              <i class="menu-icon fa fa-user fa-fw"></i>
              <span class="menu-title">Marketer</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('client.index')}}">
              <i class="menu-icon fa fa-dollar fa-fw"></i>
              <span class="menu-title">Client</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon fa fa-sign-out fa-fw"></i>
                <span class="menu-title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

        </ul>
      </nav>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @if(Session::has('alert') || $errors->any())
          <div class="alert alert-info alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              @if($errors->any())
                  @foreach ($errors->all() as $error)
                      {{ $error }} <br>
                  @endforeach
              @endif

              @if(Session::has('alert'))
                  {{ Session::get('alert') }}
              @endif
          </div>
          @endif

          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- FIREBASE -->
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-app.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
      https://firebase.google.com/docs/web/setup#available-libraries -->
  <script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-messaging.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-analytics.js"></script>

  <script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
      apiKey: "AIzaSyCJU5fBaq5E8_MW3_xJPw4xiZEeG14aQlU",
      authDomain: "vjtechsolution-website.firebaseapp.com",
      projectId: "vjtechsolution-website",
      storageBucket: "vjtechsolution-website.appspot.com",
      messagingSenderId: "805140260744",
      appId: "1:805140260744:web:7da65ff696d3d9d9bafc3d",
      measurementId: "G-1FCEB0453F"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    const vapidKey = "BHk8yIa0f2r8nbsk8CqL38gZPm_-5AZIbOWYS--aNLEIfYDWQUKKtsD_rK-LmM30kjd2uIR3FYwohuFAonufnd0";
    const messaging = firebase.messaging();

    // Handle incoming messages. Called when:
    // - a message is received while the app has focus
    // - the user clicks on an app notification created by a service worker
    //   `messaging.onBackgroundMessage` handler.
    messaging.onMessage((payload) => {
      console.log('Message received. ', payload);
    });

  </script>

  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script type="text/javascript" src="{{asset('admin/vendors/DataTables/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/vendors/fancybox-master/jquery.fancybox.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/vendors/select2/js/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

  <script>
    $(function() {
      function subsTopic(token) {
        messaging.subscri
      }

      $('html').on('click', '.notification', function(e) {
        e.preventDefault();

        // Add the public key generated from the console here.
        messaging.getToken({ vapidKey: vapidKey }).then((currentToken) => {
          if (currentToken) {
            // Send the token to your server and update the UI if necessary
            console.log(currentToken);
          } else {
            // Show permission request UI
            console.log('No registration token available. Request permission to generate one.');
            console.log(currentToken);
          }
        }).catch((err) => {
          console.log('An error occurred while retrieving token. ', err);
        });
      });
    });
  </script>

</body>

</html>