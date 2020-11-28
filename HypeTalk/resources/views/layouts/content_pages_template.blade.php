@extends('layouts.app')

@section('content')
    @yield('header')
    <main class="py-4">

        <div class="container">
            <div class = "row my-row">

                <div class="col-md-8 my-col">
                    @yield('left-side')
                </div>

                <div class="col-md-4 my-col">
                    @yield('right-side')
                </div>
            </div>
        </div>

    @yield('footer')
@endsection
