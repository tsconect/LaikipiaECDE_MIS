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


<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">General Report</div>

                <div class="card-body">
  
    

                    <div class="col-sm-12 col-md-12">
                        <div class="mb-3 card">
                            <div class="card-body">
                                <div class="widget-chart widget-chart2 text-left p-0">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mt-0">
                                                    <div class="widget-chart-flex">
                                                        <div>
                                                            <small class="opacity-5">KES</small>
                                                            <span>{{ number_format($cheques->sum('amount')) }}</span>
                                                        </div>
                                                        <div class="widget-title ml-2 opacity-5 font-size-lg text-muted">
                                                            Total Amount Disbursed</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <div id="dashboard-sparkline-carousel-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.rejected')}}">

                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Rejected Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count($rejected_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-danger pl-2">{{ count($rejected_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
    
    
                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.approved')}}">
                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Approved Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count( $approved_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-primary pl-2">{{ count($approved_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4" >
                            <a class="anchor" href=" {{route ('admin.reports.bursary.pending')}}">

                                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card" style="background-color: azure;">
                                    <div class="widget-chat-wrapper-outer" >
                                        <div class="widget-chart-content" >
                                            <h6 class="widget-subheading">Pending Applications</h6>
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers mb-0 w-100">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5"></small>
                                                            {{ count($pending_applications) }}
                                                        </div>
                                                        <div class="ml-auto">
                                                            <div
                                                                class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                                                <span class="text-success pl-2">{{ count($pending_applications) / count($all_applications ) * 100}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    
            
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Education Level Distribution</div>

                <div class="card-body mb-2">
                              
                <div class="alert alert-success" role="alert">
                           Distribution Of all apllications across different eductaion levels
                        </div>
  
                        <div id='levelDistributionChart'><!-- Plotly chart will be drawn inside this DIV --></div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">locational Distribution</div>

                <div class="card-body">
  
                        <div class="alert alert-success" role="alert">
                           Distribution Of all apllications across all wards
                        </div>


                        <div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Other  Reports</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rejected Applications (Chief)</td>
                                <td>A report of all the applications which were rejected by the chiefs</td>
                                <td><a href="{{route('admin.reports.chief.rejected')}}" class="btn btn-view">VIEW</a></td>
                            </tr>
                            <tr>
                                <td>Rejected Applications (CDF committee)</td>
                                <td>A report of all the applications which were rejected by the cdf committee</td>
                                <td><a href="{{route('admin.reports.cdf.rejected')}}" class="btn btn-view">VIEW</a></td>
                            </tr>
                            <tr>
                                <td>Registred Students</td>
                                <td>A report of all registered students and their details</td>
                                <td><a href="{{route('admin.reports.students.registered')}}" class="btn btn-view">VIEW</a></td>
                            </tr>
                            <tr>
                                <td>Registered Chiefs</td>
                                <td>A report of all registered chiefs and their locations</td>
                                <td><a href="{{route('admin.reports.chiefs.registered')}}"  class="btn btn-view">VIEW</a></td>
                            </tr>
                            <!-- <tr>
                                <td>Interest Income Report</td>
                                <td>A report on interest collected from different accounts</td>
                                <td><a type="button" class="btn btn-view">VIEW</a></td>
                            </tr>
                            <tr>
                                <td>Commission Income Report</td>
                                <td>A report on the commissions acquired from different accounts</td>
                                <td><button type="button" class="btn btn-view">VIEW</button></td> -->
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<style>


.anchor {
    text-decoration: none;
}

a:hover, a:focus {
    background-color: #2A6496;
    text-decoration: none;
}

  
  .table {
      margin-top: 20px;
      border-collapse: separate;
      border-spacing: 0 1em;
  }
  .table th, .table td {
      border-top: none;
  }
  .table thead th {
      border-bottom: 2px solid #dee2e6;
  }
  .btn-view {
      color: #fff !important;
      background-color: #17a2b8; 
      border: none;
      border-radius: .25rem;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      text-align: center;
      vertical-align: middle;
  }
 



</style>
<script src='https://cdn.plot.ly/plotly-2.29.1.min.js'></script>

<script>

var wardCountsArray = <?php echo json_encode($wardCountArray); ?>;
var wards = Object.keys(wardCountsArray);
var counts = Object.values(wardCountsArray);

var data = [];

for (var i = 0; i < wards.length; i++) {
  var trace = {
    x: [wards[i]],
    y: [counts[i]],
    type: 'bar',
    marker: {
      color: getRandomColor(), // Use random color for each ward
    }
  };
  data.push(trace);
}

var layout = {
  title: 'Ward Distribution Chart',
  xaxis: {title: 'Wards'},
  yaxis: {title: 'Number of Applications'}
};

Plotly.newPlot('myDiv', data, layout);




var levelCountsArray = <?php echo json_encode($levelCountsArray); ?>;
var levels = Object.keys(levelCountsArray);
var counts = Object.values(levelCountsArray);

var data = [];

for (var i = 0; i < levels.length; i++) {
  var trace = {
    x: [levels[i]],
    y: [counts[i]],
    type: 'bar',
    name: levels[i], // Use level as the name for legend
    marker: {
      color: getRandomColor(), // Use random color for each level
    }
  };
  data.push(trace);
}

var layout = {
  title: 'Level Distribution Chart',
  xaxis: {title: 'Levels'},
  yaxis: {title: 'Number of Applications'}
};

Plotly.newPlot('levelDistributionChart', data, layout);

// Function to generate random color
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}



    
</script>

@endsection
