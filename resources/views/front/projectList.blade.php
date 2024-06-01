@extends('layouts.app')
@section('content')
	<div class="inside-page">
		<section class="projectsPage">
		    <div class="container">
		        <div class="row row-gap-4">

		            <div id="filter" class="filterNav">
		                <button class="filter-button active" data-filter="all">All</button>
		                <button class="filter-button" data-filter="architecture">Architecture</button>
		                <button class="filter-button" data-filter="installations">Installations</button>
		                <button class="filter-button" data-filter="interiors">Interiors</button>
		                <button class="filter-button" data-filter="landscape">Landscape</button>
		                <button class="filter-button" data-filter="masterplan">Masterplan</button>
		                <button class="filter-button" data-filter="objects">Objects</button>
		            </div>
		        

		            	@foreach($project as $projects)
		            		@if (strpos($projects->image, ',') !== false)
		            		    @php($projectImage = substr($projects->image, 0, strpos($projects->image, ',')))
		            		@else
		            		    @php($projectImage = $projects->image)
		            		@endif
		                <div class="col-md-4 col-sm-6 col-12 filter {{ strtoLower(str_replace(',', ' ', implode(', ', $projects->category_names))) }}">
		                    <a href="{{ route('project_details',str_replace(' ', '_', $projects->name)) }}" class="productThumb">
		                        <div class="thumbImg">
		                            <img src="{{ asset('/uploads/projectGallery/'.$projectImage) }}" class="projectImg" alt="">
		                            <div class="overlay">
		                            </div>
		                            <div class="plus"><img src="{{ asset('assets/images/svg/plus-circle.svg') }}" alt=""></div>
		                        </div>
		                        <div class="details">
		                            <h1>{{ $projects->name }}</h1>
		                            <ul>
		                                	<li>{{ str_replace(',', ' | ', implode(', ', $projects->category_names)) }}</li>
		                            </ul>
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