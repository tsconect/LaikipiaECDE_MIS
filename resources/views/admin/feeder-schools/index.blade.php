    @extends('admin.app')

    @section('nav-bar')
    @include('admin.layouts.sidebar')
    @endsection

    @section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>FEEDER SCHOOLS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.feeder-schools.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New Feeder School
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="feederSchoolsTable">
            <thead>
                <tr>
                    <th>ID <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>SCHOOL NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NO. C/ROOMS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>STATUS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>WARD <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="td-strong">{{ $item->school_name }}</td>
                        <td>{{ $item->number_of_classes }}</td>
                        <td>{{ str_replace('_', ' ', $item->class_rooms_status) }}</td>
                        <td>{{ $item->ward->name ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View School" href="{{ route('admin.feeder-schools.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit School" href="{{ route('admin.feeder-schools.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.feeder-schools.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this feeder school?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete School">
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