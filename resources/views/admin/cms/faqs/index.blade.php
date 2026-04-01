@extends('admin.cms.layout')

@section('cms-title', 'FAQs Management')
@section('cms-description', 'Create, organize, and publish frequently asked questions')
@section('hide-cms-header', true)

@section('cms-content')
    <div class="table-card">
        <!-- Banner with title + action buttons -->
        <div class="table-banner">
            <div class="table-banner-title"><span>FAQs</span></div>
            <div class="banner-actions">
                <a href="{{ route('admin.cms.faqs.create') }}">
                    <button class="btn-new">
                        <i class="bi bi-plus-lg"></i>
                        New FAQ
                    </button>
                </a>
            </div>
        </div>

        <!-- Table -->
        <table class="data-table dt-admin" id="faqsTable">
            <thead>
                <tr>
                    <th>QUESTION <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>STATUS <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ORDER <span class="sort-arrows"><i class="bi bi-caret-up-fill"></i><i class="bi bi-caret-down-fill"></i></span></th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
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
                        <div class="action-btns">
                            <a href="{{ route('admin.cms.faqs.edit', $faq) }}" class="act-btn edit" title="Edit FAQ">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.cms.faqs.destroy', $faq) }}" method="POST" class="inline-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="act-btn delete" title="Delete" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No FAQs found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

</div>
@endsection