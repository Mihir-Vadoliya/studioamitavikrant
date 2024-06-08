@extends('layouts.app')

@section('content')
	

	<div class="inside-page">

	    

	    <section class="newsPage">

	        <div class="container">

	            <div class="row">

	                <div class="col-md-6">

	                    <h1 class="title">News</h1>

	                    <p>We are constantly designing new things or being in the design news. Read about our latest projects, what the press worldwide have been saying about us or the design awards we have been winning.</p>

	                </div>

	            </div>

	            <div class="row row-gap-5 margin-top-600">



	                <div id="filter" class="filterNav">

	                    <button class="filter-button active" data-filter="all">All</button>

	                    <button class="filter-button" data-filter="awards">Awards</button>

	                    <button class="filter-button" data-filter="projects">Projects</button>

	                    <button class="filter-button" data-filter="publications">Publications</button>

	                    <button class="filter-button" data-filter="talks">Talks</button>

	                    <button class="filter-button" data-filter="web">Web</button>

	                </div>

	            





                    	@foreach($data as $blog)

                        <div class="col-md-3 col-sm-6 col-12 filter {{ strtolower(str_replace(',', ' ', implode(', ', $blog->category_names))) }}">

                            <a href="{{ route('newsDetails', ['newsName' => str_replace(' ', '_', $blog->name)]) }}" class="newsThumb">

                                <div class="date">{{ \Carbon\Carbon::parse($blog->date)->format('F j, Y'); }}</div>

                                <div class="thumbImg">

                                    <img src="{{ asset('/upload/images/blog/'.$blog->image)}}" class="newsImg" alt="">

                                    <div class="overlay">

                                    </div>

                                    

                                    

                                    <div class="details">

                                        <h1>{{ $blog->name }}</h1>

                                    </div>

                                </div>

                            </a>

                        </div>

                        @endforeach

	                    

	            </div>

	        </div>

	    </section>

	</div>



@endsection



@push('scripts')

	

	<script>

	    var btnContainer = document.getElementById("filter");

		var btns = btnContainer.getElementsByClassName("filter-button");



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
			    $('.filter').show('1000');
			}
			else
			{
			    $(".filter").not('.'+value).hide('3000');
			    $('.filter').filter('.'+value).show('3000');
			}
		});

	});



	</script>

@endpush