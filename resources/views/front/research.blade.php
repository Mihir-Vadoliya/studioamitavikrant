@extends('layouts.app')
@section('content')
	
	<div class="inside-page">
	    
	    <section class="newsPage">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6">
	                    <h1 class="title">Research</h1>
	                    <p>As a studio we believe in constantly researching on multiple aspects of living and working. We like to be connected with academia and participate in fabrication workshops across the world. This allows us to persistently innovate in design and making and bridge across disciplines within our work.</p>
	                </div>
	            </div>
	            <div class="row row-gap-5 margin-top-600">

	                <div id="filter" class="filterNav">
	                    <button class="filter-button active" data-filter="all">All</button>
	                    <button class="filter-button" data-filter="academia">Academia</button>
	                    <button class="filter-button" data-filter="projects">Projects</button>
	                </div>
	            
	                	@foreach($data as $blog)
                        <div class="col-md-3 col-sm-6 col-12 filter {{ strtolower(str_replace(',', ' ', implode(', ', $blog->category_names))) }}">
                            <a href="{{ route('researchDetails', ['researchDetails' => $blog->id, 'researchName' => str_replace(' ', '_', $blog->name)]) }}" class="newsThumb">
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