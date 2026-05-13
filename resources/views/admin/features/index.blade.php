@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>
                    FEATURES</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.features.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Feature
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class=" dt-admin p-4" id="jobGroupsTable">
             <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Layout</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($features as $feature)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($feature->image)
                                    <img src="{{ asset('storage/' . $feature->image) }}"  width="40" alt="{{ $feature->title }}"
                                         class="feature-img">
                                @endif
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $feature->title }}
                                </div>

                                <small class="text-muted">
                                    {{ Str::limit($feature->description, 60) }}
                                </small>
                            </td>

                            <td>
                                <span class="badge bg-dark badge-layout">
                                    {{ ucfirst($feature->layout) }}
                                </span>
                            </td>

                            <td>
                                {{ $feature->position }}
                            </td>

                            <td>
                                @if($feature->is_active)
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Hidden
                                    </span>
                                @endif
                            </td>
                            <td>
                                
                            <div class="action-btns">
                                <a class="act-btn view" title="View Job Group" href="{{ route('admin.features.edit', $feature->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Job Group" href="{{ route('admin.features.edit', $feature->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this job group?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Job Group">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>

                            </td>
                            
                  


                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center py-5">
                                No features found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

        </table>

</div>

    
@endsection