<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<!--/head-->

<body>
    <div class="container-fliud stu-style">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3> Add Student </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label>Student ID</label>
                                <input type="text" class="form-control" id="student_id" name="student_id"
                                    placeholder="Enter your Student ID">
                            </div>
                            <div class="form-group">
                                <label>Session</label>
                                <input type="text" class="form-control" id="session" name="session"
                                    placeholder="Enter your Session">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter your Mobile">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    name="email" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3> Student List </h3>
                    </div>
                    @include('messages')
                    @php
                        $i=1;
                    @endphp
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-responsive-md table-striped">
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Session</th>
                                <th>Mobile</th>
                                {{-- <th>Email</th> --}}
                                <th>Action</th>
                            </tr>
                            @foreach ($students as $student)
                            <tr>
                            <th>{{$i++}}</th>
                                <th>{{$student->name}}</th>
                                <th>{{$student->student_id}}</th>
                                <th>{{$student->session}}</th>
                                <th>{{$student->mobile}}</th>
                                {{-- <th>{{$student->email}}</th> --}}
                                <th>
                                <a href="{{route('edit',$student->id)}}"
                                        class="btn btn-success">Edit</a>
                                <a href="#deleteModal{{$student->id}}" data-toggle="modal"
                                        class="btn btn-danger">Delete</a>
                                    <!-- Button trigger modal -->
                                    <!-- The Modal -->
                                <div class="modal" id="deleteModal{{$student->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Message</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Are you sure to delete this product permanently?
                                                </div>
                                                <!-- Modal footer -->
                                            <form action="{{route('delete',$student->id)}}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
