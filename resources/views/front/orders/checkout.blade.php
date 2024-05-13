	<!-- Start header -->
    <x-front-header title="Reservation" />
    <br>
    <div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Reservation</h1>
				</div>
			</div>
		</div>
	</div>

    <div class="reservation-box">
		<div class="container">
			<div class="row">
                <x-success-message />
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Reservation</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form action="{{ route('reservation.store') }}" method="POST" id="contactForm">
                            @csrf
							<div class="row">
								<div class="col-md-6">
									<h3>Book a table</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="date" class="datepicker picker__input form-control" name="reserve[date]" required type="text" value="{{ old('reserve.date') }}" equired data-error="Please enter Date">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.date'" />
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="time" class="time form-control picker__input" name="reserve[time]" value="{{ old('reserve.time') }}" required data-error="Please enter time">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.time'" />
									</div>
                                    <div class="col-md-12">
										<div class="form-group">
											<input type="text" class="time form-control picker__input" name="reserve[notes]" placeholder="Additional Notes [Optional]" value="{{ old('reserve.notes') }}" data-error="Addition Notes">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.notes'" />
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select name="reserve[persons]" class="custom-select d-block form-control" id="person"required data-error="Please select Person">
											  <option disabled selected>Select Person*</option>
											  <option value="1">1</option>
											  <option value="2">2</option>
											  <option value="3">3</option>
											  <option value="4">4</option>
											  <option value="5">5</option>
											  <option value="6">6</option>
											  <option value="7">7</option>
											</select>
                                            <x-error-message :name="'reserve.persons'" />
											<div class="help-block with-errors"></div>

										</div>
									</div>
								</div>

                                @if(Auth::check())
                                <div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Numbar" id="phone" class="form-control" name="reserve[phone]" value="{{ old('reserve.phone') }}" required data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
                                            <x-error-message :name="'reserve.phone'" />
										</div>
									</div>
								</div>
                                @else
                                <div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="reserve[name]"  placeholder="Your Name" required data-error="Please enter your name" value="{{ old('reserve.name') }}">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.name'" />
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" placeholder="Your Email" id="email" class="form-control" name="reserve[email]" value="{{ old('reserve.email') }}" required data-error="Please enter your email">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.email'" />
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Numbar" id="phone" class="form-control" name="reserve[phone]" value="{{ old('reserve.phone') }}" required data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
										</div>
                                        <x-error-message :name="'reserve.phone'" />
									</div>
								</div>
                                @endif
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button type="submit" class="btn btn-common" id="submit" >Book Table</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Start Footer -->
    <x-front-footer />

    <!-- ALL PLUGINS -->

	<!-- End Footer -->
</body>
</html>
