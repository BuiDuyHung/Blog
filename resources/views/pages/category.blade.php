@extends('layout')

@section('content')
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-one">
                    <h3> {{$title_category->title}} </h3>
                </div>
                <div class="about-two">
                    <p> {{$title_category->short_desc}} </p>
                    
                    <ul>
                        <li><p>Share : </p></li>
                        <li><a href="#"><span class="fb"> </span></a></li>
                        <li><a href="#"><span class="twit"> </span></a></li>
                        <li><a href="#"><span class="pin"> </span></a></li>
                        <li><a href="#"><span class="rss"> </span></a></li>
                        <li><a href="#"><span class="drbl"> </span></a></li>
                    </ul>
                </div>	
                <div class="about-tre">
                    <div class="a-1">
                        @foreach ($posts as $post)
                            <div class="row mt-4 mb-4">
                                <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}">
                                    <div class="col-md-6 abt-left">
                                        <img width="100%" src="{{ asset('uploads/' . $post->image) }}" alt="{{ Str::slug($post->title) }}" />
                                    </div>
                                    <div class="col-md-6 abt-left">
                                        <h6>{{ $post->category->title }}</h6>
                                        <h3>{{ $post->title }}</h3>
                                        <p>{!! $post->short_desc !!}</p>
                                        <label>{{ $post->post_date }}</label>
                                        <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}">Đọc tiếp...</a>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                        <div class="mt-3">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>	
            </div>
            <div class="col-md-4 about-right heading">
                <div class="abt-2">
                    <h3>Danh mục gợi ý</h3>
                    <ul>
                        @foreach ($category_recomment as $category)
                            <li><a href="{{ route('danh-muc.show', ['danh_muc' => $category->id, 'slug' => Str::slug($category->title)]) }}"> {{$category->title}} </a></li>
                        @endforeach
                    </ul>	
                </div>

                <div class="abt-2">
                    <h3>Bài viết xem nhiều</h3>
                    @foreach ($views_category as $view)
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="{{ route('bai-viet.show', ['bai_viet' => $view->id]) }}"><img src="{{ asset('uploads/' . $view->image) }}" class="img-responsive" alt="{{ Str::slug($view->title) }}"> </a>
                            </div>
                            <div class="might-top">
                                <h4><a href="{{ route('bai-viet.show', ['bai_viet' => $view->id]) }}">{{ $view->title }}</a></h4>
                                <p>{!! substr($view->short_desc,0,50) !!}...</p> 
                                <a href="{{ route('bai-viet.show', ['bai_viet' => $view->id]) }}">Đọc tiếp...</a>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>	
                    @endforeach   
                </div>
                
            </div>
            <div class="clearfix"></div>			
        </div>		
    </div>
</div>
@endsection