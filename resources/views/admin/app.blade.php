<!doctype html>
<html lang="en">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
    :root {
        --navy-dark: #142240;
        --navy: #1a2d4d;
        --gold: #e8a020;
        --header-h: 60px;
    }

    body {
        background-color: #f0f2f5;
        color: #1a2d4d;
    }

    .app-header.modern-admin-header {
        background: var(--navy-dark) !important;
        height: var(--header-h);
        border-bottom: 1px solid rgba(255,255,255,.06);
    }

    .modern-admin-header .app-header__logo {
        background: transparent;
        border-right: 1px solid rgba(255,255,255,.08);
        padding: 0 16px;
        min-width: 255px;
        height: var(--header-h);
        display: flex;
        align-items: center;
    }

    .modern-admin-header .brand-chip {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--gold), #f5c842);
        color: #1a2d4d;
        font-weight: 800;
        margin-right: 10px;
        font-size: 13px;
    }

    .modern-admin-header .brand-title {
        color: #fff;
        font-weight: 700;
        letter-spacing: .04em;
        font-size: 13px;
    }

    .modern-admin-header .app-header__content {
        height: var(--header-h);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
    }

    .modern-admin-header .btn-go-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        border: 0;
        border-radius: 7px;
        background: #28a745;
        color: #fff;
        padding: 7px 14px;
        font-size: 12px;
        font-weight: 600;
    }

    .modern-admin-header .btn-go-back:hover {
        background: #22933d;
    }

    .modern-admin-header .user-pill {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fff;
    }

    .modern-admin-header .avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,.25);
        object-fit: cover;
    }

    .modern-admin-header .user-name {
        font-size: 12.5px;
        font-weight: 700;
        line-height: 1.1;
    }

    .modern-admin-header .user-role {
        font-size: 11px;
        color: rgba(255,255,255,.6);
    }

    .modern-admin-header .profile-btn {
        border: 0;
        background: transparent;
        color: inherit;
        padding: 0;
    }

    .modern-admin-header .dropdown-menu {
        margin-top: 10px;
        border: 1px solid #e4e8ef;
        box-shadow: 0 8px 24px rgba(26,45,77,.12);
    }

    .closed-sidebar .modern-admin-header .app-header__logo {
        min-width: 80px;
        width: 80px;
        padding: 0 8px;
        justify-content: center;
        gap: 0;
    }

    .closed-sidebar .modern-admin-header .brand-title {
        display: none;
    }

    .closed-sidebar .modern-admin-header .brand-chip {
        margin-right: 0;
    }

    .closed-sidebar .modern-admin-header .header__pane {
        margin-left: 6px !important;
    }

    .app-main__inner {
        background: #f0f2f5;
    }

    .app-main__inner .card,
    .app-main__inner .main-card {
        border: 1px solid #e4e8ef;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(26,45,77,.08);
        overflow: hidden;
    }

    .app-main__inner .card-header {
        border-bottom: 1px solid #eef1f6;
        background: #f7f9fc;
        color: #1a2d4d;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        font-size: 12px;
        padding: 12px 16px;
    }

    .app-main__inner .card-header.btn-success,
    .app-main__inner .card-header.bg-success {
        background: #1a2d4d !important;
        color: #fff !important;
        border-bottom-color: #1a2d4d;
    }

    .app-main__inner .card-body {
        padding: 16px;
    }

    .app-main__inner .card-title {
        color: #1a2d4d;
        font-weight: 700;
    }

    .app-main__inner .form-control,
    .app-main__inner .form-select,
    .app-main__inner select,
    .app-main__inner textarea,
    .app-main__inner input[type="text"],
    .app-main__inner input[type="email"],
    .app-main__inner input[type="number"],
    .app-main__inner input[type="date"],
    .app-main__inner input[type="file"] {
        border: 1px solid #dbe2ec;
        border-radius: 8px;
        min-height: 40px;
        box-shadow: none;
    }

    .app-main__inner .form-control:focus,
    .app-main__inner .form-select:focus,
    .app-main__inner select:focus,
    .app-main__inner textarea:focus,
    .app-main__inner input:focus {
        border-color: #3f6ad8;
        box-shadow: 0 0 0 .18rem rgba(63,106,216,.15);
    }

    .app-main__inner label,
    .app-main__inner .form-label {
        color: #1a2d4d;
        font-weight: 600;
        font-size: 12.5px;
        margin-bottom: 6px;
    }

    .app-main__inner .btn {
        border-radius: 8px;
        font-weight: 600;
        min-height: 36px;
        padding: 7px 12px;
    }

    .app-main__inner .btn-warning {
        background: #f59e0b;
        border-color: #f59e0b;
        color: #fff;
    }

    .app-main__inner .btn-warning:hover {
        background: #dd8f0c;
        border-color: #dd8f0c;
        color: #fff;
    }

    .app-main__inner .btn-outline-primary {
        border-color: #3f6ad8;
        color: #3f6ad8;
    }

    .app-main__inner .btn-outline-primary:hover {
        background: #3f6ad8;
        border-color: #3f6ad8;
        color: #fff;
    }

    .app-main__inner .table {
        border-color: #e8edf5;
    }

    .app-main__inner .table thead th {
        background: #f7f9fc;
        color: #667085;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .06em;
        border-bottom: 1px solid #e4e8ef;
        padding: 10px 12px;
        white-space: nowrap;
    }

    .app-main__inner .table tbody td {
        padding: 10px 12px;
        vertical-align: middle;
        border-color: #eef1f6;
        color: #334155;
        font-size: 13px;
    }

    .app-main__inner .table-hover tbody tr:hover {
        background: #f8faff;
    }

    .app-main__inner .badge {
        border-radius: 999px;
        font-weight: 600;
        padding: 4px 8px;
    }

    .app-main__inner .alert {
        border-radius: 10px;
        border: 0;
        box-shadow: 0 2px 10px rgba(26,45,77,.06);
    }

    .app-main__inner .dataTables_wrapper .dataTables_filter input,
    .app-main__inner .dataTables_wrapper .dataTables_length select {
        border: 1px solid #dbe2ec;
        border-radius: 8px;
        min-height: 34px;
        padding: 4px 8px;
        background: #fff;
    }

    .app-main__inner .dataTables_wrapper .dt-buttons .btn {
        background: #1a2d4d;
        border-color: #1a2d4d;
        color: #fff;
    }

    .app-main__inner .dataTables_wrapper .dt-buttons .btn:hover {
        background: #223b61;
        border-color: #223b61;
    }

    .app-main__inner .pagination .page-link {
        border-radius: 7px;
        margin: 0 2px;
        border-color: #dbe2ec;
        color: #334155;
    }

    .app-main__inner .pagination .active .page-link {
        background: #1a2d4d;
        border-color: #1a2d4d;
        color: #fff;
    }

    .delete-confirm-overlay {
        position: fixed;
        inset: 0;
        background: rgba(10, 20, 35, 0.65);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.25s ease;
    }

    .delete-confirm-overlay.active {
        opacity: 1;
        pointer-events: auto;
    }

    .delete-confirm-modal {
        background: #fff;
        border-radius: 14px;
        width: 100%;
        max-width: 440px;
        margin: 16px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.07), 0 20px 60px -10px rgba(0,0,0,0.25);
        overflow: hidden;
        transform: translateY(18px) scale(0.97);
        transition: transform 0.28s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.25s ease;
        opacity: 0;
    }

    .delete-confirm-overlay.active .delete-confirm-modal {
        transform: translateY(0) scale(1);
        opacity: 1;
    }

    .delete-confirm-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 22px 24px 18px;
        border-bottom: 1px solid #e5e7eb;
    }

    .delete-confirm-title {
        font-size: 18px;
        font-weight: 700;
        color: #1a1a2e;
        letter-spacing: -0.01em;
    }

    .delete-confirm-close {
        width: 32px;
        height: 32px;
        border: none;
        background: #f3f4f6;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        transition: background 0.15s, color 0.15s, transform 0.15s;
    }

    .delete-confirm-close:hover {
        background: #fee2e2;
        color: #e03c3c;
        transform: rotate(90deg);
    }

    .delete-confirm-body {
        padding: 24px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .delete-confirm-icon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #fee2e2;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: #e03c3c;
    }

    .delete-confirm-message {
        font-size: 14.5px;
        color: #6b7280;
        line-height: 1.6;
        padding-top: 4px;
    }

    .delete-confirm-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 24px 22px;
    }

    .btn-delete-confirm {
        padding: 10px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        letter-spacing: 0.01em;
    }

    .btn-delete-cancel {
        background: transparent;
        color: #6b7280;
        border: 1.5px solid #e5e7eb;
    }

    .btn-delete-cancel:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #1a1a2e;
    }

    .btn-delete-submit {
        background: #e03c3c;
        color: #fff;
        box-shadow: 0 2px 8px rgba(224, 60, 60, 0.35);
    }

    .btn-delete-submit:hover {
        background: #c52e2e;
        box-shadow: 0 4px 14px rgba(224, 60, 60, 0.45);
    }
</style>
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
    <link href="{{asset('main.d810cf0ae7f39f28f336.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>




<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow text-white modern-admin-header">
        <div class="app-header__logo">
            <span class="brand-chip">L</span>
            <span class="brand-title">LAIKIPIA ECDE</span>
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="delete-confirm-body">
            <div class="delete-confirm-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6l-1 14H6L5 6"></path>
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                    <path d="M9 6V4h6v2"></path>
                </svg>
            </div>
            <p class="delete-confirm-message" id="deleteConfirmMessage">Are you sure you want to delete this record? This action cannot be undone.</p>
        </div>
        <div class="delete-confirm-footer">
            <button type="button" class="btn-delete-confirm btn-delete-cancel" id="deleteConfirmCancel">Cancel</button>
            <button type="button" class="btn-delete-confirm btn-delete-submit" id="deleteConfirmSubmit">Delete</button>
        </div>
    </div>
</div>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script type="text/javascript" src="{{asset('assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
   <!-- jQuery -->
   
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

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
