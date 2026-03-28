@extends('admin.app')


@section('nav-bar')
    @include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')




    <div class="app-main__inner">

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">

                        {{-- {{ $vtc }} --}}

                        <div class="">
                            <div class="card-hover-shadow profile-responsive card-border border-success mb-3 card">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-success">
                                        <div class="menu-header-content">
                                            <div class="avatar-icon-wrapper btn-hover-shine mb-2 avatar-icon-xl">

                                                {{-- {{ $data-> }} --}}
                                                <div class="avatar-icon rounded">
                                                    <img src="
                                                    https://png.pngtree.com/png-clipart/20190115/ourlarge/pngtree-graduation-school-student-the-university-png-image_352926.jpg
                                                    "
                                                        alt="Avatar 6">
                                                </div>
                                            </div>
                                            {{-- <div>
                                                <h5 class="menu-header-title">{{ $data->user->name }}</h5>
                                                <h5 class="menu-header-title">{{ $data->user->role }}</h5>
                                                <h6 class="menu-header-subtitle">{{ $data->user->email }}</h6>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tab-2-eg1">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                {{-- <div class="widget-content-left">
                                                                    <img class="rounded-circle"
                                                                        src="
                                                                    https://cdn-icons-png.flaticon.com/512/65/65581.png
                                                                    "
                                                                        alt="" width="52">
                                                                </div> --}}
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">
                                                                    <table class="mb-0 table table-borderless">
                                                                        <tbody>

                                                                            <tr>
                                                                                <td>Names: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->name }}</b>
                                                                                </td>
                                                                                <td> Reg Number: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->registration_number }}
                                                                                    </b> </td>
                                                                                <td> P.O Box: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->p_o_box }}
                                                                                    </b> </td>
                                                                            </tr>
                                                                        </tbody>

                                                                        <tbody>

                                                                            <tr>
                                                                                {{-- <td><b>Usname:</b> </td> --}}
                                                                                <td> Area In Hec's: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->area_in_hectares }}
                                                                                    </b> </td>
                                                                                <td> Legal Ownership: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->legal_ownership }}
                                                                                    </b> </td>
                                                                                <td> Infrastracture: &nbsp;&nbsp; <b
                                                                                        class="text-success">{{ $vtc->infrastracture }}
                                                                                    </b> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div style="height: 27%;" class="main-card mb-3 card">
                            <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate">
                                </i>Contact Teacher Details
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
                                        <div class="card-body">
                                            <table class="mb-0 table table-borderless">
                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td> Designation: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->designation }} </b> </td>
                                                        <td> Full Names: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->full_names }} </b> </td>
                                                    </tr>
                                                </tbody>

                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td> ID Number: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->id_number }} </b> </td>
                                                        <td> kra: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->kra_pin }}</b> </td>
                                                    </tr>
                                                </tbody>

                                                <tbody>

                                                    <tr>
                                                        {{-- <td><b>Usname:</b> </td> --}}
                                                        <td> Phone No: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->phone_number }} </b> </td>
                                                        <td> TSC Number: &nbsp;&nbsp; <b
                                                                class="text-success">{{ $vtc->tsc_number }} </b> </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="d-block text-right card-footer">
                                <a href="javascript:void(0);" class="btn-wide btn btn-success">Save</a>
                            </div> --}}
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 card">

                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-graduation-hat icon-gradient bg-love-kiss"> </i>
                                    VTC Dash:
                                </div>

                            </div>

                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                <div class="no-gutters row">
                                <div class="col-sm-6">
                                <div class="p-1">

                                    {{-- <span class="lnr lnr-apartment"></span> --}}

                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                <i class="lnr-apartment text-dark opacity-7 btn-icon-wrapper mb-2"></i> Departments: &nbsp;  {{ count(App\Models\VTC::find($vtc->id)->departments) }}
                                </button>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="p-1">
                                    {{-- <span class="lnr lnr-graduation-hat"></span> --}}
                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                <i class="lnr-license text-dark opacity-7 btn-icon-wrapper mb-2"></i> Courses: &nbsp; {{ count(App\Models\VTC::find($vtc->id)->courses) }}
                                 </button>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="p-1">
                                    {{-- <span class="lnr lnr-license"></span> --}}
                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                <i class="lnr-graduation-hat text-dark opacity-7 btn-icon-wrapper mb-2"></i> Teachers: &nbsp; {{ count(App\Models\VTC::find($vtc->id)->teachers) }}
                                </button>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="p-1">
                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                <i class="lnr-user text-dark     opacity-7 btn-icon-wrapper mb-2"> </i>Other staff: <b class="text-success" >
                                    {{-- 798256 --}}
                                    {{ count(App\Models\VTC::find($vtc->id)->other_staffs) }}
                                </b>
                                </button>
                                </div>
                                </div>
                                </div>
                                </div>
                                </li>

                            <div class="widget-chart widget-chart2 text-left p-0">
                                <div class="widget-chat-wrapper-outer ml-4">

                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                        <div id="dashboard-sparkline-carousel-3"></div>
                                    </div>

                                    <div class="m-3 p-2">

                                        <center>

                                            <a style="width: 70%;" href="{{ url('admin/new-vtc_dept/?vtc=' . $vtc->id) }}"
                                                class="btn btn-success">
                                                <i class="fa fa-plus"></i>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                Add a Department </a>
                                        </center>
                                        <br>
                                        <center>

                                            <a style="width: 70%;" href="{{ url('admin/new-vtc_teachers?vtc_id=' . $vtc->id) }}"
                                                class="btn btn-success">
                                                <i class="fa fa-plus"></i>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                Add a Teacher </a>
                                        </center>
                                        <br>
                                        <center>

                                           <a style="width: 70%;" href="{{ url('admin/new-vtc_courses?dpt=' . $vtc->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-plus"></i>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                Add a Course </a>
                                        </center>

                                        <br>
                                        <center>

                                           <a style="width: 70%;" href="{{ url('admin/vtc_create_students?vtc=' . $vtc->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-plus"></i>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;

                                                Add a Student </a>
                                        </center>
                                        <br>
                                        <center>

                                           <a style="width: 70%;" href="{{ url('admin/new-other_vtc_staff?vtc=' . $vtc->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-plus"></i>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;

                                                Add another staff </a>
                                        </center>

                                    </div>

                                </div>
                            </div>

                            <div class="d-block text-right card-footer">
                                {{-- $data->education->doc_path
                                <a href="{{ url('admin/download?cert='.$data->education->doc_path) }}" class="btn-wide btn-shadow btn btn-danger lnt lnr-download" > &nbsp;&nbsp;  Download Teacher Academic Certification.</a> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- {{count( App\Models\VTC::find($vtc->id)->students )}} --}}


        <div class="main-card mb-3 card table-card">
            <div class="card-body">
                <h5 class="card-title">VTC overview</h5>
                <div class="mb-3">
                    <div role="group" class="btn-group-sm nav btn-group">
                        <a data-toggle="tab" href="#tab-eg12-0" class="btn-pill pl-3 btn btn-success active ">VTC
                            Departments</a>
                        <a data-toggle="tab" href="#tab-eg12-1" class="btn btn-success ">VTC Courses</a>
                        <a data-toggle="tab" href="#tab-eg12-2" class="btn-pill pr-3 btn btn-success">VTC Student</a>
                        <a data-toggle="tab" href="#tab-eg12-3" class="btn-pill pr-3 btn btn-success">VTC Teacher</a>
                        <a data-toggle="tab" href="#tab-eg12-4" class="btn-pill pr-3 btn btn-success">VTC Other Staff</a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg12-0" role="tabpanel">

                        <table id="example"
                            class="data-table">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Name</th>
                                    <th>capacity</th>

                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\VTC::find($vtc->id)->departments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->department_name }}</td>
                                        <td>{{ $item->capacity }}</td>

                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-primary"
                                                title="Add Courses In {{ $item->department_name }} dptmnt"
                                                href="{{ url('admin/new-vtc_courses?dpt=' . $item->id) }}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <a class="btn btn-outline-primary" title="Edit Constituency"
                                                href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->

                                            <a class="btn btn-outline-primary" title="Delete Constituency"
                                                href="{{ route('admin.delete-constituency', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
