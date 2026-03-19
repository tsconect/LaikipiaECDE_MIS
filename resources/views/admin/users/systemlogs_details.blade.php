@extends('admin.app')

@section('nav-bar')
@include('admin.layouts.sidebar')
@endsection

@section('content')
    @include('flash-message')
      <div class="card-header btn-success">
            <h5>SYSTEM LOGS</h5>
        </div>
    <div class="col-xl-12">
        <div class="card p-3">
                
                    


            <div class="row">
                <div class="col-md-6"><strong>Action:</strong></div>
                <div class="col-md-6">{{ $log->action }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>Perfomed By:</strong></div>
                <div class="col-md-6">
                    <a href="{{ route('users.show', $log->causer->id) }}">{{ $log->causer->name??'' }} {{ $log->causer->last_name??"" }}</a>
                </div>
            </div>
            {{-- <hr>
            <div class="row">
                <div class="col-md-6"><strong>Session ID</strong></div>
                <div class="col-md-6">
                    {{ $log->session_id }}  
                </div>
            </div> --}}
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>Model Table</strong></div>
                <div class="col-md-6">
                    {{ $log->model_table_name }}  
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>Description:</strong></div>
                <div class="col-md-6">{{ $log->description }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>IP Address:</strong></div>
                <div class="col-md-6">{{ $log->ip_address }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>Network:</strong></div>
                <div class="col-md-6">{{ $log->network }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6"><strong>Asset URL:</strong></div>
                <div class="col-md-6">
                    <a href="{{ url($log->asset_url) }}" target="_blank">{{ url($log->asset_url) }}</a>
                </div>
            </div>
            <hr>
            @if( $log->new_object != null)
            <div class="row">
                <div class="col-md-6"><strong>Current Record:</strong></div>
                <div class="col-md-6">
                   
                    @php
                        $newObject = json_decode($log->new_object, true);
                    @endphp
                    @if(is_array($newObject))
                        @foreach($newObject as $key => $value)
                            @if(in_array($key, ['created_at', 'updated_at']))
                                <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ \Carbon\Carbon::parse((string)$value)->format('d M Y H:i:s') }}<br>
                            @else
                                @if(is_array($value))
                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ json_encode($value) }}<br>
                                @else
                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ (string)$value }}<br>
                                @endif
                            @endif
                        @endforeach
                    @else
                        {{ (string)$log->new_object }}
                    @endif
                </div>
            </div>
            <hr>
            @endif
            @if( $log->current_object != null)
            <div class="row">
                <div class="col-md-6"><strong>
                    Previous Record:
                </strong></div>
                <div class="col-md-6">
                    @php
                        $currentObject = json_decode($log->current_object, true);
                    @endphp
                    @if(is_array($currentObject))
                        @foreach($currentObject as $key => $value)
                            @if(in_array($key, ['created_at', 'updated_at']))
                                <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ \Carbon\Carbon::parse($value)->format('d M Y H:i:s') }}<br>
                            @else
                                <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}<br>
                            @endif


                         
                        @endforeach
                    @else
                        {{ $log->current_object }}
                    @endif
                   
                </div>
            </div>
            <hr>
            @endif  


           
           
            
            
        </div>
      
        
    </div>
    </div>
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  
@endsection