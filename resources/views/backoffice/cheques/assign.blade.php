@extends('backoffice.layouts.app')


@section('nav-bar')
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src">Laikipia CDF</div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner" style="background-color:#ffffff"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
<script>
function goBack() {
    if (document.referrer == "") {
        window.location.href = "/";
    } else {
        window.history.back();
    }
}
</script>

@include('layouts.main_nav')

</div>

@endsection

@section('content')



<div class="card">
    @include('flash-message')
    <div class="card-body p-4">
    <h2 class="card-title mb-3">Cheque Details</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Cheque Number</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->cheque_number}} 
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Amount</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->amount}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Balance</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->balance}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->status}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">School</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->school}}
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="mb-0">Number Of Students</h6>
                    </div>
                    <div class="col-sm-12 text-secondary">
                        {{$cheque->students}}
                    </div>
                </div>
                <hr>
            </div>
        </div>

       
        <hr>
       
      
        @if($cheque->amount > 0)
       
 
            <h4>Assign Students</h4>
            
            <p class="text-muted">Fill the following details.</p>

            <form action="{{ route('admin.cheques.assign.students')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="supportive_documents_attached">Select Student</label>
                            <select name="supportive_documents_attached" id="supportive_documents_attached" class="form-control" >
                                <option value="">Select Student</option>
                                @foreach($applications as $application)
                                <option value="{{$application->id}}">{{$application->student->user->first_name}} {{$application->student->user->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="approval">Amount</label>
                            <input name="amount" id="amount" placeholder="2000"  type="number" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <span class="mt-1"></span>
                            
                            <button type="button" id="addStudentBtn" class="btn btn-success mt-4">Add Student</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="cheque_id" value="{{$cheque->id}}">
            
                <div class="row">
                    <div class="col-md-8 ">
                        <P>Selected Students</P>
                        <table class="table mt-4" id="studentsTable">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Student data will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="hiddenInputsContainer">
                    <!-- Hidden inputs will be dynamically added here -->
                </div>

                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
            </form>
            @else
                <h4>The cheque Balance is 0</h4>
               
            @endif

            <div style="margin-top: 70px;"></div>
 



    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addStudentBtn = document.getElementById('addStudentBtn');
        const studentSelect = document.getElementById('supportive_documents_attached');
        const amountInput = document.getElementById('amount');
        const studentsTable = document.getElementById('studentsTable');
        const submitBtn = document.getElementById('submitBtn');
        const hiddenInputsContainer = document.getElementById('hiddenInputsContainer');
        let selectedStudents = [];

        addStudentBtn.addEventListener('click', function () {
            const selectedStudentId = studentSelect.value;
            const selectedStudentName = studentSelect.options[studentSelect.selectedIndex].text;
            const amount = amountInput.value;

            if (selectedStudentId && amount) {
                // Check if the student is already selected
                if (!isStudentSelected(selectedStudentId)) {
                    selectedStudents.push({
                        id: selectedStudentId,
                        name: selectedStudentName,
                        amount: amount
                    });

                    renderStudentsTable();
                    updateHiddenInputs();
                    clearFields();
                } else {
                    alert('This student is already selected.');
                }
            } else {
                alert('Please select a student and enter an amount.');
            }
        });

        function isStudentSelected(studentId) {
            return selectedStudents.some(student => student.id === studentId);
        }

        function renderStudentsTable() {
            studentsTable.innerHTML = ''; // Clear existing table
            selectedStudents.forEach(function (student, index) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${student.name}</td>
                    <td><input type="number" class="form-control amountInput" value="${student.amount}"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeBtn">Remove</button>
                    </td>
                `;
                studentsTable.appendChild(row);

                // Add event listener to the amount input field
                const amountInput = row.querySelector('.amountInput');
                amountInput.addEventListener('input', function () {
                    editAmount(index, this.value);
                });

                // Add event listener to the remove button
                const removeBtn = row.querySelector('.removeBtn');
                removeBtn.addEventListener('click', function () {
                    removeStudent(index);
                });
            });

            // Enable or disable submit button based on selected students
            submitBtn.disabled = selectedStudents.length === 0;
        }

        function updateHiddenInputs() {
            hiddenInputsContainer.innerHTML = ''; // Clear existing hidden inputs
            selectedStudents.forEach(function (student) {
                const hiddenStudentIdInput = document.createElement('input');
                hiddenStudentIdInput.type = 'hidden';
                hiddenStudentIdInput.name = 'student_ids[]';
                hiddenStudentIdInput.value = student.id;

                const hiddenStudentAmountInput = document.createElement('input');
                hiddenStudentAmountInput.type = 'hidden';
                hiddenStudentAmountInput.name = 'student_amounts[]';
                hiddenStudentAmountInput.value = student.amount;

                hiddenInputsContainer.appendChild(hiddenStudentIdInput);
                hiddenInputsContainer.appendChild(hiddenStudentAmountInput);
            });
        }

        function clearFields() {
            studentSelect.selectedIndex = 0;
            amountInput.value = '';
        }

        function editAmount(index, newAmount) {
            selectedStudents[index].amount = newAmount;
            updateHiddenInputs();
        }

        function removeStudent(index) {
            selectedStudents.splice(index, 1); // Remove the student at the specified index
            renderStudentsTable(); // Update the table
            updateHiddenInputs(); // Update the hidden inputs
        }

        // Prevent form submission if no students are selected
        submitBtn.addEventListener('click', function (event) {
            if (selectedStudents.length === 0) {
                event.preventDefault();
                alert('Please select at least one student.');
            }
        });
    });
</script>





  
    @endsection
