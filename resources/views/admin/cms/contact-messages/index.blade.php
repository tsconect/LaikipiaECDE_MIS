@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Contact Messages</h2>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>
                                <span class="badge badge-{{ $message->status === 'replied' ? 'success' : ($message->status === 'closed' ? 'info' : 'warning') }}">
                                    {{ ucfirst($message->status) }}
                                </span>
                            </td>
                            <td>{{ $message->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.cms.contact-messages.show', $message) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.cms.contact-messages.destroy', $message) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
</div></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No messages found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
