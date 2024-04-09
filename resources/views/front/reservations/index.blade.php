	<!-- Start header -->
    <x-front-header />
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
            <x-success-message />
			<div class="row">

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
							<div class="row">
                                @forelse ($reservations as $reservation)
								<div class="col-md-6">
                                    <form action="{{ route('reservations.destroy',$reservation->id) }}" method="POST">
                                        <a class="btn btn-outline-warning btn-fw" style="height: 40px" href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-danger btn-fw" style="height: 40px" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');"></form>
                                    </form>
									<div class="col-md-12">
										<div class="form-group">
											<input type="date" readonly  class="datepicker picker__input form-control" type="text" value="{{ $reservation->date }}" equired data-error="Please enter Date">
											<div class="help-block with-errors"></div>
										</div>
                                        <div class="form-group">
											<input type="text" readonly class="datepicker picker__input form-control" type="text" value="Status : {{ $reservation->status }}" equired data-error="Please enter Date">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="time" readonly  class="time form-control picker__input" value="{{ $reservation->time }}"  required data-error="Please enter time">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="person"required data-error="Please select Person">
											  <option disabled selected>{{$reservation->persons  }}</option>
											</select>
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
                                @if(Auth::check())
                                <div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly  placeholder="Your Numbar" id="phone" class="form-control" value="{{ $reservation->phone }}" required data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly  placeholder="Your Numbar" id="phone" class="form-control" value="{{ $reservation->notes }}" required data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
										</div>
									</div>

								</div>

                                @else
                                <hr>
                                <div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly  class="form-control" id="name" value="{{ $reservation->name }}" placeholder="Your Name" required data-error="Please enter your name">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" readonly  placeholder="Your Email" id="email" class="form-control" value="{{ $reservation->email }}" required data-error="Please enter your email">
											<div class="help-block with-errors"></div>
										</div>

									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly  placeholder="Your Numbar" id="phone" class="form-control" value="{{ $reservation->phone }}" required data-error="Please enter your Numbar">
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    <div class="form-group">
                                        <input type="text" name="reserve[notes]" class="time form-control picker__input"
                                            value="{{ $reservation->notes }}" readonly required data-error="Please enter time">
                                        <div class="help-block with-errors"></div>
                                    </div>
								</div>
                                @endif
                                @empty
                                <div class="col-md-12">
                                    <h3>No Reservations yet</h3>
							</div>

                            @endforelse

					</div>
				</div>
			</div>
		</div>
	</div>

    <x-front-footer />

</body>
</html>
