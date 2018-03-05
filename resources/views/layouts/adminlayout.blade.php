<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SEC Admin</title>
  <!-- Bootstrap core CSS-->

  {!! Html::style('admin/vendor/bootstrap/css/bootstrap.min.css')!!}
  {!! Html::style('admin/vendor/font-awesome/css/font-awesome.min.css')!!}
  {!! Html::style('admin/vendor/datatables/dataTables.bootstrap4.css')!!}
  {!! Html::style('admin/css/sb-admin.css')!!}

  <style>
.dropbtn {
  margin-left: 0px;
    background-color: #343A40;
    color: #ADB5BD;
    padding: 0px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #343A40;
}

.dropdown {

   //position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
   // position: absolute;
    background-color: #343A40;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #ADB5BD;
    //padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #343A40}

.show {display:block;}
</style>
 
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('/')}}">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        </li>
        
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Buildings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{url('cseinfo')}}">CSE</a>
            </li>
            <li>
              <a href="{{url('eeeinfo')}}">EEE</a>
            </li>
             <li>
              <a href="{{url('ceinfo')}}">CE</a>
            </li>
             <li>
              <a href="{{url('adinfo')}}">ADMINISTRATION</a>
            </li>
             <li>
              <a href="{{url('lbinfo')}}">LIBRARY</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Library</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="{{url('libraryinfo')}}">Info</a>
            </li>
           
          </ul>
        </li>





        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Instruments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
           
            <li>
               <a href="{{url('instrumentinfo')}}">Info</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Furniture</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                    <a href="{{url('furnitureinfo')}}">Info</a>
                </li>
                
              </ul>
            </li>
          </ul>
<ul class="dropdown">
  <i class="fa fa-fw fa-sitemap"></i>
<button onclick="myFunction()" class="dropbtn">Booking</button>
  <li id="myDropdown" class="dropdown-content">

    <a href="{{url('businfo')}}">Bus Details</a>
    <a href="{{url('busbookinfo')}}">Bus Booking</a>
    <a href="{{url('roominfo')}}">Room Details</a>
    <a href="{{url('roombookinfo')}}">Room Booking</a>
  </li>
</ul>







        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          
        </li>
        <li class="nav-item">
          <!-- <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" a href="{{ url('admin/logout') }}">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
 <div class="content-wrapper">
    <div class="container-fluid">
 @yield('content') 
</div>
</div>


    {!! Html::script('admin/vendor/jquery/jquery.min.js')!!}

    {!! Html::script('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')!!}

    {!! Html::script('admin/vendor/jquery-easing/jquery.easing.min.js')!!}

    {!! Html::script('admin/vendor/chart.js/Chart.min.js')!!}

    {!! Html::script('admin/vendor/datatables/jquery.dataTables.js')!!}   

    {!! Html::script('admin/vendor/datatables/dataTables.bootstrap4.js')!!}       

    {!! Html::script('admin/js/sb-admin.min.js')!!}   

    {!! Html::script('admin/js/sb-admin-datatables.min.js')!!} 

    {!! Html::script('admin/js/sb-admin-charts.min.js')!!} 

    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
  </div>
</body>

</html>
