<div class="tp-header">
    <div class="d-flex align-items-center gap-3">
        @if(isset($avatar))
            <img class="tp-avatar" src="{{ $avatar }}" alt="Avatar">
        @endif
        <div>
            <div class="tp-name">
                {{ $name ?? '' }}
            </div>
            <div class="tp-meta">
                @if(isset($email))<span><i class="bi bi-envelope-fill"></i> {{ $email }}</span>@endif
                @if(isset($phone))<span><i class="bi bi-telephone-fill"></i> {{ $phone }}</span>@endif
                @if(isset($id_number))<span><i class="bi bi-credit-card-fill"></i> {{ $id_number }}</span>@endif
            </div>
        </div>
    </div>
    @if(isset($edit_url))
    <a href="{{ $edit_url }}" class="btn btn-success btn-sm">
        <i class="bi bi-pencil-fill"></i> Edit
    </a>
    @endif
</div>