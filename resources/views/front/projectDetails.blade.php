@extends('layouts.app')



@push('styles')

	<style>

		table{

			border: 0px solid #fff !important;

		}

		table td{

			padding: 30px !important;

		}

		table td{

			padding-top: 0px !important;

		font-weight: 300 !important;

		}

		.table td .table td {
			padding: 0 10px !important;
	    }

		

        img, picture, svg {

            height: auto;    

        }

        

		/* For mobile screens */

		@media screen and (max-width: 767px) {

		    .table td {

		        width: 100%;

		        display: block;

		        margin-bottom: 20px; /* Adjust spacing between items */

		    }

		}



		/* For desktop screens */

		@media screen and (min-width: 768px) {

		    .table td {

		        width: 50%; /* Display two columns */

		        float: left;

		        box-sizing: border-box;

		        padding: 0 10px; /* Adjust spacing between columns */

		    }
		    .table td .table td {

		        width: 100%; /* Display two columns */

		    }

		}

		table p, table td{

			color: #686868 !important;

		}



	</style>

@endpush



@section('content')



	<div class="singleProjectPage">

	    <div class="swiper projectSwiper">

	        <div class="swiper-wrapper">

	            <!-- Slides -->

	            <div class="swiper-slide">



	            	@if($project->image)

	            		@php

	            			$fileNamesArray = explode(",", $project->image);

	            			$projectImage = $fileNamesArray[0];

	            		@endphp

	            	@else

	            		@php($projectImage = '');

	            	@endif

	            	

	            	@if($project->image)

    	            	@foreach($fileNamesArray as $key=>$value)

    	            		

    	            		<div class="swiper-slide">

    	            		    <img src="{{ asset('/uploads/projectGallery/'.$projectImage) }}" class="bgImg" alt="">

    	            		</div>

    	            	@endforeach

    	            @endif

	                

	                <div class="content">

	                    <ul class="categories">

	                        <li>{{ str_replace(',', ' | ', implode(', ', $project->category_names)) }}</li>

	                    </ul>

	                    <h1>{{ $project->name }}</h1>

	                    <ul class="details">

	                        <li>DATE<br>

	                        <span>{{ $project->completion_date }}</span></li>

	                        <li>LOCATION<br>

	                        <span>{{ $project->location }}</span></li>

	                        <li>SIZE<br>

	                        <span>{{ $project->size }}</span></li>

	                        <li>STAGE<br>

	                        <span>{{ $project->stage }}</span></li>

	                    </ul>

	                    

	                </div>

	            </div>

	            @if($project->image)

	            	@foreach($fileNamesArray as $key=>$value)

	            		@if ($loop->first)

            		        @continue

            		    @endif

	            		<div class="swiper-slide">

	            		    <img src="{{ asset('/uploads/projectGallery/'.$value) }}" class="bgImg" alt="">

	            		</div>

	            	@endforeach

	            @endif

	            

	            

	        </div>



	        <!-- If we need navigation buttons -->

	        <div class="navigation">

	            <div class="swiper-button-prev"><img src="{{ asset('assets/images/svg/arrow-left.svg') }}" alt=""></div>

	            <div class="swiper-button-next"><img src="{{ asset('assets/images/svg/arrow-right.svg') }}" alt=""></div>

	        </div>



	        <div class="swiper-pagination"></div>

	    </div>

	    <section class="padding-block-600">

	        <div class="container">

	        	@foreach($projectDescriptions as $projectDescription)

	            <div class="row">

	                <div class="col-md-2">

	                    <div class="title">

	                        {{ $projectDescription->title }}

	                    </div>

	                </div>

	                <div class="col-md-10">

	                    <div class="row row-gap-4 justify-content-between">

	                        {!! $projectDescription->description !!}

	                    </div>

	                </div>

	            </div>

	            @endforeach

	            

	            <div class="row margin-top-600">

	                <div class="col-md-2">

	                    

	                </div>

	                <div class="col-md-10">

	                    <div class="projectSection">

	                        <div class="row row-gap-4">

	                            <div class="col-md-6">

	                                <h2 class="title2">{{ $project->project_summary_title }}</h2>

	                                <ul class="list1">

	                                    {!! $project->project_summary_details !!}

	                                </ul>

	                            </div>

	                            <div class="col-md-6">

	                                <h2 class="title2">{{ $project->project_team_title }}</h2>

	                                <ul class="list1">

	                                    {!! $project->project_team_details !!}

	                                </ul>

	                            </div>

	                            

	                        </div>

	                    </div>

	                    

	                    @if($project->publications)

	                    <div class="projectSection">

	                        <div class="row row-gap-4">

	                            <div class="col-md-6">

	                                <h2 class="title2">PUBLICATIONS</h2>

	                                <ul class="list2">

	                                    {!! $project->publications !!}

	                                </ul>

	                            </div>

	                            

	                        </div>

	                    </div>

	                    @endif

    

                        @if($project->getSimilarProjects())

	                    <div class="similarProjectSection">

	                        <div class="row row-gap-4">

	                            <div class="col-md-12">

	                                <h2 class="title2">SIMILAR PROJECTS</h2>

	                            </div>



	                            @foreach ($project->getSimilarProjects() as $image => $name)

	                            	@if (strpos($image, ',') !== false)

	                            	    @php($projectImage = substr($image, 0, strpos($image, ',')))

	                            	@else

	                            	    @php($projectImage = $image)

	                            	@endif

	                            <div class="col-md-4">

	                                <a href="{{ route('project_details',str_replace(' ', '_', $name)) }}" class="box">

	                                    <img src="{{ asset('/uploads/projectGallery/'.$projectImage) }}" alt="">

	                                    <h3>{{ $name }}</h3>

	                                </a>

	                            </div>

	                            @endforeach

	                            </div>

	                            

	                        </div>

	                    </div>

	                    @endif

	                </div>

	            </div>

	        </div>

	    </section>

	</div>



@endsection



@push('scripts')

	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	    <script type="module">

	    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'



	    const swiper = new Swiper('.projectSwiper', {

	        // Optional parameters

	        slidesPerView: 1,

	        loop: false,

	        mousewheel: false,

	        speed: 1000,

	        shortSwipes: false,

	        allowTouchMove: false,



	        // If we need pagination

	        pagination: {

	            el: ".swiper-pagination",

	            type: "fraction",

	        },



	        // Navigation arrows

	        navigation: {

	            nextEl: '.swiper-button-next',

	            prevEl: '.swiper-button-prev',

	        },



	        // And if we need scrollbar

	        scrollbar: {

	            el: '.swiper-scrollbar',

	        },

	    });

	</script>

@endpush