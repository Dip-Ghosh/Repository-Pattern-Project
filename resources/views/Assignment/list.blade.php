@extends('layouts.admin.dashboard')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-border">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Dateline</th>
                        <th>Acquistion Officer</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($data) && !empty($data))
                        @foreach($data as $datum)
                            <tr>
                                <td>{{$datum->id}}</td>
                                <td>{{$datum->dateline}}</td>
                                <td>{{$datum->acquistion_officer}}</td>
                                <td><a value="{{$datum->id}}">
                                        <i style="font-size:24px;color:red" class="fa ">&#xf014;</i>
                                    </a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>

    </div>



@endsection
