@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection


@section('content')

<div class="card-body">
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form class="modern-form-shell" method="POST" action="{{ route('admin.sub-locations.store') }}">
        @csrf
        <div class="card shadow-sm mb-4">

            <div class="card-header btn-success">
                <h5 class="mb-0">Register New Sub Location</h5>
            </div>
<div class="card-body">

               <div class="row g-4">
  
                            
                                  <div class="col-md-6">
                                    <label class="form-label fw-semibold">County <span class="text-danger">*</span></label>
                                    <select name="county_id" id="countySelect" 
                                            class="form-control @error('county_id') is-invalid @enderror"
                                            required>
                                        <option value="">Select county</option>
                                            @foreach($counties as $county)
                                                <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                            @endforeach
                                    </select>
                                    @error('county_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Sub-County</label>
                                    <select name="subcounty_id" id="constituencySelect" 
                                            class="form-control @error('subcounty_id') is-invalid @enderror"
                                            >
                                        <option value="">Select sub-county</option>
                                    </select>
                                    @error('subcounty_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Ward</label>
                                    <select name="ward_id" id="wardSelect" 
                                            class="form-control @error('ward_id') is-invalid @enderror">
                                        <option value="">Select ward</option>
                                    </select>
                                    @error('ward_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            

                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Sub Loaction </label>
                                        <input name="name" id="name" placeholder="name" required type="text"
                                            class="form-control">
                                    </div>
                                </div>

                        </div>
                    </div>
     
              
                <div class="text-right p-2">
                    <button class="btn btn-success" type="submit">
                        Create
                    </button>
                </div>

            </div>

        </div>

    </form>

</div>
          
                          
      <script>
                                
    const data = {
        counties: @json($counties),
        constituencies: @json($sub_counties),
        wards: @json($wards),

    };
</script>
<script>
    // Toggle PWD fields
    function togglePWDFields() {
        const status = document.getElementById('pwd_status').value;
        const fields = document.getElementById('pwd_fields');
        fields.style.display = (status === 'Yes') ? 'flex' : 'none';
    }

   

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
     
        
        // Pre-fill PWD fields if editing
        if (document.getElementById('pwd_status').value === 'Yes') {
            document.getElementById('pwd_fields').style.display = 'flex';
        }
    });
</script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
        const countySelect = document.getElementById('countySelect');
        const constituencySelect = document.getElementById('constituencySelect');
        const wardSelect = document.getElementById('wardSelect');
       
        countySelect.addEventListener('change', function () {
            const countyId = this.value;
            constituencySelect.innerHTML = '<option value="">Select Sub County</option>';
            wardSelect.innerHTML = '<option value="">Select Ward</option>';
           
            if (countyId) {
                const constituencies = data.constituencies.filter(c => c.county_code == countyId);


                constituencies.forEach(constituency => {
                    const option = document.createElement('option');
                    option.value = constituency.constituency_id;
                    option.textContent = constituency.name;
                    constituencySelect.appendChild(option);
                });
            }
        });


        constituencySelect.addEventListener('change', function () {
            const constituencyId = this.value;
            wardSelect.innerHTML = '<option value="">Select Ward</option>';

            if (constituencyId) {
                const wards = data.wards.filter(w => w.constituency_code == constituencyId);
                wards.forEach(ward => {
                    const option = document.createElement('option');
                    option.value = ward.id;
                    option.textContent = ward.name;
                                            wardSelect.appendChild(option);
                                        });
                                    }
                                });

                              
                            });

                            </script>   
@endsection


