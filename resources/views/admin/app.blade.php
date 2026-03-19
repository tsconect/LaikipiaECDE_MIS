<!doctype html>
<html lang="en">
<style>
    body{
        background-color: #fff;
        color: #000;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LAIKIPIA COUNTY - CDF MANAGEMENT SYSTEM</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Laikipia Cdf management SYstem.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>




<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow text-white" style="background: #1a3c5e;">
        <div class="app-header__logo">
            <div class="logo-src">LAIKIPIA CDF</div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div> &nbsp;&nbsp;&nbsp;
           <a>
        <button onclick="goBack()" class="btn btn-success">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Go Back
        </button>
    </a>
<script>
function goBack() {
    if (document.referrer == "") {
        window.location.href = "/";
    } else {
        window.history.back();
    }
}
    function hasTsc() {
        var selectElem = document.getElementById("has_tsc");
        var inputElem = document.getElementById("school_contact_tsc_number");
        if (selectElem.value === "1") {
            inputElem.removeAttribute("disabled");
        } else {
            inputElem.setAttribute("disabled", "disabled");
        }
    }

    function hasDisability() {
        var selectElem = document.getElementById("disability");
        var inputElem = document.getElementById("plwd_number");
        if (selectElem.value === "1") {
            inputElem.removeAttribute("disabled");
        } else {
            inputElem.setAttribute("disabled", "disabled");
        }
    }

    function filterCourses(vtc){
        // alert('filterCourses'+ vtc)
        console.log("filter course");

        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('DOMContentLoaded', function() {
  // create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
          console.log("ok");
          // on success, populate the data into the select element
        var response = JSON.parse(xhr.responseText);
        var select = document.getElementById('school_course');
        select.innerHTML = '';
        var defaultOption = document.createElement('option');
        defaultOption.text = 'Select course';
        select.add(defaultOption);
        for (var i = 0; i < response.length; i++) {
          var option = document.createElement('option');
          option.value = response[i].id;
          option.text = response[i].school_name;
          select.add(option);
        }
      } else {
        // on error, display an alert with the error message
        console.error('Error: ' + xhr.status + ': ' + xhr.statusText);
      }
    }
  };
  xhr.onerror = function() {
    console.error('Network Error');
  }
  // send the AJAX request
  xhr.open('GET', 'http://192.168.91.136:9000/api/vtc_courses/1');
  xhr.send();
});
});
    }


</script>
        <div class="app-header__content">
            <div class="app-header-right">
             
                <div class="header-btn-lg pr-0 ">
                    <div class="widget-content p-6">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <button type="button" class="p-0 btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img width="42" class="rounded-circle" src="https://cdn-icons-png.flaticon.com/512/0/93.png" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </button>
                                    <div style="margin: 2%; !important" tabindex="-1" role="menu" aria-hidden="true"
                                        class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2"
                                                    style="background-image: url('https://cdn-icons-png.flaticon.com/512/0/93.png');">
                                                </div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle"
                                                                    src="https://cdn-icons-png.flaticon.com/512/0/93.png" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Alina Mcloughlin</div>
                                                                <div class="widget-subheading opacity-8">A short
                                                                    profile description</div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <button
                                                                    class="btn-pill btn-shadow btn-shine btn btn-focus">
                                                                    <a href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                                                        class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</a>
                                                                </button>

                                                                <form id="frm-logout" action="{{ route('logout') }}"
                                                                    method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider mb-0 nav-item"></li>
                                        </ul>
                                        <div class="grid-menu grid-menu-2col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6">
                                                    <button
                                                        class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                        <i
                                                            class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                        Message Inbox
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button
                                                        class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                        <i
                                                            class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                        <b>Support Tickets</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider nav-item">
                                            </li>
                                            <li class="nav-item-btn text-center nav-item">
                                                <button class="btn-wide btn btn-primary btn-sm"> Open Messages
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading"> Alina Mclourd </div>
                                <div class="widget-subheading"> VP People Manager </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="app-main">
       @yield('nav-bar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-inner-layout">
                    <div class="app-inner-layout__header-boxed p-0">
                 
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
   <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>



<script>
      new DataTable('#dt-basic2', {
            info: true,
            paging: true,
            searchable: true,
            fixedHeight: true,
            lengthMenu: [5, 10, 25, 50, 100, 500, 1000, 10000],
            pageLength: 50,
            order: [],
            dom: 'lBfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    customize: function (win) {
                        // You can customize the print window if needed
                    }
                },
                'colvis' // Add column visibility button
            ],
            language: {
                lengthMenu: " _MENU_ records per page",
                zeroRecords: "No records available",
                info: "Showing page _PAGE_ of _PAGES_",
                infoEmpty: "No records available",
                search: "",
                searchPlaceholder: "Search... ",
                infoFiltered: "(filtered from _MAX_ total records)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
                },
            },
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, -1], visible: true } // Make the first 5 and last columns visible by default
            ]
        });
</script>
<script>
    function btn()
    {
        alert('clicked');
    }
</script>


<style>

    .hamburger-inner{
        background-color:white;
    }
    .hamburger-inner::before{
        background-color:white;
    }
    .hamburger-inner::after{
        background-color:white;
    }
    .logo-src{
        background:url("{{asset('assets/images/laikipia.png')}}");
    }
</style>
</html>
