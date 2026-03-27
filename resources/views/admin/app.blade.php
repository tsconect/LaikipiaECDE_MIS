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

    .modern-admin-header .app-header__logo img {
        width: 40px;
        height: 40px;
        margin-right: 10px;
        flex-shrink: 0;
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
        min-width: 60px;
        width: 60px;
        padding: 0 8px;
        justify-content: space-between;
    }

    .closed-sidebar .modern-admin-header .app-header__logo img {
        width: 40px;
        height: 40px;
        margin-right: 0;
    }

    .closed-sidebar .modern-admin-header .header__pane {
        margin-left: auto !important;
        display: flex;
        align-items: center;
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

    /* ============================================================
       GLOBAL SHOW/PROFILE PAGE — detail grid system
       ============================================================ */

    /* Profile header card */
    .app-main__inner .prof-header {
        background: linear-gradient(135deg, #0f1b2d 0%, #1a2d4d 100%);
        border-radius: 14px;
        padding: 22px 26px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(15,27,45,.22);
    }
    .app-main__inner .prof-header-title {
        font-size: 18px; font-weight: 700; color: #fff; line-height: 1.2;
    }
    .app-main__inner .prof-header-meta {
        font-size: 13px; color: #c8d8f0; margin-top: 5px;
        display: flex; flex-wrap: wrap; gap: 14px;
    }
    .app-main__inner .prof-header-meta span { display: flex; align-items: center; gap: 5px; }
    .app-main__inner .prof-header-meta i { color: #22c55e; }

    /* Detail grid */
    .app-main__inner .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 14px;
        padding: 4px 0 16px;
    }
    .app-main__inner .detail-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px 16px;
        transition: box-shadow .15s;
    }
    .app-main__inner .detail-item:hover { box-shadow: 0 2px 10px rgba(0,0,0,.07); }

    .app-main__inner .detail-label {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .07em;
        color: #94a3b8;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .app-main__inner .detail-label i { color: #22c55e; font-size: 12px; }

    .app-main__inner .detail-value {
        font-size: 14px;
        font-weight: 600;
        color: #0f172a;
        word-break: break-word;
    }
    .app-main__inner .detail-value.muted { color: #94a3b8; font-weight: 400; font-style: italic; }

    /* Wide text block (content/body fields) */
    .app-main__inner .detail-item.full {
        grid-column: 1 / -1;
    }
    .app-main__inner .detail-item.full .detail-value {
        font-size: 13.5px;
        font-weight: 400;
        color: #334155;
        white-space: pre-wrap;
        line-height: 1.6;
    }

    /* Section divider */
    .app-main__inner .section-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: #94a3b8;
        margin: 0 0 14px;
        padding-bottom: 8px;
        border-bottom: 1px dashed #e2e8f0;
    }

    /* Profile card shell */
    .app-main__inner .prof-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,.06);
        overflow: hidden;
        margin-bottom: 20px;
    }
    .app-main__inner .prof-card-body { padding: 22px 26px; }

    /* ============================================================
       GLOBAL BUTTON COLOUR — green accent system
       ============================================================ */

    .app-main__inner .btn {
        border-radius: 8px;
        font-weight: 600;
        min-height: 36px;
        padding: 7px 14px;
        transition: background 0.15s, border-color 0.15s, box-shadow 0.15s, transform 0.12s;
    }
    .app-main__inner .btn:hover { transform: translateY(-1px); }
    .app-main__inner .btn:active { transform: scale(0.97); }

    /* ── Solid green (replaces primary, success, warning, info, secondary) ── */
    .app-main__inner .btn-primary,
    .app-main__inner .btn-success,
    .app-main__inner .btn-warning,
    .app-main__inner .btn-info,
    .app-main__inner .btn-secondary {
        background: #22c55e;
        border-color: #22c55e;
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(34,197,94,.25);
    }
    .app-main__inner .btn-primary:hover,
    .app-main__inner .btn-success:hover,
    .app-main__inner .btn-warning:hover,
    .app-main__inner .btn-info:hover,
    .app-main__inner .btn-secondary:hover {
        background: #16a34a;
        border-color: #16a34a;
        color: #fff !important;
        box-shadow: 0 4px 12px rgba(34,197,94,.35);
    }
    .app-main__inner .btn-primary:focus,
    .app-main__inner .btn-success:focus,
    .app-main__inner .btn-warning:focus,
    .app-main__inner .btn-info:focus,
    .app-main__inner .btn-secondary:focus {
        box-shadow: 0 0 0 .2rem rgba(34,197,94,.3);
    }

    /* ── Outline green ── */
    .app-main__inner .btn-outline-primary,
    .app-main__inner .btn-outline-success,
    .app-main__inner .btn-outline-warning,
    .app-main__inner .btn-outline-info,
    .app-main__inner .btn-outline-secondary {
        border-color: #22c55e;
        color: #16a34a;
        background: transparent;
    }
    .app-main__inner .btn-outline-primary:hover,
    .app-main__inner .btn-outline-success:hover,
    .app-main__inner .btn-outline-warning:hover,
    .app-main__inner .btn-outline-info:hover,
    .app-main__inner .btn-outline-secondary:hover {
        background: #22c55e;
        border-color: #22c55e;
        color: #fff !important;
    }

    /* ── Danger stays red — delete actions need clear distinction ── */
    .app-main__inner .btn-danger {
        background: #ef4444;
        border-color: #ef4444;
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(239,68,68,.25);
    }
    .app-main__inner .btn-danger:hover {
        background: #dc2626;
        border-color: #dc2626;
        box-shadow: 0 4px 12px rgba(239,68,68,.35);
        color: #fff !important;
    }
    .app-main__inner .btn-outline-danger {
        border-color: #fecaca;
        color: #ef4444;
        background: #fff;
    }
    .app-main__inner .btn-outline-danger:hover {
        background: #fef2f2;
        border-color: #ef4444;
        color: #ef4444;
    }

    /* ============================================================
       MODERN TABLE SYSTEM — design v2
       ============================================================ */

    /* ── Table card shell ── */
    .app-main__inner .table-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.07), 0 1px 2px rgba(0,0,0,0.04);
        overflow: hidden;
        margin-bottom: 16px;
    }

    /* ── Table header banner (dark strip) ── */
    .app-main__inner .table-banner {
        background: #0f1b2d;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
    }
    .app-main__inner .table-banner-title {
        font-size: 17px;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }
    .app-main__inner .table-banner-title .accent { color: #22c55e; margin-right: 4px; }

    /* Card fallback — existing blade views use .card-header */
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
        background: #0f1b2d !important;
        color: #fff !important;
        border-bottom-color: #0f1b2d;
        font-size: 14px;
        padding: 14px 20px;
        letter-spacing: .05em;
    }

    /* ── Toolbar (controls row above table) ── */
    .app-main__inner .dataTables_wrapper {
        padding: 0;
    }
    .app-main__inner .dataTables_wrapper .dataTables_length,
    .app-main__inner .dataTables_wrapper .dt-buttons,
    .app-main__inner .dataTables_wrapper .dataTables_filter {
        display: flex;
        align-items: center;
    }
    .app-main__inner .dataTables_wrapper > .row:first-child {
        background: #fafcff;
        border-bottom: 1px solid #e2e8f0;
        padding: 10px 12px;
        margin: 0;
        align-items: center;
        gap: 0;
    }

    /* Records per page select */
    .app-main__inner .dataTables_wrapper .dataTables_length label {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: #475569;
        margin: 0;
    }
    .app-main__inner .dataTables_wrapper .dataTables_length select {
        height: 32px;
        padding: 0 8px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 12.5px;
        background: #fff;
        color: #0f172a;
        cursor: pointer;
        margin: 0 4px;
        box-shadow: none;
        outline: none;
    }
    .app-main__inner .dataTables_wrapper .dataTables_length select:focus {
        border-color: #22c55e;
    }

    /* Export buttons */
    .app-main__inner .dataTables_wrapper .dt-buttons {
        gap: 5px;
        flex-wrap: wrap;
        margin-left: 8px;
    }
    .app-main__inner .dataTables_wrapper .dt-buttons .btn {
        height: 32px;
        padding: 0 12px;
        border: 1px solid #e2e8f0 !important;
        border-radius: 6px;
        background: #fff !important;
        color: #475569 !important;
        font-size: 12px;
        font-weight: 500;
        min-height: unset;
        margin: 0;
        box-shadow: none;
        transition: background 0.15s, border-color 0.15s;
        display: flex;
        align-items: center;
    }
    .app-main__inner .dataTables_wrapper .dt-buttons .btn:hover {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #0f172a !important;
    }

    /* Search input */
    .app-main__inner .dataTables_wrapper .dataTables_filter {
        margin: 0;
    }
    .app-main__inner .dataTables_wrapper .dataTables_filter label {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: #475569;
        margin: 0;
    }
    .app-main__inner .dataTables_wrapper .dataTables_filter input {
        height: 32px;
        padding: 0 10px ;
        width: 220px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 12.5px;
        background: #fff;
        color: #0f172a;
        box-shadow: none;
        outline: none;
        transition: border-color 0.15s, width 0.2s;
        margin-left: 4px;
    }
    .app-main__inner .dataTables_wrapper .dataTables_filter input::placeholder { color: #94a3b8; }
    .app-main__inner .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #22c55e;
        width: 260px;
    }

    /* ── TABLE ITSELF ── */
    .app-main__inner .table-responsive {
        border-radius: 0;
        overflow: hidden;
        border: none;
    }
    .app-main__inner .table {
        margin-bottom: 0;
        border-collapse: collapse;
        width: 100% !important;
        font-size: 13px;
    }

    /* Head */
    .app-main__inner .table thead {
        background: #0f1b2d;
    }
    .app-main__inner .table thead th {
        background: transparent;
        color: #c8d8f0;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .07em;
        border-bottom: none;
        border-top: none;
        padding: 11px 14px;
        white-space: nowrap;
        user-select: none;
    }
    /* Subtle divider between header cells */
    .app-main__inner .table thead th + th {
        border-left: 1px solid rgba(255,255,255,0.07);
    }

    /* Body */
    .app-main__inner .table tbody td {
        padding: 13px 14px;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 13px;
        background: #fff;
        transition: background .13s ease;
    }
    .app-main__inner .table tbody tr:last-child td { border-bottom: none; }
    .app-main__inner .table-striped tbody tr:nth-of-type(even) td { background: #fafcff; }
    .app-main__inner .table-hover tbody tr:hover td { background: #f8fafc !important; }
    .app-main__inner .table-striped tbody tr:nth-of-type(even):hover td { background: #f1f5f9 !important; }

    /* S/N column */
    .app-main__inner .table tbody td:first-child {
        color: #94a3b8;
        font-size: 12px;
        font-weight: 500;
    }

    /* ── ACTION BUTTONS (icon buttons) ── */
    .app-main__inner .table .action-btns {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .app-main__inner .table .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 7px;
        border: 1.5px solid;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #fff;
        transition: background 0.15s, transform 0.12s;
        padding: 0;
        text-decoration: none;
    }
    .app-main__inner .table .action-btn:hover { transform: translateY(-1px); }
    .app-main__inner .table .action-btn:active { transform: scale(0.95); }
    .app-main__inner .table .action-btn svg { width: 14px; height: 14px; }

    /* View */
    .app-main__inner .table .action-btn.view { border-color: #bfdbfe; color: #3b82f6; }
    .app-main__inner .table .action-btn.view:hover { background: #eff6ff; }
    /* Edit */
    .app-main__inner .table .action-btn.edit { border-color: #bbf7d0; color: #16a34a; }
    .app-main__inner .table .action-btn.edit:hover { background: #f0fdf4; }
    /* Delete */
    .app-main__inner .table .action-btn.delete { border-color: #fecaca; color: #ef4444; }
    .app-main__inner .table .action-btn.delete:hover { background: #fef2f2; }

    /* Fallback — keep Bootstrap outline buttons looking polished */
    .app-main__inner .table .btn {
        min-height: 30px;
        height: 30px;
        padding: 0 10px;
        font-size: 12px;
        border-radius: 6px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin: 1px;
        transition: background .15s, transform .12s;
    }
    .app-main__inner .table .btn:hover { transform: translateY(-1px); }
    .app-main__inner .table .btn-outline-primary { border-color: #bfdbfe; color: #3b82f6; background: #fff; }
    .app-main__inner .table .btn-outline-primary:hover { background: #eff6ff; }
    .app-main__inner .table .btn-outline-danger { border-color: #fecaca; color: #ef4444; background: #fff; }
    .app-main__inner .table .btn-outline-danger:hover { background: #fef2f2; }
    .app-main__inner .table .btn-outline-warning { border-color: #fde68a; color: #d97706; background: #fff; }
    .app-main__inner .table .btn-outline-warning:hover { background: #fffbeb; }

    /* ── BADGES ── */
    .app-main__inner .badge {
        border-radius: 999px;
        font-weight: 500;
        padding: 3px 10px;
        font-size: 11.5px;
        letter-spacing: .02em;
    }

    /* ── DataTables info & pagination row ── */
    .app-main__inner .dataTables_wrapper > .row:last-child {
        background: #fafcff;
        border-top: 1px solid #e2e8f0;
        padding: 10px 14px;
        margin: 0;
        align-items: center;
    }
    .app-main__inner .dataTables_wrapper .dataTables_info {
        font-size: 12.5px;
        color: #94a3b8;
        padding: 0;
    }
    .app-main__inner .dataTables_wrapper .dataTables_paginate {
        padding: 0;
    }

    /* ── PAGINATION (DataTables) ── */
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button {
        width: 32px !important;
        height: 32px !important;
        border-radius: 7px !important;
        border: 1px solid #e2e8f0 !important;
        background: #fff !important;
        color: #475569 !important;
        font-size: 12.5px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 2px !important;
        padding: 0 !important;
        transition: background 0.15s, border-color 0.15s !important;
        box-shadow: none !important;
        text-decoration: none !important;
    }
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
        color: #0f172a !important;
    }
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #22c55e !important;
        border-color: #22c55e !important;
        color: #fff !important;
        font-weight: 600 !important;
    }
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .app-main__inner .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
        opacity: 0.4 !important;
        cursor: default !important;
    }

    /* Bootstrap pagination */
    .app-main__inner .pagination .page-link {
        border-radius: 7px;
        margin: 0 2px;
        border-color: #e2e8f0;
        color: #475569;
        min-width: 32px;
        text-align: center;
        font-size: 12.5px;
        transition: all .15s;
    }
    .app-main__inner .pagination .page-link:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        color: #0f172a;
    }
    .app-main__inner .pagination .active .page-link {
        background: #22c55e;
        border-color: #22c55e;
        color: #fff;
        box-shadow: 0 2px 8px rgba(34,197,94,.25);
    }

    /* ── ALERT ── */
    .app-main__inner .alert {
        border-radius: 10px;
        border: 0;
        box-shadow: 0 2px 10px rgba(26,45,77,.06);
    }

    .app-main__inner .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
        width: 100% !important;
    }

    /* ---- HEAD ---- */
    .app-main__inner .table thead tr {
        background: linear-gradient(135deg, #1a2d4d 0%, #243b5e 100%);
    }

    .app-main__inner .table thead th {
        background: transparent;
        color: #c8d8f0;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        border: none;
        padding: 13px 14px;
        white-space: nowrap;
        position: relative;
    }

    /* Thin separator between header cells */
    .app-main__inner .table thead th + th::before {
        content: '';
        position: absolute;
        left: 0;
        top: 25%;
        height: 50%;
        width: 1px;
        background: rgba(255,255,255,.12);
    }

    /* ---- BODY ---- */
    .app-main__inner .table tbody td {
        padding: 11px 14px;
        vertical-align: middle;
        border-top: none;
        border-bottom: 1px solid #eef1f6;
        color: #334155;
        font-size: 13px;
        background: #fff;
        transition: background .15s ease;
    }

    .app-main__inner .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Alternating row tint */
    .app-main__inner .table-striped tbody tr:nth-of-type(even) td {
        background: #f8faff;
    }

    /* Hover glow */
    .app-main__inner .table-hover tbody tr:hover td {
        background: #eef4ff !important;
    }

    /* Serial-number cell — muted & narrow */
    .app-main__inner .table tbody td:first-child {
        color: #94a3b8;
        font-size: 12px;
        font-weight: 600;
        width: 48px;
        text-align: center;
    }

    /* Action column — keep it tight */
    .app-main__inner .table tbody td:last-child {
        white-space: nowrap;
    }

    /* ---- ACTION BUTTONS in tables ---- */
    .app-main__inner .table .btn {
        min-height: 30px;
        padding: 4px 10px;
        font-size: 12px;
        border-radius: 6px;
        font-weight: 600;
        line-height: 1.4;
        margin: 1px;
    }

    .app-main__inner .table .btn-outline-primary {
        border-color: #3f6ad8;
        color: #3f6ad8;
    }
    .app-main__inner .table .btn-outline-primary:hover {
        background: #3f6ad8;
        color: #fff;
    }

    .app-main__inner .table .btn-outline-danger {
        border-color: #e03c3c;
        color: #e03c3c;
    }
    .app-main__inner .table .btn-outline-danger:hover {
        background: #e03c3c;
        color: #fff;
    }

    .app-main__inner .table .btn-outline-warning {
        border-color: #f59e0b;
        color: #b45309;
    }
    .app-main__inner .table .btn-outline-warning:hover {
        background: #f59e0b;
        color: #fff;
    }

    /* ---- BADGE / STATUS PILLS ---- */
    .app-main__inner .badge {
        border-radius: 999px;
        font-weight: 600;
        padding: 4px 10px;
        font-size: 11px;
        letter-spacing: .03em;
    }

    /* ---- DataTables toolbar ---- */
    .app-main__inner .dataTables_wrapper {
        padding: 0;
    }

    .app-main__inner .dataTables_wrapper .dataTables_filter {
        margin-bottom: 10px;
    }

    .app-main__inner .dataTables_wrapper .dataTables_filter input,
    .app-main__inner .dataTables_wrapper .dataTables_length select {
        border: 1px solid #dbe2ec;
        border-radius: 8px;
        min-height: 34px;
        padding: 4px 10px;
        background: #fff;
        font-size: 13px;
        box-shadow: none;
        outline: none;
    }

    .app-main__inner .dataTables_wrapper .dataTables_filter input:focus,
    .app-main__inner .dataTables_wrapper .dataTables_length select:focus {
        border-color: #3f6ad8;
        box-shadow: 0 0 0 .18rem rgba(63,106,216,.12);
    }

    .app-main__inner .dataTables_wrapper .dt-buttons {
        margin-bottom: 10px;
    }

    .app-main__inner .dataTables_wrapper .dt-buttons .btn {
        background: #1a2d4d;
        border-color: #1a2d4d;
        color: #fff;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        min-height: 32px;
        margin-right: 4px;
        transition: background .15s;
    }

    .app-main__inner .dataTables_wrapper .dt-buttons .btn:hover {
        background: #243b5e;
        border-color: #243b5e;
    }

    /* DataTables info & paginator row */
    .app-main__inner .dataTables_wrapper .dataTables_info {
        font-size: 12px;
        color: #94a3b8;
        padding-top: 10px;
    }

    .app-main__inner .dataTables_wrapper .dataTables_paginate {
        padding-top: 8px;
    }

    /* ---- PAGINATION ---- */
    .app-main__inner .pagination .page-link {
        border-radius: 7px;
        margin: 0 2px;
        border-color: #dbe2ec;
        color: #334155;
        min-width: 34px;
        text-align: center;
        font-size: 13px;
        transition: all .15s;
    }

    .app-main__inner .pagination .page-link:hover {
        background: #eef4ff;
        border-color: #3f6ad8;
        color: #3f6ad8;
    }

    .app-main__inner .pagination .active .page-link {
        background: #1a2d4d;
        border-color: #1a2d4d;
        color: #fff;
        box-shadow: 0 2px 8px rgba(26,45,77,.25);
    }

    /* ---- ALERT ---- */
    .app-main__inner .alert {
        border-radius: 10px;
        border: 0;
        box-shadow: 0 2px 10px rgba(26,45,77,.06);
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
