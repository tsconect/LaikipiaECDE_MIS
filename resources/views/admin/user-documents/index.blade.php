@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>MY DOCUMENTS</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.user-documents.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        Add Document
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="userDocumentsTable">
            <thead>
                <tr>
                    <th>S/N <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>CREATED ON <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>NAME <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>FILE <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->document->name }}</td>
                        <td>
                            @if ($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                    <i class="bi bi-circle"></i>
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Document" href="{{ route('admin.user-documents.show', $item->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="act-btn edit" title="Edit Document" href="{{ route('admin.user-documents.edit', $item->id) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.user-documents.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this document?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Document">
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