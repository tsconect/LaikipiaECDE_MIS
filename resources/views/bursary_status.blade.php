<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bursary Application Status</title>
</head>
<body>
<?php $auth=auth()->user();
if($auth!=null){
    $layout='front.app';
}
else{
    $layout='front.app';
}
?>

@extends($layout)

@section('content')


<div class="container">
@if(session()->has('error'))
 <div class="col-12 row ">
 <div class="col-12 alert alert-danger">
        {{ session()->get('error') }}
    </div>


 </div>
 @else
 @if(session()->has('data'))
<?php $data=session()->get('data'); ?>
<div class="col-12 alert alert-secondary ml-3 text-left">
    <h5>
        Status : {{$data->status}}
    </h5>
    <a href="view-bursary-application?bursary_ref={{$data->bursary_ref}}"><button class="btn btn-success">
        View Application
    </button></a>

  <a href="download-bursary-application?bursary_ref={{$data->bursary_ref}}">

  <button class="btn btn-success ">
        Download Application
    </button>

  </a>
</div>

 @endif
 @endif
 <div class="btn-success p-2">
    <h5 class="ml-3">
        Enter Bursary Reference Number to proceed
    </h5>
</div>
<div class="card p-3">
    <form action="" method="get" >
@csrf

<div class="row">

    <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="bursary_ref" class="">Bursary Reference</label>
                        <input name="bursary_ref" id="bursary_ref" placeholder="2023/JAN/12323" required type="text"class="form-control">
</div>
</div>
<div class="col-sm-6" >
    <div class="position-relative form-group">
        <label>Instructions</label>
        <p>Kindly input the Number Allocated to you When you submitted your
        Application, Else your birth Certifcate number </p>
    </div>
</div>
</div>
                <button class="mt-2 mb-2 btn btn-success  float-right">Submit</button>

</form>

</div>
</div>
@endsection
</body>
</html>
