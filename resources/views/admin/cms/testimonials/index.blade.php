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
                        <i class="bi bi-plus-lg"></i>
                        New Testimonial
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="testimonialsTable">
            <thead>
                <tr>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>POSITION <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ORGANIZATION <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>RATING <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>STATUS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
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
                                <i class="bi bi-circle text-warning"></i>
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
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Testimonial" href="{{ route('admin.cms.testimonials.edit', $testimonial) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.cms.testimonials.destroy', $testimonial) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Testimonial">
                                        <i class="bi bi-trash"></i>
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

</div>

    
@endsection