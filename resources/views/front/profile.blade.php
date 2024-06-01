@extends('layouts.app')
@section('content')
	
	<div class="inside-page">
	    <section class="padding-block-600">
	        <div class="container-xxl">
	            <div class="row justify-content-between row-gap-4">
	                <div class="col-md-4 offset-md-1">
	                    <div class="title">
	                        Profile
	                    </div>
	                    <p class="mt-3">
	                    SAV is an international architecture, interior and landscape design studio producing highly original and intra-disciplinary work.
	                    <br><br>
	                    We see our studio as a platform to explore multiple curiosities between places, stories and cultures, as well as with systems, structures and spaces.
	                    </p>
	                </div>
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/DSC5728-HDR-1536x1508.jpg') }}" alt="">
	                </div>
	            </div>
	            
	            <div class="row row-gap-4 margin-top-600">
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/02-sopanabaug-revsied-1536x1466.jpg') }}" alt="">
	                </div>
	                <div class="col-md-4 offset-md-1">
	                    <p class="mt-3 pe-md-5 mb-5">
	                    Our work is inspired from the nature and its resourceful efficiency and complex beauty.
	                    <br><br>
	                    Combining the aesthetic and materiality, advanced technology with craftsmanship and performance with pragmatism we work across scales and contexts to create designs that are evocative and extraordinary.
	                    </p>
	                    <img src="{{ asset('assets/images/profile/DULWICH01-1536x843.jpg') }}" alt="">
	                </div>
	            </div>

	            <div class="row justify-content-between row-gap-4 margin-top-600">
	                <div class="col-md-6">
	                    <p class="mt-3 mb-5 mx-md-5">
	                    Our work has grown across different continents and involves a wide range of projects from high-rises and facades to residential and mixed use masterplans from hotels and resorts to unique private houses.
	                    </p>
	                    <img src="{{ asset('assets/images/profile/1-1536x852.jpg') }}" alt="">
	                </div>
	                <div class="col-md-5">
	                    <img src="{{ asset('assets/images/profile/IMG_0367-1413x1536.jpg') }}" alt="">
	                </div>
	            </div>
	                
	            <div class="row row-gap-4 margin-top-600">
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/SAV-Unilab-Pharma-01-1536x1467.jpg') }}" alt="">
	                </div>
	                <div class="col-md-4 offset-md-1">
	                    <p class="mt-3 pe-md-5 mb-5">
	                    The studio equally works on high quality residential and workplace interiors as well as collaborates on artistic installations, exhibition designs , innovative furniture and design objects.
	                    </p>
	                    <img src="{{ asset('assets/images/profile/24.-TEXTFIELDS-1536x829.jpg') }}" alt="">
	                </div>
	            </div>
	            
	            <div class="row justify-content-between align-items-center row-gap-4 margin-top-600">
	                <div class="col-md-3 offset-md-1">
	                    <p class="mt-3 mb-5">
	                    At the core of the studio is the idea of ‘design a process’ ; wherein we practice design as process wherein the very nature of making of a project and the varied processes to do so, from inception to completion and beyond is seen as an important and defining working method within the studio.
	                    </p>
	                    <img src="{{ asset('assets/images/profile/SAV-Unilab-Pharma-13-1536x1211.jpg') }}" alt="">
	                </div>
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/DULWICH-4-1536x1318.jpg') }}" alt="">
	                </div>
	            </div>

	            <div class="row justify-content-between row-gap-4 margin-top-600">
	                <div class="col-md-3 offset-md-1">
	                    <p class="mt-3">
	                    Founded in 2011 , SAV is led by partners Amita Kulkarni and Vikrant Tike, both studied and taught at the AA School in London.
	                    <br><br>
	                    Having lived and worked in London for ten years, both partners relocated to Goa in 2015 and presently work between Goa and London .
	                    </p>
	                </div>
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/DSC5111-1-1536x1352.jpg') }}" alt="">
	                </div>
	            </div>
	            
	            <div class="row row-gap-4 margin-top-600">
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/profile/SAV-STUDIO-NEW-1-highres-1536x1465.jpg') }}" alt="">
	                </div>
	                <div class="col-md-4 offset-md-1">
	                    <p class="mt-3 pe-md-5 mb-5">
	                    The studio has offices in Goa, Mumbai and London consisting of design professionals that includes architects, designers, computational programmers and artisans has come from different parts of the world.
	                    </p>
	                    <img src="{{ asset('assets/images/profile/IMG_3344-1536x1096.jpg') }}" alt="">
	                </div>
	            </div>
	        </div>
	    </section>
	</div>
@endsection

@push('scripts')

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