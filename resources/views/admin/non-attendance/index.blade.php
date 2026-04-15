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
                    NON-ATTENDANCE DAYS

            </div>
            <div class="banner-actions">
                <a href="{{ route('admin.non-attendance-days.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        Add Day
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table p-3 dt-admin" id="nextOfKinTable" style="min-height: 400px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Weekday</th>
                    <th>Recurring</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $day)
                    <tr id="row-{{ $day->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $day->title }}</td>
                        <td>{{ ucfirst($day->type) }}</td>
                        <td>{{ $day->date ?? '-' }}</td>
                        <td>
                            {{ $day->weekday !== null ? ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][$day->weekday] : '-' }}
                        </td>
                        <td>
                            {{ $day->is_recurring ? 'Yes' : 'No' }}
                        </td>

                        <td>
                            <div class="action-btns">
                                
                                <a class="act-btn edit" title="Edit Next of Kin" href="{{ route('admin.non-attendance-days.edit', $day->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.non-attendance-days.destroy', $day->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this next of record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
        </table>

</div>

    
@endsection