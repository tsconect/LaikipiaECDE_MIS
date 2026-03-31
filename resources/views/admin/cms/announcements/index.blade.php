@extends('admin.cms.layout')

@section('cms-title', 'Announcements Management')
@section('cms-description', 'Manage public announcements and notices')
@section('hide-cms-header', true)

@section('cms-content')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>ANNOUNCEMENTS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.cms.announcements.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Announcement
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="announcementsTable">
            <thead>
                <tr>
                    <th>TITLE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>PRIORITY <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>STATUS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>START DATE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>END DATE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td><span class="badge badge-info">{{ $announcement->priority }}</span></td>
                    <td>
                        <span class="badge badge-{{ $announcement->status === 'published' ? 'success' : 'secondary' }}">
                            {{ ucfirst($announcement->status) }}
                        </span>
                    </td>
                    <td>{{ $announcement->start_date->format('M d, Y') }}</td>
                    <td>{{ $announcement->end_date->format('M d, Y') }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.cms.announcements.edit', $announcement) }}" class="act-btn edit" title="Edit Announcement">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.cms.announcements.destroy', $announcement) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="act-btn delete" title="Delete" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No announcements found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

</div>

    
@endsection