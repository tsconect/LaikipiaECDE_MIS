@extends('web.app')
@section('title', $announcement->title)

@section('styles')
<style>
    .announcement-shell {
        max-width: 920px;
        margin: 0 auto;
        padding: 2rem 1rem 4rem;
    }

    .announcement-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .announcement-head {
        padding: 1.6rem 1.6rem 1rem;
        border-bottom: 1px solid #ecf1f7;
        background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
    }

    .announcement-title {
        font-family: 'Playfair Display', serif;
        color: var(--navy);
        font-size: clamp(1.8rem, 3.5vw, 2.5rem);
        margin-bottom: .65rem;
    }

    .announcement-meta {
        color: var(--text-muted);
        font-size: .95rem;
    }

    .announcement-body {
        padding: 1.6rem;
        line-height: 1.85;
        color: var(--text);
    }

    .announcement-body img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
    }
</style>
@endsection

@section('content')
<div class="announcement-shell">
    <div class="announcement-card">
        <div class="announcement-head">
            <h1 class="announcement-title">{{ $announcement->title }}</h1>
            <div class="announcement-meta">
                <i class="fa fa-calendar me-1"></i> Posted on {{ $announcement->created_at->format('M d, Y') }}
            </div>
        </div>
        <div class="announcement-body">
            {!! $announcement->content !!}
        </div>
    </div>
</div>
@endsection
