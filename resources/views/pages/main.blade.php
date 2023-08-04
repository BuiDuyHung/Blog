@extends('layout')

@section('content')
<!--banner-starts-->
@include('pages.banner')
<!--banner-end-->
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-tre">
                    <div class="a-1">
                        @foreach ($posts as $post)
                            <div class="row mt-4 mb-4">
                                <div class="col-md-6 abt-left">
                                    <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}"><img width="100%" src="{{ asset('uploads/' . $post->image) }}" alt="{{ Str::slug($post->title) }}" /></a>
                                </div>
                                <div class="col-md-6 abt-left">
                                    <h6>{{ $post->category->title }}</h6>
                                    <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}"><h3>{{ $post->title }}</h3></a>
                                    <p>{!! $post->short_desc !!}</p>
                                    <label>May 29, 2015</label>
                                    <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}">Đọc tiếp...</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    </div>
                </div>	
            </div>
            <div class="col-md-4 about-right heading">
                
                <div class="abt-2">
                    <h3>Bài viết mới nhất</h3>
                    @foreach ($news as $new)
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="{{ route('bai-viet.show', ['bai_viet' => $new->id]) }}"><img src="{{ asset('uploads/' . $new->image) }}" class="img-responsive" alt="{{ Str::slug($new->title) }}"> </a>
                            </div>
                            <div class="might-top">
                                <h4><a href="{{ route('bai-viet.show', ['bai_viet' => $new->id]) }}">{{ $new->title }}</a></h4>
                                <p>{!! substr($new->short_desc,0,50) !!}...</p> 
                                <a href="{{ route('bai-viet.show', ['bai_viet' => $new->id]) }}">Đọc tiếp...</a>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>	
                    @endforeach
                </div>

                <div class="abt-2">
                    <h3>Bài viết xem nhiều</h3>
                    <ul>
                        @foreach ($views as $view)
                            <li><a href="{{ route('bai-viet.show', ['bai_viet' => $view->id]) }}"> {{$view->title}} </a></li>
                        @endforeach
                    </ul>	
                </div>
                <div class="abt-2">
                    <h3>NEWS LETTER</h3>
                    <div class="news">
                        <form>
                            <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                            <input type="submit" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>			
        </div>		
    </div>
</div>
@endsection