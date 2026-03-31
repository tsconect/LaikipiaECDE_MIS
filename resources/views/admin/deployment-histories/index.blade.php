@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>MY DEPLOYMENT HISTORIES</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.deployment-histories.create') }}">
                    <button class="btn-new">
                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                        Add Deployment History
                    </button>
                </a>
            </div>
        </div>

        <!-- Toolbar -->
        
<div class="p-2">

        <!-- Table -->
        <table  class="data-table p-2"  id="dt-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>School Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Period</th>
                    
                    <th>File Attachment</th>
                    <th>Actions</th>
 
                </tr>
            </thead>
            <tbody>
                @foreach ($deployments as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->school->school_name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date ?? 'Present' }}</td>
                        <td>
                            @php
                                $start = \Carbon\Carbon::parse($item->start_date);
                                $end = $item->end_date ? \Carbon\Carbon::parse($item->end_date) : \Carbon\Carbon::now();
                                $period = $start->diffForHumans($end, true);
                            @endphp
                            {{ $period }}
                        </td>
                        <td>
                            @if ($item->file_attachment)
                                <a href="{{ asset('storage/' . $item->file_attachment) }}" target="_blank">
                                    View Attachment
                                </a>
                            @else
                                No Attachment
                            @endif



                        
                        <td>
                            <div class="action-btns">
                                <a class="act-btn view" title="View Document" href="{{ route('admin.user-documents.show', $item->id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </a>
                                <a class="act-btn edit" title="Edit Document" href="{{ route('admin.user-documents.edit', $item->id) }}">
                                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                </a>
                                <form action="{{ route('admin.user-documents.destroy', $item->id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this document?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn delete" title="Delete Document">
                                        <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
</div>
        <!-- Footer / Pagination -->
       
   

@endsection
