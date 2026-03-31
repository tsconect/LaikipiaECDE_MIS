@extends('admin.cms.layout')

@section('cms-title', 'Contact Messages')
@section('cms-description', 'Review and manage incoming public contact messages')
@section('hide-cms-header', true)

@section('cms-content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>CONTACT MESSAGES</span></div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="contactMessagesTable">
            <thead>
                <tr>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>EMAIL <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>SUBJECT <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>STATUS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>SUBMITTED <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
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
                            <div class="action-btns">
                                <a class="act-btn view" title="View Message" href="{{ route('admin.cms.contact-messages.show', $message) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.cms.contact-messages.destroy', $message) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Message">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No messages found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

</div>

    
@endsection