@extends('layout')

@section('content')
<div class="single">
    <div class="container">
        <div class="col-md-8 about-left">
          <div class="single-top">
            <div class="single-grid">
              <h1> {{$post->title}} </h1>	
              <ul class="blog-ic">
                <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
                  <li><span><i class="glyphicon glyphicon-time"> </i>{{$post->post_date}}</span></li>		  						 	
                  <li><span><i class="glyphicon glyphicon-eye-open"> </i>Views: {{$post->views}} </span></li>
              </ul>
            </div>

            <a href="#"><img class="img-responsive" src="{{ asset('uploads/' . $post->image) }}" alt=" {{ Str::slug($post->title) }} "></a>
            <div class="single-grid">
              {!!$post->desc!!}		  						
            </div>
          </div>

          <div class="comments heading">
              <h3>Bình luận về bài viết</h3>
              
          </div>

          <div class="comment-bottom heading">
              <h3>Bình luận</h3>
              <form>	
                  <input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
                  <input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
                  <input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
                  <textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                  <input type="submit" value="Gửi">
              </form>
          </div>
        </div>
        
        <div class="col-md-4 about-right heading"> 
          <div class="abt-2">
              <h3>Bài viết liên quan</h3>

              @foreach ($post_related as $new)
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
        </div>
    </div>					
</div>
@endsection