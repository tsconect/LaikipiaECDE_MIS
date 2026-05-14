<!doctype html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>LAIKIPIA ECDE MANAGEMENT SYSTEM</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Laikipia Cdf management SYstem.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/v4-shims.min.css" rel="stylesheet" media="all">
    <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="icon" href="{{asset('assets/images/laikipia.png')}}" type="image/png">
     {{-- j query 3.6 --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 @vite(['resources/css/admin.css', 'resources/js/app.js'])
 @stack('css')
</head>

<style>
    .buttons-pdf {
        color: #dc2626 !important;
    }
</style>


<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow text-white modern-admin-header">
        <div class="app-header__logo">
            <img src="{{asset('assets/images/laikipia.png')}}" alt="Laikipia" style="height: 40px; width: 40px;">
            <div class="header__pane ml-auto">
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>

        <div class="app-header__mobile-menu">
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>

        <div class="app-header__content">
            <button onclick="goBack()" class="btn-go-back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Go Back
            </button>

            <div class="app-header-right">
                <div class="btn-group">
                    <button type="button" class="profile-btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-pill">
                            <img class="avatar" src="https://cdn-icons-png.flaticon.com/512/0/93.png" alt="User">
                            <div>
                                <div class="user-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                <div class="user-role">{{ Auth::user()->role }}</div>
                            </div>
                            <i class="fa fa-angle-down opacity-8"></i>
                        </div>
                    </button>

                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item text-right nav-item">
                                <a href="" class="nav-link">My Profile</a>
                            </li>
                            <li class="nav-item text-right nav-item">
                                <button class="btn-wide btn btn-sm" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    Logout
                                </button>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
    </div>

    <div class="app-main">
       @hasSection('nav-bar')
           @yield('nav-bar')
       @else
           @include('admin.layouts.sidebar')
       @endif
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

<div class="delete-confirm-overlay" id="deleteConfirmOverlay" aria-hidden="true">
    <div class="delete-confirm-modal" role="dialog" aria-modal="true" aria-labelledby="deleteConfirmTitle">
        <div class="delete-confirm-header">
            <span class="delete-confirm-title" id="deleteConfirmTitle">Confirm Delete</span>
            <button type="button" class="delete-confirm-close" id="deleteConfirmClose" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="delete-confirm-body">
            <div class="delete-confirm-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <p class="delete-confirm-message" id="deleteConfirmMessage">Are you sure you want to delete this record? This action cannot be undone.</p>
        </div>
        <div class="delete-confirm-footer">
            <button type="button" class="btn-delete-confirm btn-delete-cancel" id="deleteConfirmCancel">Cancel</button>
            <button type="button" class="btn-delete-confirm btn-delete-submit" id="deleteConfirmSubmit">Delete</button>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success') || session('error') || session('warning') || session('info'))
<script>
Swal.fire({
    // position: "top-end",
    icon: "{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info')) }}",
    title: "{{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}",
    showConfirmButton: false,
    timer: 1500,
    width: '400px',
    padding: '0.5em'
});
</script>
@endif
<script>
$(function () {

    $('.data-table').DataTable({

        pageLength: 25,

        lengthMenu: [10, 25, 50, 100],

        dom:
            "<'row mb-3 align-items-center'<'col-md-3'l><'col-md-6 text-center'B><'col-md-3'f>>" +
            "<'row'<'col-12'tr>>" +
            "<'row mt-3'<'col-md-5'i><'col-md-7'p>>",

        buttons: [

            {
                extend: 'copy',
                // className: 'btn btn-sm btn-outline-secondary'
            },

            {
                extend: 'excel',
                // className: 'btn btn-sm btn-outline-success'
            },

            {
                extend: 'pdf',
                // className: 'btn btn-sm btn-outline-danger'
            },

            {
                extend: 'csv',
                // className: 'btn btn-sm btn-outline-primary'
            },

            {
                extend: 'colvis',
                // className: 'btn btn-sm btn-outline-dark'
            }

        ],

        language: {
            search: '',
            searchPlaceholder: 'Search entries…',

            lengthMenu: 'Show _MENU_ per page',

            info: 'Showing _START_–_END_ of _TOTAL_ entries',

            infoEmpty: 'No entries found',

            emptyTable: 'No about entries have been added yet.',

            paginate: {
                previous: '<i class="bi bi-chevron-left" style="font-size:.7rem"></i>',
                next: '<i class="bi bi-chevron-right" style="font-size:.7rem"></i>',
            }
        },

        columnDefs: [
            { orderable: false, targets: [1, 3] },
            { searchable: false, targets: [0, 1, 3] }
        ],

        order: [[0, 'asc']]

    });

});

$(function () {

    $('.data-table2').DataTable({

        pageLength: 10,
        lengthMenu: [10, 25],

        language: {
            search: '',
            searchPlaceholder: 'Search…',
            lengthMenu: 'Show _MENU_',
            info: '_START_–_END_ of _TOTAL_',
            infoEmpty: 'No records',
            emptyTable: 'No data available',
            paginate: {
                previous: '<i class="bi bi-chevron-left" style="font-size:.7rem"></i>',
                next: '<i class="bi bi-chevron-right" style="font-size:.7rem"></i>',
            }
        },

        columnDefs: [
            { orderable: false },
            { searchable: false }
        ],

        order: [[0, 'asc']],
        autoWidth: false,
        responsive: true

    });

});
</script>
<script>
    (function () {
        const overlay = document.getElementById('deleteConfirmOverlay');
        const messageEl = document.getElementById('deleteConfirmMessage');
        const closeBtn = document.getElementById('deleteConfirmClose');
        const cancelBtn = document.getElementById('deleteConfirmCancel');
        const submitBtn = document.getElementById('deleteConfirmSubmit');
        let pendingForm = null;

        function extractMessage(onsubmitValue) {
            const match = (onsubmitValue || '').match(/confirm\((['\"])(.*?)\1\)/);
            return match && match[2] ? match[2] : 'Are you sure you want to delete this record? This action cannot be undone.';
        }

        function showModal(message, form) {
            pendingForm = form;
            messageEl.textContent = message;
            overlay.classList.add('active');
            overlay.setAttribute('aria-hidden', 'false');
        }

        function closeModal() {
            overlay.classList.remove('active');
            overlay.setAttribute('aria-hidden', 'true');
            pendingForm = null;
        }

        document.querySelectorAll('form[onsubmit*="confirm("]').forEach(function (form) {
            const message = extractMessage(form.getAttribute('onsubmit'));
            form.dataset.deleteConfirmMessage = message;
            form.classList.add('js-delete-confirm-form');
            form.removeAttribute('onsubmit');
        });

        document.addEventListener('submit', function (event) {
            const form = event.target;
            if (!form.classList.contains('js-delete-confirm-form')) {
                return;
            }

            event.preventDefault();
            const message = form.dataset.deleteConfirmMessage || 'Are you sure you want to delete this record? This action cannot be undone.';
            showModal(message, form);
        });

        submitBtn.addEventListener('click', function () {
            if (pendingForm) {
                pendingForm.submit();
            }
        });

        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        overlay.addEventListener('click', function (event) {
            if (event.target === overlay) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && overlay.classList.contains('active')) {
                closeModal();
            }
        });
    })();
</script>
<script>
    function btn()
    {
        alert('clicked');
    }
</script>

@stack('scripts')

<style>
    input:disabled {
        background-color: #f5f5f5 !important;
  color: #9e9e9e !important;
  border-color: #ddd !important;
  cursor: not-allowed !important;
    }
    select:disabled {
         background-color: #f5f5f5 !important;
  color: #9e9e9e !important;
  border-color: #ddd !important;
  cursor: not-allowed !important;
    }
</style>

</html>