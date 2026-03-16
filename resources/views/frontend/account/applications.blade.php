@extends('frontend.app')
@section('content')

<section class="experience_section layout_padding-top layout_padding2-bottom"  style="background-color: #f5f5f5;">
    
    
    <section class="contact spad mb-4 p-4"  style="background-color: #f5f5f5;">
        <div class="container">
            <div class="row pl-4 align-items-start"> <!-- Remove 'align-items-center' class -->
                <div class="col-md-3 dashboard-menu">
                    <div class="list-group text-center">
                        <a href="{{route ('student.dashboard')}}" class="list-group-item  list-group-item-action mb-2">Dashboard</a>
                        <a href="{{ route('student.applications')}} " class="list-group-item active list-group-item-action mb-2">My Applications</a>
                        <a href=" {{route('student.profile')}}" class="list-group-item list-group-item-action mb-2">Student Profile</a>
                        <a href="{{route('student.account')}} " class="list-group-item list-group-item-action  mb-2">Account Details</a>
                        <a href=" {{route('student.logout')}}" class="list-group-item list-group-item-action mb-2">Log Out</a>

                    </div>
                </div>
                <div class="col-md-9 pl-3">
                    <div class="card p-4 mb-2">
                        <!-- <p><strong>Hello {{ Auth::user()->first_name ?? 'User'}},</strong>  <br>   </p> -->

                        <h4 class="text-center">My Applications</h4>
                        <table class="table">
                            <thead>
                                <tr style="background-color: rgba(26, 46, 53, 0.5);;">
                                    <th>Name</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $item)
                                    <tr>
                                        <td>{{ $item->bursary->name ?? 'Name not available' }}</td>
                                        <td>
                                            @if ($item->bursary)
                                                {{ now()->diffInDays($item->bursary->deadline) }} days remaining
                                            @else
                                                Deadline not set
                                            @endif
                                        </td>
                                        <td>
                                        
                                            @if ($item->status)
                                                @if ($item->status == 'pending')
                                                    <span class="badge badge-secondary">Pending</span>
                                                @elseif ($item->status == 'Cheque released')
                                                    <span class="badge  badge-success">Funds Disbursed</span>
                                                @elseif ($item->status== 'cancelled')
                                                    <span class="badge badge-secondary">Cancelled</span>
                                                @endif  
                                            @else
                                                <span class="badge badge-warning">Unknown</span>
                                            @endif
                                        </td>
                                    
                                        <td>
                                    
                                            <a type="button" class="btn btn-outline-primary" title="View Wards"
                                            href="{{route('student.application.view',$item->id)}}">
                                            <i class="fa fa-eye mr-1"></i>View 
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
           
</section>

@endsection