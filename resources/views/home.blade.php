@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <treadingmovie-component></treadingmovie-component>
{{--                    {{ __('Dashboard') }}--}}

                </div>

            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                    {{ __('You are logged in!') }}--}}
                        <showmovie-component></showmovie-component>
                </div>
            </div>

    </div>
</div>

@endsection

</script>
