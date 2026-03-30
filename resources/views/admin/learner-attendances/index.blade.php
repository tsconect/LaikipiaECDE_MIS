@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')

    <div class="table-card">
        <div class="table-banner">
            <div class="table-banner-title"><span>LEARNERS</span> ATTENDANCE</div>
            <div class="banner-actions">
                <a href="{{ route('admin.learner-attendances.create') }}">
                    <button class="btn-new" type="button">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                        Mark Register
                    </button>
                </a>
            </div>
        </div>

        <div class="table-toolbar">
            <div class="toolbar-left">
                <button class="toolbar-btn" onclick="copyTable()" type="button">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 3a1 1 0 000 2h4a1 1 0 000-2H8zM3 7a1 1 0 011-1h12a1 1 0 011 1v1a1 1 0 01-.293.707L13 12.414V17a1 1 0 01-.553.894l-4-2A1 1 0 018 15v-2.586L3.293 8.707A1 1 0 013 8V7z"/></svg>
                    Copy
                </button>
                <button class="toolbar-btn" onclick="exportCSV()" type="button">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    CSV
                </button>
                <button class="toolbar-btn" onclick="printTable()" type="button">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"/></svg>
                    Print
                </button>
            </div>
            <div class="toolbar-right">
                <div class="search-wrap">
                    <svg class="search-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
                    <input class="search-input" type="text" placeholder="Search..." id="searchInput">
                </div>
            </div>
        </div>

        <table class="data-table" id="learnerAttendanceTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>STUDENT</th>
                    <th>DATE</th>
                    <th>MARKED BY</th>
                    <th>STATUS</th>
                    <th>ABSENTISM REASON</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $item)
                    <tr>
                        <td class="td-id">{{ $item->id }}</td>
                        <td>{{ $item->learner->first_name ?? '' }} {{ $item->learner->middle_name ?? '' }} {{ $item->learner->last_name ?? '' }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->teacher->first_name ?? '-' }} {{ $item->teacher->middle_name ?? '-' }} {{ $item->teacher->last_name ?? '-' }}</td>
                        <td>{{ ucfirst($item->status ?? '-') }}</td>
                        <td>{{ $item->reason ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Learner" href="{{ route('admin.learners.show', $item->learner_id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </a>
                                <a class="act-btn edit" title="Edit Attendance" href="{{ route('admin.learner-attendances.edit', $item->id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">No attendance records found.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="table-footer">
            <div class="showing-text">Showing {{ $attendances->count() }} record(s)</div>
            <div class="pagination">
                <div class="page-arrow is-disabled">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <div class="page-num">1</div>
                <div class="page-arrow is-disabled">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyTable() {
            const table = document.getElementById('learnerAttendanceTable');
            const range = document.createRange();
            range.selectNode(table);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
        }

        function exportCSV() {
            const table = document.getElementById('learnerAttendanceTable');
            const csv = [];
            for (const row of table.rows) {
                const rowData = [];
                for (const cell of row.cells) {
                    rowData.push('"' + cell.textContent.trim().replace(/"/g, '""') + '"');
                }
                csv.push(rowData.join(','));
            }
            const blob = new Blob([csv.join('\n')], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'learner-attendance.csv';
            a.click();
            window.URL.revokeObjectURL(url);
        }

        function printTable() {
            const table = document.getElementById('learnerAttendanceTable');
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Learner Attendance</title></head><body>');
            printWindow.document.write(table.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#learnerAttendanceTable tbody tr');
            rows.forEach((row) => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
@endsection
