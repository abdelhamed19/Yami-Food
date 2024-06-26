	<!-- Start header -->
    <x-front-header title="resturant" />
	<!-- End header -->

	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src={{ asset("assets/front/images/slider-01.jpg" ) }} alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br>
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src={{ asset("assets/front/images/slider-02.jpg" ) }} alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br>
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src={{ asset("assets/front/images/slider-03.jpg" ) }} alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br>
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

    <x-front-menu :$items />

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src={{ asset("assets/front/images/about-img.jpg") }} alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Yamifood Restaurant</span></h1>
						<h4>Little Story</h4>
						<p>YamiFood Restaurant was born out of a passion for exquisite cuisine and a commitment to providing unforgettable dining experiences. Our journey began with a vision to blend culinary artistry with exceptional service, creating a haven for food enthusiasts and connoisseurs alike. </p>
						<p>Nestled in the heart of [Location], our restaurant captures the essence of [Cuisine Type] cuisine, offering a delightful array of flavors meticulously crafted by our talented chefs. From traditional favorites to innovative creations, each dish is a culinary masterpiece designed to tantalize your taste buds and ignite your senses.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="{{ route('reservation.index') }}">Reservation</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Menu -->

	<!-- End Menu -->

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-01.jpg") }}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-01.jpg") }} alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-02.jpg" ) }}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-02.jpg" ) }} alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-03.jpg" ) }}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-03.jpg" ) }} alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-04.jpg" ) }}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-04.jpg" ) }} alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-05.jpg" )}}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-05.jpg" ) }} alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href={{ asset("assets/front/images/gallery-img-06.jpg" )}}>
							<img class="img-fluid" src={{ asset("assets/front/images/gallery-img-06.jpg" ) }} alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->

	<!-- Start Customer Reviews -->
    <x-front-reviews />
	<!-- End Customer Reviews -->

	<!-- Start Footer -->
    <x-front-footer />
	<!-- End Footer -->


</body>
</html>
