@extends('layouts.app')
@section('content')
    {{-- @include('module.editmodle') --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <div class="container">
        <br>
        <h2>Add Sales Person</h2><br><br>

        <form action="add_available" method="POST" id="myForm">
            {{-- {!! Form::open(['name' => 'add_availables', 'class' => 'add_availables']) !!} --}}

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name"> Name</label>
                            <input id="name" class="form-control input-cl" required type="text" name="name" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Routes</label>
                            <select class="form-control input-cl"  name="divition"  id="divition">
                              @foreach($types as $type)
                                  <option value="{!! $type->id !!}">{!! $type->name !!}</option>
                              @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Email</label>
                            <input id="email" class="form-control input-cl" required type="text" name="email" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">TeliPhone</label>
                            <input id="tele_no" class="form-control input-cl" required type="text" name="tele_no" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Join Date</label>
                            <input id="join_date" class="form-control input-cl" required type="date" name="join_date"
                                value="">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Comments</label><br>
                            <textarea id="comments" name="comments" rows="4" required cols="50"></textarea>
                            {{-- <input id="comments" height="248" class="form-control input-cl" type="text" name="comments" value=""> --}}
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>

            <a href="{{ url('table') }}" style="color: darkblue">
                <-Back </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                    <button class="btn btn-primary main-class" type="submit">
                        <img width="50" height="50" id="loading" src="{{ asset('images/spinner.gif') }}" alt=""
                            style="display:none;">
                        save</button>
                    <img width="50" height="50" id="ok" src="{{ asset('images/Capture.PNG') }}" alt=""
                        style="display:none;">
                    &nbsp; &nbsp; &nbsp;
                    <input type="button" class="btn btn-warning main-class" value="Reset" onclick="myFunction()" type="">

                    {{-- {!! Form::close() !!} --}}
        </form><br>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        function myFunction() {
            document.getElementById("myForm").reset();
        }

        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
    <style>
        .container {
            background-color: #a9a7b9 !important;
        }

    </style>
@endsection
