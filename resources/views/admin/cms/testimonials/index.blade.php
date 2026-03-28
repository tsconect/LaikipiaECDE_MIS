@extends('admin.cms.layout')

@section('cms-title', 'Testimonials Management')
@section('cms-description', 'Manage testimonials shown on the public website')
@section('hide-cms-header', true)

@section('cms-content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>TESTIMONIALS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.cms.testimonials.create') }}">
                    <button class="btn-new">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                        New Testimonial
                    </button>
                </a>
            </div>
        </div>

        <!-- Toolbar -->
        <div class="table-toolbar">
            <div class="toolbar-left">
                <div class="records-wrap">
                    <select class="records-select" id="perPage">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span>records per page</span>
                </div>
                <button class="toolbar-btn" onclick="copyTable()">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 3a1 1 0 000 2h4a1 1 0 000-2H8zM3 7a1 1 0 011-1h12a1 1 0 011 1v1a1 1 0 01-.293.707L13 12.414V17a1 1 0 01-.553.894l-4-2A1 1 0 018 15v-2.586L3.293 8.707A1 1 0 013 8V7z"/></svg>
                    Copy
                </button>
                <button class="toolbar-btn" onclick="exportCSV()">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3-3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    CSV
                </button>
                <button class="toolbar-btn" onclick="printTable()">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"/></svg>
                    Print
                </button>
                <button class="toolbar-btn">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                    Column visibility ▾
                </button>
            </div>
            <div class="toolbar-right">
                <div class="search-wrap">
                    <svg class="search-icon" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
                    <input class="search-input" type="text" placeholder="Search..." id="searchInput" value="{{ request('search') }}">
                </div>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table" id="testimonialsTable">
            <thead>
                <tr>
                    <th>NAME <span class="sort-arrows"><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 0l2 3H2L4 0z"/></svg><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 8L2 5h4L4 8z"/></svg></span></th>
                    <th>POSITION <span class="sort-arrows"><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 0l2 3H2L4 0z"/></svg><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 8L2 5h4L4 8z"/></svg></span></th>
                    <th>ORGANIZATION <span class="sort-arrows"><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 0l2 3H2L4 0z"/></svg><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 8L2 5h4L4 8z"/></svg></span></th>
                    <th>RATING <span class="sort-arrows"><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 0l2 3H2L4 0z"/></svg><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 8L2 5h4L4 8z"/></svg></span></th>
                    <th>STATUS <span class="sort-arrows"><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 0l2 3H2L4 0z"/></svg><svg viewBox="0 0 8 8" fill="currentColor"><path d="M4 8L2 5h4L4 8z"/></svg></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>{{ $testimonial->organization ?? '-' }}</td>
                        <td>
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <svg viewBox="0 0 20 20" fill="currentColor" width="16" height="16" class="text-warning"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </td>
                        <td>
                            <span class="badge badge-{{ $testimonial->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($testimonial->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Testimonial" href="{{ route('admin.cms.testimonials.show', $testimonial) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </a>
                                <a class="act-btn edit" title="Edit Testimonial" href="{{ route('admin.cms.testimonials.edit', $testimonial) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                </a>
                                <form action="{{ route('admin.cms.testimonials.destroy', $testimonial) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Testimonial">
                                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No testimonials found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Footer / Pagination -->
        <div class="table-footer">
            <div class="showing-text">Showing page 1 of 1</div>
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
            const table = document.getElementById('testimonialsTable');
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
            const table = document.getElementById('testimonialsTable');
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
            a.download = 'testimonials.csv';
            a.click();
            window.URL.revokeObjectURL(url);
        }

        // Print table function
        function printTable() {
            const printContent = document.getElementById('testimonialsTable').outerHTML;
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Testimonials</title></head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
