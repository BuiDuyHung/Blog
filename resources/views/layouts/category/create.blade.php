@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Thêm danh mục bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('category.store')}}" method="POST">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control " name="title">
                            
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Thêm</button>
                        <a href="{{route('home')}}" class="btn btn-warning mt-2">Quay lại</a>
                        @csrf
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
