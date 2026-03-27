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
      
        <form action="{{ route('admin.learner-attendances.store') }}" method="POST">
            @csrf

            <div class="card p-2">
                <div class="card-header">
                    <h5>Mark Attendance </h5>
                </div>
                    @if($learners->isEmpty())
                    <div class="alert alert-danger">
                        <p>No learners found.</p>
                    </div>
                @else
                <div class="card-body table-responsive">
                    <div class="mb-3">
                        <label class="form-label">Select Date</label>
                        <input type="date" 
                            name="date" 
                            class="form-control @error('date') is-invalid @enderror"
                            value="{{ old('date', date('Y-m-d')) }}"
                            max="{{ date('Y-m-d') }}"> <!-- 🚫 prevents future dates -->
                        
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Learner</th>
                                <th>Status</th>
                                <th>Reason (if absent)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($learners as $learner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $learner->first_name }} {{ $learner->middle_name }}  {{ $learner->last_name }}</td>

                                <!-- Status -->
                                <td>
                                    <select name="attendance[{{ $learner->id }}][status]" class="form-control status-select">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                    </select>
                                </td>

                                <!-- Reason -->
                                <td>
                                    <input type="text"
                                        name="attendance[{{ $learner->id }}][reason]"
                                        class="form-control reason-input"
                                        placeholder="Enter reason"
                                        disabled>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

       
                  <div class="text-right p-2">
                  
                        <button class="btn btn-success">Save Attendance</button>
                    
                </div>
            </div>
        </form>
        @endif

    </div>
       <script>
document.querySelectorAll('.status-select').forEach((select) => {
    select.addEventListener('change', function () {
        let row = this.closest('tr');
        let reasonInput = row.querySelector('.reason-input');

        if (this.value === 'absent') {
            reasonInput.disabled = false;
            reasonInput.setAttribute('required', 'required'); // 👈 force input
        } else {
            reasonInput.disabled = true;
            reasonInput.removeAttribute('required'); // 👈 remove requirement
            reasonInput.value = '';
        }
    });
});
</script>         
     


@endsection


