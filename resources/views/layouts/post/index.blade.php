@extends('layouts.app')

@section('content')
@if(session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Bài viết
                </div>
                
                <div class="card-body">
            
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Tiêu đề</th>
                                <th scope="col" class="text-center">Hình ảnh</th>
                                <th scope="col" class="text-center">Mô tả ngắn</th>
                                <th scope="col" class="text-center">Danh mục</th>
                                <th scope="col" class="text-center">Sửa</th>
                                <th scope="col" class="text-center">Xóa</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($posts as $item)
                                    <tr>
                                        <th scope="row" class="text-center"> {{$item->id}} </th>
                                        <td class="text-center"> {{$item->title}} </td>
                                        <td class="text-center"> 
                                            <img src=" {{asset('uploads/'.$item->image)}} " alt="{{ $item->title }}" width="200px">
                                        </td>
                                        <td class="text-center"> {!!substr($item->short_desc,0,100)!!} </td>
                                        <td class="text-center"> {{$item->category->title}} </td>

                                        <td class="text-center">
                                            <a href="{{route('post.edit', $item->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                                        </td>
                                        <td class="text-center">
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
        </div>
    </div>
</div>
@endsection
