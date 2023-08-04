@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Thêm bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form autocomplete="off" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="title">Tiêu đề :</label>
                                <input type="text" class="form-control " name="title">
                            </div>

                            <div class="mb-3">
                                <label for="views">Lượt view :</label>
                                <input type="text" class="form-control " name="views">
                            </div>

                            <div class="mb-3">
                                <label for="image">Hình ảnh :</label>
                                <input type="file" class="form-control " name="image">
                            </div>

                            <div class="mb-3">
                                <label for="title">Mô tả ngắn :</label>
                                <textarea name="short_desc" class="form-control ckeditor"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="title">Nội dung :</label>
                                <textarea name="desc" class="form-control ckeditor"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="category_id">Danh mục :</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">--- Chọn danh mục ---</option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}"> {{$item->title}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            

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
