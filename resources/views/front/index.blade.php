@extends('layouts.app')
@section('content')

	    <div class="swiper homeSwiper">
	        <div class="scroll">
			    Scroll	
	        </div>
	        <div class="swiper-wrapper">
	            <!-- Slides -->
	            @foreach($projects as $key=>$value)
	            	@if (strpos($value->image, ',') !== false)
	            	    @php($projectImage = substr($value->image, 0, strpos($value->image, ',')))
	            	@else
	            	    @php($projectImage = $value->image)
	            	@endif
		            <div class="swiper-slide">
		                <img src="{{ asset('/uploads/projectGallery/'.$projectImage) }}" class="bgImg" alt="">
		                <div class="content">
		                    <ul>
		                        <li>
		                        	{{ str_replace(',', ' | ', implode(', ', $value->category_names)) }}
		                        </li>
		                    </ul>
		                    <h1>{{ $value->name }}</h1>
							
		                    <p>
		                    	{!!  substr(\App\Helpers\HtmlHelper::extractTextFromHtml($value->projectDescriptions->first()->description), 0, 120).'...' !!}
		                    </p>
		                    <div class="button">
		                        <a href="{{ route('project_details',str_replace(' ', '_', $value->name)) }}">View Project</a>
		                    </div>
		                </div>
		            </div>
		        @endforeach
	        </div>
	        <!-- If we need pagination -->
	        <div class="swiper-pagination"></div>

	        <!-- If we need navigation buttons -->
	        <div class="navigation">
	            <div class="swiper-button-prev"><img src="{{ asset('assets/images/svg/arrow-left.svg') }}" alt=""></div>
	            <div class="swiper-button-next"><img src="{{ asset('assets/images/svg/arrow-right.svg') }}" alt=""></div>
	        </div>

	        <!-- If we need scrollbar -->
	        <div class="swiper-scrollbar"></div>
	    </div>

@endsection

@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	    <script type="module">
	    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

	    const swiper = new Swiper('.homeSwiper', {
	        // Optional parameters
	        direction: 'vertical',
	        mousewheel: true,
	        allowTouchMove: true,
	        breakpoints: {
	            768: {
	                allowTouchMove: false,
	                grabCursor: false,
	                slidesPerView: 1,
	                loop: false,
	                speed: 1000,
	                shortSwipes: false,
	                allowTouchMove: false,
	            }
	        },
	        // If we need pagination
	        pagination: {
	            el: '.swiper-pagination',
	            clickable: true,
	            renderBullet: function (index, className) {
	                return '<span class="' + className + '">' + '0' + (index + 1) + "</span>";
	            },
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