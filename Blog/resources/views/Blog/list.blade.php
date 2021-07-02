@extends('home')
@section('title', 'Danh sách blog')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Danh sách blog</h2>
        </div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Blog</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Ngày đăng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $key => $blog)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->time }}</td>
                        <td><a href="{{ route('blogs.edit', $blog->id) }}">sửa</a></td>
                        <td><a href="{{ route('blogs.delete', $blog->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Thêm mới</a>
        </div>
    </div>
@endsection
