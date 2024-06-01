@extends('layouts.app')
@section('content')
	
	<div class="inside-page">
	    <section class="padding-block-600">
	        <div class="container-xxl">
	            <div class="row justify-content-between row-gap-4">
	                <div class="col-md-4 offset-md-1">
	                    <div class="title">
	                        people
	                    </div>
	                    <p class="mt-3 mb-5">
	                    We believe in having a small, closely knit and efficient team for every project. We have been fortunate to have a talented, dedicated and diverse team in both of our UK and India studios.
	                    </p>
	                    <img src="{{ asset('assets/images/people/IMG_4006-1536x1140.jpg') }}" alt="">
	                </div>
	                <div class="col-md-6">
	                    <img src="{{ asset('assets/images/people/e85938aa-03c2-45e1-9c56-98f732961bf2-1817x2048.jpg') }}" alt="">
	                </div>
	            </div>
	            
	            <div class="row row-gap-4 margin-top-600">
	                <div class="col-md-5 offset-md-1">
	                    <img src="{{ asset('assets/images/people/IMG_0477-1536x1474.jpg') }}" alt="">
	                </div>
	                <div class="col-md-5 offset-md-1">
	                    <p class="mt-3 pe-md-5 mb-5">
	                    Since the studio takes part in different academic workshops and teaching we have been able to work and collaborate with people from different schools, who have multiple Interests, culturally varied and focused on delivering unique and sophisticated outcomes.
	                    </p>
	                    <img src="{{ asset('assets/images/people/Mumbai-Studio_Placeholder.jpg') }}" alt="">
	                </div>
	            </div>

	            
	            <div class="row row-gap-4 margin-top-600">
	                <div class="col-md-12">
	                    
	                    <p class="text-center">
	                    Following is the list of people so far that we have worked and collaborated with us at SAV.
	                    </p>
	                </div>
	            </div>
	            
	        </div>
	        <div class="container">
	            
	        <div class="row justify-content-around mt-5">
	                <div class="col-md-2 col-6">
	                    
	                    <p>Vikrant Tike</p>
	                    <p>Amita Kulkarni</p>
	                    <p>Guillem Vaquer Pisa</p>
	                    <p>Jie Liu</p>
	                    <p>Sanhita Chaturvedi</p>
	                    <p>Ben Kikkawa</p>
	                    <p>Tal Mazor</p>
	                    <p>Shameel Muhammed</p>
	                    <p>Aishwarya Dharmarajan</p>
	                    <p>Astha Kapila</p>
	                    <p>Divyansh Srivastava</p>
	                    <p>Vidushi Aggarwal</p>
	                    <p>Jeeya Savani</p>
	                    <p>Rahul Pavithran</p>
	                    <p>Nikita Singhvi</p>
	                    <p>Vaibhavi Pujari</p>
	                </div>
	                <div class="col-md-2 col-6">
	                    
	                    <p>Emmanuelle Siedes</p>
	                    <p>Luca Bertoletti</p>
	                    <p>Christos Bletsas</p>
	                    <p>Maria Olmas Zunica</p>
	                    <p>Katarina Valickova</p>
	                    <p>Hanna Steif</p>
	                    <p>Dhrumil Mehta</p>
	                    <p>Sohil Soni</p>
	                    <p>Belinda Mendes</p>
	                    <p>Simran Omer</p>
	                    <p>Shirin Shigalkar</p>
	                    <p>Ravisha Rathore</p>
	                    <p>Ayush Kumar</p>
	                    <p>Ayush Agarwal</p>
	                    <p>Adit Gupta</p>
	                    <p>Tarit Gautham</p>
	                </div>
	                <div class="col-md-2 col-6">
	                    
	                    <p>Anna Musychak</p>
	                    <p>Yosuke Nakano</p>
	                    <p>Rashika Radhakrishnan</p>
	                    <p>Nilufer Kocabas</p>
	                    <p>Ananth Ramaswamy</p>
	                    <p>Abhishek Sharma</p>
	                    <p>Soojung Rhee</p>
	                    <p>David Reiser</p>
	                    <p>Kaushil Shah</p>
	                    <p>Dinika Thomas</p>
	                    <p>Shubam Kanbarkar</p>
	                    <p>Mohit Mehta</p>
	                    <p>Jeevan Saswath</p>
	                    <p>Sneha Balasubramaniam</p>
	                    <p>Aiswarya Keyan</p>
	                    <p>Mallika Dalmia</p>
	                </div>
	                <div class="col-md-2 col-6">
	                    
	                    <p>Dhruv Seth</p>
	                    <p>Ami Matthan</p>
	                    <p>Anoop Kothari</p>
	                    <p>Namrata Kaur</p>
	                    <p>Chinmay Mayekar</p>
	                    <p>Rohit Jain</p>
	                    <p>Malhar Chawada</p>
	                    <p>Raj Gandhi</p>
	                    <p>Nidhi Parsena</p>
	                    <p>Aravinth Kumar</p>
	                    <p>Devesh Uniyal</p>
	                    <p>Angad Singh Bal</p>
	                    <p>Shiva Paliwal</p>
	                    <p>S Sarath Raj</p>
	                    <p>Ravi Varma</p>
	                    <p>Vasudha Dahale</p>
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