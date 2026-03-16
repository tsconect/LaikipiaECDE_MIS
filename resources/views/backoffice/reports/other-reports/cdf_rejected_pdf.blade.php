<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    .text-center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div >
    <div class="text-center mt-4">
        <img src="{{ asset('images/laikipia.png')}}"  style="border-radius: 20px;" >
        <h2 style="color: #2263af;">Laikipia CDF Bursary</h2>
        <!-- <p style="color: #b75c59;">We seek to meet your financial needs</p> -->
    </div>
</div>

<div>

    <table class="">
        <caption>
           CDF Rejected Applications as of {{date("Y-m-d")}}
        
        </caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Institution</th>
                <th>Location</th>
                <th>Percentage</th>
                <th>Justification</th> 

            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <?php
            $parent = App\Models\StudentParents::where('application_id', $item->id)->first();
            $review = App\Models\ChiefsReview::where('application_id', $item->id)->first();
            $location = App\Models\Location::where('id', $item->student->location)->first();
            $committed_review = App\Models\CommitteeReview::where('application_id', $item->id)->first();
            ?>
            
            <tr>
                <td>{{$item->student->user->first_name??"null"}} {{$item->student->user->last_name??'null'}}</td>
                {{-- <!-- <td>{{ $review->created_at->diffForHumans() }}</td> -->

                <!-- <td> {{$item->student->user->phone_number}}</td> -->
                --}}
                <td>  {{$item->schoolDetails->school_name ?? 'Blank'}}</td>
                <td>{{$location->name??'NULL'}} </td>
                <td>{{$committed_review->percentage??'NULL'}}</td>
                <td> {{$committed_review->remark??'NULL'}}</td>
                

            </tr>
            @endforeach

        </tbody>
    </table>
</div>