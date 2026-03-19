@extends('admin.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Testimonials</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.cms.testimonials.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> New Testimonial
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Organization</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->position }}</td>
                            <td>{{ $testimonial->organization ?? '-' }}</td>
                            <td>
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                            </td>
                            <td>
                                <span class="badge badge-{{ $testimonial->status === 'published' ? 'success' : 'warning' }}">
                                    {{ ucfirst($testimonial->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.cms.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cms.testimonials.destroy', $testimonial) }}" method="POST" style="display:inline;">
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
                            <td colspan="6" class="text-center">No testimonials found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
