@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-8">
            <h2>Message from {{ $message->name }}</h2>
        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $message->subject }}</h5>
                    <p><strong>From:</strong> {{ $message->name }} ({{ $message->email }})</p>
                    <p><strong>Status:</strong> 
                        <span class="badge badge-{{ $message->status === 'replied' ? 'success' : ($message->status === 'closed' ? 'info' : 'warning') }}">
                            {{ ucfirst($message->status) }}
                        </span>
                    </p>
                    <p><strong>Submitted:</strong> {{ $message->created_at->format('M d, Y H:i') }}</p>
                    <hr>
                    <div class="message-content">
                        {{ $message->message }}
                    </div>
                </div>
            </div>

            @if($message->reply)
                <div class="card mb-3 border-success">
                    <div class="card-header bg-success text-white">
                        <strong>Your Reply</strong> - {{ $message->replied_at->format('M d, Y H:i') }}
                    </div>
                    <div class="card-body">
                        {{ $message->reply }}
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Actions</strong>
                </div>
                <div class="card-body">
                    @if($message->status === 'new')
                        <form action="{{ route('admin.cms.contact-messages.mark-as-read', $message) }}" method="POST" class="mb-2">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="bi bi-check2"></i> Mark as Read
                            </button>
                        </form>
                    @endif

                    @if(!$message->reply)
                        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#replyModal">
                            <i class="bi bi-reply"></i> Reply
                        </button>
                    @else
                        <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#replyModal">
                            <i class="bi bi-pencil-square"></i> Edit Reply
                        </button>
                    @endif

                    <form action="{{ route('admin.cms.contact-messages.destroy', $message) }}" method="POST" class="inline-form mt-2" onsubmit="return confirm('Delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.cms.contact-messages.reply', $message) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Reply to Message</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reply">Reply Message <span class="text-danger">*</span></label>
                            <textarea name="reply" id="reply" class="form-control" rows="4" required>{{ $message->reply }}</textarea>
                            @error('reply')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
