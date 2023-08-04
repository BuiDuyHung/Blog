@extends('layouts.app')

@section('content')
@if(session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Bài viết
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col" >Tiêu đề</th>
                            <th scope="col" >Lượt xem</th>
                            <th scope="col" >Hình ảnh</th>
                            <th scope="col" >Mô tả ngắn</th>
                            <th scope="col" >Danh mục</th>
                            <th scope="col" >Ngày thêm</th>
                            <th scope="col" >Sửa</th>
                            <th scope="col" >Xóa</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($posts as $item)
                                <tr>
                                    <th scope="row" > {{$item->id}} </th>
                                    <td > {{$item->title}} </td>
                                    <td > {{$item->views}} </td>
                                    <td > 
                                        <img src=" {{asset('uploads/'.$item->image)}} " alt="{{ $item->title }}" width="200px">
                                    </td>
                                    <td > {!!substr($item->short_desc,0,100)!!} </td>
                                    <td > {{$item->category->title}} </td>
                                    <td > {{$item->post_date}} </td>
                                    <td >
                                        <a href="{{route('post.edit', $item->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                                    </td>
                                    <td >
                                        <form action="{{route('post.destroy', $item->id)}}" method="POST">
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <a href="{{route('home')}}" class="btn btn-primary mb-2">Quay lại</a>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