</div></td>
                                    </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane " id="tab-eg12-1" role="tabpanel">
                        <table id="example"
                            class="data-table">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>course_name</th>
                                    <th>duration</th>
                                    <th>examination_body_or_creteria</th>

                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\VTC::find($vtc->id)->courses as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->course_name }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>{{ $item->examination_body_or_creteria }}</td>

                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-primary" title="View Wards"
                                                href="{{ route('admin.wards.all', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-primary" title="Edit Constituency"
                                                href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->

                                            <a class="btn btn-outline-primary" title="Delete Constituency"
                                                href="{{ route('admin.delete-constituency', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
</div></td>
                                    </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-eg12-2" role="tabpanel">
                        <table id="example"
                            class="data-table">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Full Names</th>
                                    <th>Reg No</th>

                                    <th>Gender</th>
                                    {{-- <th>School Posted</th> --}}
                                    <!-- <th>Age</th>  -->
                                    <!-- <th>TSC Number</th>  -->
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\VTC::find($vtc->id)->students as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->first_name . ' ' . $item->user->middle_name . ' ' . $item->user->last_name }}
                                        </td>
                                        <td>{{ $item->identity_number }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" title="View teacher's metadata"
                                                href="{{ route('admin.teacher-view', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a class="btn btn-outline-primary" title="Edit Teacher"
                                                href="{{ route('admin.teacher-edit-view', $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-outline-primary" title="Delete Teacher"
                                                href="{{ route('admin.teachers.delete', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
</div></td>
                                    </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab-eg12-3" role="tabpanel">
                        <table id="example"
                            class="data-table">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Name</th>
                                    <th>tsc_number</th>

                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\VTCTeacher::where('school_id', $vtc->id)->get() as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->full_names }}</td>
                                        <td>{{ $item->tsc_number ?? 'n/a' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-primary"
                                                title="View teachers profile"
                                                href="{{ route('admin.vtc-teacher-view', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-primary" title="Edit teachers profile"
                                                href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->

                                            <a class="btn btn-outline-primary" title="Delete teachers profile"
                                                href="{{ route('admin.delete-constituency', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
</div></td>
                                    </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab-eg12-4" role="tabpanel">
                        <table id="example"
                            class="data-table">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Name</th>
                                    <th>id_number</th>

                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\OtherVTCStaff::where('school_id', $vtc->id)->get() as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->full_names }}</td>
                                        <td>{{ $item->id_number ?? 'n/a' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-primary"
                                                title="View teachers profile"
                                                href="{{ route('admin.vtc-teacher-view', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-primary" title="Edit teachers profile"
                                                href="{{ url('admin/constituency/edit/' . $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Button trigger modal -->

                                            <a class="btn btn-outline-primary" title="Delete teachers profile"
                                                href="{{ route('admin.delete-constituency', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
</div></td>
                                    </tr>
                                @endforeach

                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
