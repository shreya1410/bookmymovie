@extends('admin/layouts/app')

@section('headSection')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
@endsection

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- /.box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>

                        @if(count($errors) >0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif


                        @if (session()->has('message'))
                            <p class="alert-default-success">{{session('message')}}</p>
                        @endif
                        <form role="form" action="{{route('cast.update',$cast->id)}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Post Title</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                           value="{{$cast->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <input type="text" class="form-control" id="bio" name="bio" placeholder="bio"
                                           value="{{$cast->bio}}">
                                </div>

                                <div class="form-group">
                                    <label for="year">Birth date</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="birth date"
                                           value="{{$cast->birth_date}}">
                                </div>


                                <div class="form-group">
                                    <label for="runtime">List Of Movies</label>
                                    <input type="text" class="form-control" id="list_of_movies" name="list_of_movies" placeholder="list of movies"
                                           value="{{$cast->list_of_movies}}">
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button"  href="{{route('cast.index')}}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function (){
            $(".select2").select2();
        });
    </script>
@endsection
