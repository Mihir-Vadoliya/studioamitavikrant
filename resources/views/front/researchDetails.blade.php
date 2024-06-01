@extends('layouts.app')



@push('styles')

	<style>

		table{

			border: 0px solid #fff !important;

		}
		img, picture, svg {
		    height: auto;
		}
		</style>

@endpush



@section('content')

	

	<div class="inside-page">

	    

	    <section class="singleNewsPage">

	        <div class="container">

	            <div class="row justify-content-center">

	                <div class="col-md-7">

	                    <div class="row row-gap-5">

	                        <div class="col-12">

	                            <h1 class="title text-center">{{ $data->name }}</h1>

	                            <div class="date">

	                                {{ \Carbon\Carbon::parse($data->date)->format('F j, Y'); }}

	                            </div>

	                        </div>

	                        

	                        <div class="col-12">

	                            {!! $data->content !!}

	                        </div>



	                    </div>

	                    

	                    <div class="relatedNews">

	                        <div class="row row-gap-4">

	                            <div class="col-12">

	                                <h1 class="title2">Related posts</h1>

	                            </div>

	                            @foreach($relatedBlogs as $relatedBlog)

	                            <div class="col-md-6">

	                                <div class="box">

	                                    <a href="">

	                                        <div class="thumb">

	                                            <img src="{{ asset('/upload/images/blog/'.$relatedBlog->image)}}" class="thumbImg" alt="">

	                                        </div>

	                                        <h2>{{ $relatedBlog->name }}</h2>

	                                        <h3>{{ \Carbon\Carbon::parse($relatedBlog->date)->format('F j, Y'); }}</h3>

	                                    </a>

	                                            <a href="{{ route('researchDetails',$relatedBlog->id)}}" class="news">{{ $relatedBlog->page}}</a>

	                                </div>

	                            </div>

	                            @endforeach

	                        </div>

	                    </div>

	                    

	                </div>

	            </div>

	        </div>

	    </section>



	    <section class="postComment | padding-block-600 margin-top-600">

	        <div class="container">

	            <div class="row justify-content-center">

	                <div class="col-md-7">

	                    <div class="row">

	                        <div class="col-12">

	                            <h1 class="title2">Post a Comment</h1>

	                            <p>Your email address will not be published. Required fields are marked *</p>

	                        </div>

	                    </div>

	                    <form action="">

	                        <div class="row row-gap-3">

	                            <div class="col-md-4">

	                                <input type="text" placeholder="Name*">

	                            </div>

	                            <div class="col-md-4">

	                                <input type="text" placeholder="E-mail*">

	                            </div>

	                            <div class="col-md-4">

	                                <input type="text" placeholder="Website*">

	                            </div>

	                            <div class="col-md-12">

	                                <div class="form-check mt-3">

	                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

	                                    <label class="form-check-label" for="flexCheckDefault">

	                                    <p>Save my name, email, and website in this browser for the next time I comment.</p>

	                                    </label>

	                                </div>

	                            </div>

	                            <div class="col-md-12">

	                                <textarea placeholder="Comments"></textarea>

	                            </div>

	                            <div class="col-12">

	                                <button>Submit Comment</button>

	                            </div>

	                        </div>

	                    </form>

	                </div>

	            </div>

	        </div>

	    </section>

	    <section class="singleNewsPage">

	        <div class="container">

	            <div class="row justify-content-center">

	                <div class="col-md-7">

	                    

	                    <div class="nextPreNews py-3">

	                        <div class="row align-items-center">

	                        	<div class="col-5">

                        		@if ($previousRecord != null) 

                               	<a href="{{ route('researchDetails', ['researchDetails' => $previousRecord->id, 'researchName' => str_replace(' ', '_', $previousRecord->name)]) }}" class="navNews">

                                    <div class="arrow">

                                        <img src="{{ asset('assets/images/svg/arrow-narrow-left.svg') }}" alt="">

                                    </div>

                                    <p>PREVIOUS POST</p>

                                    <div class="thumb">

                                        <img src="{{ asset('/upload/images/blog/'.$previousRecord->image)}}" alt="">

                                    </div>

                                </a>

                            	@endif

                            </div>

                            <div class="col-2">

                                <a href="" class="allNews">

                                    <img src="{{ asset('assets/images/svg/news-menu.svg') }}" alt="">

                                </a>

                            </div>

                            <div class="col-5">

                            	@if ($nextRecord != null)

                                <a href="{{ route('researchDetails', ['researchDetails' => $nextRecord->id, 'researchName' => str_replace(' ', '_', $nextRecord->name)]) }}" class="navNews">

                                    <div class="thumb">

                                        <img src="{{ asset('/upload/images/blog/'.$nextRecord->image)}}" alt="">

                                    </div>

                                    <p>PREVIOUS POST</p>

                                    <div class="arrow">

                                        <img src="{{ asset('assets/images/svg/arrow-narrow-right.svg') }}" alt="">

                                    </div>

                                </a>

                            	@endif

	                        </div>

	                    </div>

	                </div>

	            </div>

	        </div>

	    </section>

	</div>

@endsection



@push('scripts')

	

	    <script>

	        var btnContainer = document.getElementById("filter");



	// Get all buttons with class="btn" inside the container

	var btns = btnContainer.getElementsByClassName("filter-button");



	// Loop through the buttons and add the active class to the current/clicked button

	for (var i = 0; i < btns.length; i++) {

	  btns[i].addEventListener("click", function() {

	    var current = document.getElementsByClassName("active");

	    current[0].className = current[0].className.replace(" active", "");

	    this.className += " active";

	  });

	}



	        $(document).ready(function(){



	$(".filter-button").click(function(){

	    var value = $(this).attr('data-filter');

	    

	    if(value == "all")

	    {

	        //$('.filter').removeClass('hidden');

	        $('.filter').show('1000');

	    }

	    else

	    {

	//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');

	//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');

	        $(".filter").not('.'+value).hide('3000');

	        $('.filter').filter('.'+value).show('3000');

	        

	    }

	});







	});



	    </script>

@endpush