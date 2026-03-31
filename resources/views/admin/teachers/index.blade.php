
@extends('admin.app')
@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>ECDE</span> TEACHERS</div>
            <div class="banner-actions">
                {{-- <a href="{{ route('admin.generate_staff_returns') }}">
                    <button class="btn-generate">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                        Generate {{ date('F, Y') }} Staff Returns
                    </button>
                </a> --}}
                <a href="{{ route('admin.teachers.create') }}">
                    <button class="btn-new">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                        New Teacher
                    </button>
                </a>
            </div>
        </div>

       
<div class="table-responsive p-2">
        <!-- Table --> 
        <table class="data-table p-3">
            <thead>
                <tr>
                    <th>ID  </th>
                    <th>NAME  </th>
                    <th>EMAIL  </th>
                    <th>PHONE  </th>
                    <th>ID NUMBER  </th>
                    <th>AGE  </th>
                    <th>RETIREMENT DATE  </th>
                    <th>GENDER  </th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="td-id">{{ $item->id }}</td>
                        <td>
                            <div class="name-cell">
                                <div class="name-avatar">{{ strtoupper(substr($item->user->first_name, 0, 1) . substr($item->user->last_name, 0, 1)) }}</div>
                                <span class="name-text">{{ $item->user->first_name . ' ' . $item->user->middle_name . ' ' . $item->user->last_name }}</span>
                            </div>
                        </td>
                        <td class="td-email">{{ $item->user->email }}</td>
                        <td>{{ $item->user->phone_number }}</td>
                        <td>{{ $item->id_number }}</td>
                        <td><span class="age-badge">{{ \Carbon\Carbon::parse($item->dob)->age }} years</span></td>
                        <td class="td-dash">{{ $item->retirement_date ?? '-' }}</td>
                        <td><span class="gender-badge {{ strtolower($item->gender) }}">{{ ucfirst($item->gender) }}</span></td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View teacher's metadata" href="{{ route('admin.teachers.show', $item->id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </a>
                                <a class="act-btn edit" title="Edit Teacher" href="{{ route('admin.teachers.edit', $item->id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                </a>
                                <form action="{{ route('admin.teachers.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this teacher?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete">
                                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
        <!-- Footer / Pagination -->
        <div class="table-footer">
            <div class="showing-text">Showing page {{ $data->currentPage() }} of {{ $data->lastPage() }}</div>
            <div class="pagination">
                @if ($data->onFirstPage())
                    <div class="page-arrow is-disabled">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                @else
                    <a class="page-arrow" href="{{ $data->previousPageUrl() }}">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </a>
                @endif
                <div class="page-num">{{ $data->currentPage() }}</div>
                @if ($data->hasMorePages())
                    <a class="page-arrow" href="{{ $data->nextPageUrl() }}">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                    </a>
                @else
                    <div class="page-arrow is-disabled">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Records per page change
        document.getElementById('perPage').addEventListener('change', function() {
            const url = new URL(window.location);
            url.searchParams.set('per_page', this.value);
            url.searchParams.delete('page'); // Reset to page 1
            window.location = url;
        });

        // Live search
        let searchTimeout;
        document.getElementById('searchInput').addEventListener('input', function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const url = new URL(window.location);
                if (this.value) {
                    url.searchParams.set('search', this.value);
                } else {
                    url.searchParams.delete('search');
                }
                url.searchParams.delete('page'); // Reset to page 1
                window.location = url;
            }, 500);
        });

        // Copy table function
        function copyTable() {
            const table = document.getElementById('teachersTable');
            let text = '';
            for (let row of table.rows) {
                for (let cell of row.cells) {
                    text += cell.textContent.trim() + '\t';
                }
                text += '\n';
            }
            navigator.clipboard.writeText(text).then(() => {
                alert('Table copied to clipboard!');
            });
        }

        // Export CSV function
        function exportCSV() {
            const table = document.getElementById('teachersTable');
            let csv = [];
            for (let row of table.rows) {
                let rowData = [];
                for (let cell of row.cells) {
                    rowData.push('"' + cell.textContent.trim() + '"');
                }
                csv.push(rowData.join(','));
            }
            const csvContent = csv.join('\n');
            const blob = new Blob([csvContent], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'teachers.csv';
            a.click();
            window.URL.revokeObjectURL(url);
        }

        // Print table function
        function printTable() {
            const printContent = document.getElementById('teachersTable').outerHTML;
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>ECDE Teachers</title></head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
