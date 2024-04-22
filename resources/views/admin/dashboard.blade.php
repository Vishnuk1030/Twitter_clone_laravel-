@extends('layout.layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1 class="text-center">Dashboard</h1>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Users',
                        'icon' => 'fas fa-users',
                        'data' => $totalusers,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Ideas',
                        'icon' => 'fa-solid fa-lightbulb',
                        'data' => $totalideas,
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Comments',
                        'icon' => 'fa-solid fa-comments',
                        'data' => $totalcomments,
                    ])
                </div>


            </div>


        </div>

    </div>
@endsection
