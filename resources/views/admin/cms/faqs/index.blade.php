@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>FAQs</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.cms.faqs.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> New FAQ
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    @forelse($faqs as $faq)
                        <tr>
                            <td>{{ Str::limit($faq->question, 50) }}</td>
                            <td>
                                <span class="badge badge-{{ $faq->status === 'published' ? 'success' : 'warning' }}">
                                    {{ ucfirst($faq->status) }}
                                </span>
                            </td>
                            <td>{{ $faq->order }}</td>
                            <td>
                                <a href="{{ route('admin.cms.faqs.edit', $faq) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cms.faqs.destroy', $faq) }}" method="POST" style="display:inline;">
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
                            <td colspan="4" class="text-center">No FAQs found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $faqs->links() }}
        </div>
    </div>
</div>
@endsection
