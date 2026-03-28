<div class="tp-card">
    <div class="tp-card-body">
        <ul class="nav tp-tabs" id="tabbedCardTabs">
            @foreach($tabs as $tab)
                <li class="nav-item">
                    <button class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab" data-bs-target="#{{ $tab['id'] }}">
                        @if(isset($tab['icon']))<i class="{{ $tab['icon'] }}"></i>@endif {{ $tab['label'] }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content">
            {{ $slot }}
        </div>
    </div>
</div>