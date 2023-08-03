@extends('layout')

@section('content')
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-one">
                    <h3>Coffee of the month</h3>
                </div>
                <div class="about-two">
                    <p>Phasellus fringilla enim nibh, ac pharetra nulla vestibulum ac. Donec tempor fermentum felis, non placerat sem ultrices ut. Nam molestie nunc nec felis hendrerit, in pulvinar arcu mollis. Quisque eget purus nec velit venenatis tincidunt vitae ac massa. Proin vel ornare tellus. Duis consectetur gravida tellus ut varius. Aenean tellus massa, laoreet ut euismod et, pretium id ex. Mauris hendrerit suscipit hendrerit.</p>
                    
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
                                        <label>May 29, 2015</label>
                                        <a href="{{ route('bai-viet.show', ['bai_viet' => $post->id]) }}">Đọc tiếp...</a>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                        
                    </div>
                </div>	
            </div>
            <div class="col-md-4 about-right heading">
                <div class="abt-1">
                    <h3>ABOUT US</h3>
                    <div class="abt-one">
                        <img src="images/c-2.jpg" alt="" />
                        <p>Quisque non tellus vitae mauris luctus aliquam sit amet id velit. Mauris ut dapibus nulla, a dictum neque.</p>
                        <div class="a-btn">
                            <a href="single.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="abt-2">
                    <h3>YOU MIGHT ALSO LIKE</h3>
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="single.html"><img src="images/c-12.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="might-top">
                                <h4><a href="single.html">Duis consectetur gravida</a></h4>
                                <p>Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse commodo nibh odio.</p> 
                            </div>
                            <div class="clearfix"></div>
                        </div>	
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="single.html"><img src="images/c-10.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="might-top">
                                <h4><a href="single.html">Duis consectetur gravida</a></h4>
                                <p> Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse commodo nibh odio.</p> 
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="might-grid">
                            <div class="grid-might">
                                <a href="single.html"><img src="images/c-11.jpg" class="img-responsive" alt=""> </a>
                            </div>
                            <div class="might-top">
                                <h4><a href="single.html">Duis consectetur gravida</a></h4>
                                <p> Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse commodo nibh odio.</p> 
                            </div>
                            <div class="clearfix"></div>
                        </div>							
                </div>
                <div class="abt-2">
                    <h3>ARCHIVES</h3>
                    <ul>
                        <li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
                        <li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
                        <li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
                        <li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
                        <li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
                        <li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
                        <li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
                    </ul>	
                </div>
                <div class="abt-2">
                    <h3>NEWS LETTER</h3>
                    <div class="news">
                        <form>
                            <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>			
        </div>		
    </div>
</div>
@endsection