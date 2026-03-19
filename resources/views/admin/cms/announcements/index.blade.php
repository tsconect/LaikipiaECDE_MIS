@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Announcements</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.cms.announcements.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> New Announcement
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
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
                                <a href="{{ route('admin.cms.announcements.edit', $announcement) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cms.announcements.destroy', $announcement) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No announcements found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $announcements->links() }}
        </div>
    </div>
</div>
@endsection
