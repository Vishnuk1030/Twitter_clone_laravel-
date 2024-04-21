@extends('layout.layout')

@section('title', 'Ideas | Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1 class="text-center">Ideas</h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>{{ $idea->user->name}}</td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ date('d-m-Y', strtotime($idea->created_at)) }}</td>
                            <td>
                                <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                                <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $ideas->links() }}
            </div>
        </div>

    </div>
@endsection
