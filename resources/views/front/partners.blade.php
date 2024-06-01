@extends('layouts.app')
@section('content')
	
	<div class="inside-page">
	    <section class="padding-block-600">
	        <div class="container-xxl">
	            <div class="row justify-content-between row-gap-4">
	                <div class="col-md-4 offset-md-1">
	                    <div class="title">
	                        Partners
	                    </div>
	                    <p class="mt-3">
	                    Founded in 2011 , SAV is led by partners Amita Kulkarni and Vikrant Tike, both studied and taught at the AA School in London.
	                    <br><br>
	                    Having lived and worked in London for ten years, both partners relocated to Goa in 2015 and presently work between Goa and London.
	                    </p>
	                </div>
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/partners/patners-hero.jpg') }}" alt="">
	                </div>
	            </div>
	            
	            <div class="row row-gap-4 justify-content-around margin-top-600">
	                <div class="col-md-4">
	                    <div>
	                        <h1 class="title">Amita Kulkarni</h1>
	                        <p class="mt-3">Amita Kulkarni is the co-founder and Principal Architect at SAV. She completed her Masters in Architecture and Urbanism at the AA School of Architecture, London in 2005 after being qualified as an architect in Mumbai in 2003. She is a Registered Architect with the Council of Architecture, India and is a qualified RIBA Part III. At SAV, Amita overseas the design, production and execution of all architectural projects.
	                            <br><br>
	                        Prior to founding SAV she worked at Zaha Hadid Architects, Hawkins/ Brown and Karakusevic Carson Architects in London gaining significant design and project experience on numerous RIBA award winning cultural, educational, residential, hospitality and high- rise projects. Some notable projects that she worked include the Jarman School of Arts, Middle East Centre for Oxford University, D’Leedon Condo Towers in Singapore and Cairo City Hotel.
	                            <br><br>
	                        In addition to her work at SAV , Amita has also taught at the AA Summer in London in 2015, Vertical Design Studios from 2011-2016 at the Welsh School of Architecture in Cardiff and at the BSSA in Mumbai in 2010 along with being an invited critic and guest lecturer for many other schools and organisations</p>
	                    </div>
	                </div>
	                <div class="col-md-4">
	                    <div>
	                        <h1 class="title">Vikrant Tike</h1>
	                        <p class="mt-3">Vikrant Tike is the co-founder and Principal Designer
	                            at SAV. Having studied fashion design and sound engineering before, he completed his undergraduate architectural studies at the AA and London Metropolitan and his Post Graduate Diploma in Spatial Performance and Design at the AA School of Architecture. At SAV, Vikrant oversees all the designs for all scales of projects as well as drives the digital modelling and fabrication research and making within the studio.
	                            <br><br>
	                            Prior to founding SAV he worked at Foster and Partners and Terrance Conran, gaining major design experience in complex geometries of high rise and mixed use towers, large masterplan projects and unique private houses. Some notable projects include Kenny Heights in Malaysia, Sama Dubai Mixed Use Towers in Melbourne , Bab Al Bahr Masterplan in Morocco and Kang House in Japan.
	                            <br><br>
	                            In addition to working at SAV, Vikrant has taught as the Unit1 Master at the Chelsea School of Arts in 2013, Unit7 Tutor for AA Summer School in 2015 and 2016, Vertical Design Studio Tutor at Welsh School of Architecture in Cardiff from 2012-2016 as well as at the BSSA in Mumbai in 2010. Along with teaching, with a keen interest in high quality hand craftsmanship and new age digital design and fabrication techniques, Vikrant has also been invited to conduct fabrication design workshops at numerous places across the world like London, Istanbul, Cardiff, Mumbai among others.
	                    </div>
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