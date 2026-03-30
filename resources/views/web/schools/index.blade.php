@extends('web.app')

@section('title', 'ECDE Schools')

@section('styles')
<style>
    .schools-page-wrap {
        background: linear-gradient(180deg, #f8f6f1 0%, #f1f5fa 100%);
        border: 1px solid rgba(13, 34, 53, 0.08);
        border-radius: 22px;
        box-shadow: 0 18px 36px rgba(13, 34, 53, 0.08);
        padding: 2rem;
    }

    .schools-top-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(160px, 1fr));
        gap: 12px;
        margin: 1rem 0 1.5rem;
    }

    .schools-metric {
        background: #fff;
        border: 1px solid rgba(13, 34, 53, 0.08);
        border-radius: 14px;
        padding: 0.9rem 1rem;
    }

    .schools-metric small {
        color: #6b7c8d;
        font-weight: 600;
    }

    .schools-metric strong {
        display: block;
        font-size: 1.15rem;
        color: #0d2235;
        margin-top: 0.15rem;
    }

    .filter-panel {
        background: #fff;
        border: 1px solid rgba(13, 34, 53, 0.1);
        border-radius: 14px;
        padding: 1rem;
        margin-bottom: 1.25rem;
    }

    .filter-panel .form-label {
        font-size: 0.82rem;
        color: #163348;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    .filter-panel .form-select {
        border-radius: 10px;
        border-color: rgba(13, 34, 53, 0.18);
        min-height: 42px;
    }

    #dt-basic2 {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(13, 34, 53, 0.08);
    }

    #dt-basic2 thead th {
        background: #0d2235;
        color: #fff;
        border-color: #163348;
        font-size: 0.85rem;
    }

    #dt-basic2 tbody tr:hover {
        background-color: #f2f8f4;
    }

    .school-name-cell {
        font-weight: 700;
        color: #0d2235;
    }

    .school-view-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: rgba(26, 124, 62, 0.12);
        color: #1a7c3e;
        transition: all 0.2s ease;
    }

    .school-view-btn:hover {
        background: #1a7c3e;
        color: #fff;
        transform: translateY(-1px);
    }

    @media (max-width: 900px) {
        .schools-page-wrap {
            padding: 1.1rem;
        }

        .schools-top-metrics {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="container schools-page-wrap mb-2">
    @php
        $subCountyOptions = $schools->map(fn($s) => optional($s->subCounty)->name)->filter()->unique()->sort()->values();
        $wardOptions = $schools->map(fn($s) => optional($s->ward)->name)->filter()->unique()->sort()->values();
        $subLocationOptions = $schools->map(fn($s) => optional($s->subLocation)->name)->filter()->unique()->sort()->values();
    @endphp

    <div class="page-header-container mb-4">
        <h1 class="page-title">ECDE Schools</h1>
        <p class="page-subtitle">Browse early childhood education centres across Laikipia County.</p>
        <div class="schools-top-metrics">
            <div class="schools-metric">
                <small>Total Schools</small>
                <strong>{{ $schools->count() }}</strong>
            </div>
            <div class="schools-metric">
                <small>Sub Counties</small>
                <strong>{{ $subCountyOptions->count() }}</strong>
            </div>
            <div class="schools-metric">
                <small>Wards</small>
                <strong>{{ $wardOptions->count() }}</strong>
            </div>
        </div>
    </div>

    @if($schools->count() > 0)
        <div class="row g-3 filter-panel">
            <div class="col-md-4">
                <label for="filter-sub-county" class="form-label mb-1">Sub County</label>
                <select id="filter-sub-county" class="form-select">
                    <option value="">All Sub Counties</option>
                    @foreach($subCountyOptions as $name)
                        <option value="{{ $name }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="filter-ward" class="form-label mb-1">Ward</label>
                <select id="filter-ward" class="form-select">
                    <option value="">All Wards</option>
                    @foreach($wardOptions as $name)
                        <option value="{{ $name }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="filter-sub-location" class="form-label mb-1">Sub Location</label>
                <select id="filter-sub-location" class="form-select">
                    <option value="">All Sub Locations</option>
                    @foreach($subLocationOptions as $name)
                        <option value="{{ $name }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row p-4  g-4">
            
                <div class="col-12 ">
                     <table style="width: 100%;" id="dt-basic2" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>School Name</th>
                                <th>Center Code</th>
                                <th>County</th>
                                <th>Sub County</th>
                             
                                <th>Ward</th>
                                <th>Sub Location</th>
                               
                                <th style="text-align: center;">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schools as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="school-name-cell">{{$item->school_name}}</td>
                                <td>{{$item->center_code }}</td>
                                <td>{{$item->county->name ?? ($item->subCounty->county->name ?? '-')}}</td>
                      
                                    <td>{{$item->subCounty->name ?? ($item->ward->subCounty->name??'-')}}</td>
                                    <td>{{$item->ward->name??'-'}}</td>
                                    <td>{{$item->subLocation->name??'-'}}</td>
                                <td>
                                    <div class="table-actions text-center" >
                                        <a class="school-view-btn" title="View School"
                                                href="{{ route('cms.schools.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                           
                                           
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            </tfoot>
                    </table>
                </div>
           
        </div>

    @else
        <div class="empty-state-container">
            <div class="empty-state">
                <i class="fa fa-building"></i>
                <h5 class="mb-2">No schools found</h5>
                <p class="mb-0">ECDE school records will appear here once available.</p>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
  (function () {
      const tableElement = document.getElementById('dt-basic2');
      if (!tableElement || !window.jQuery || !$.fn.DataTable) {
          return;
      }

      const table = $('#dt-basic2').DataTable();

      function escapeRegex(value) {
          return value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      }

      function applySchoolFilters() {
          const subCounty = $('#filter-sub-county').val();
          const ward = $('#filter-ward').val();
          const subLocation = $('#filter-sub-location').val();

          table.column(4).search(subCounty ? '^' + escapeRegex(subCounty) + '$' : '', true, false);
          table.column(5).search(ward ? '^' + escapeRegex(ward) + '$' : '', true, false);
          table.column(6).search(subLocation ? '^' + escapeRegex(subLocation) + '$' : '', true, false);
          table.draw();
      }

      $('#filter-sub-county, #filter-ward, #filter-sub-location').on('change', applySchoolFilters);
  })();
</script>
@endsection
