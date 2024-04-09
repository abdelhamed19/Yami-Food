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
                     <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="date" name="reserve[date]"
                                            class="datepicker picker__input form-control" type="text"
                                            value="{{ $reservation->date }}" equired data-error="Please enter Date">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="time" name="reserve[time]" class="time form-control picker__input"
                                            value="{{ $reservation->time }}" required data-error="Please enter time">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="reserve[notes]" class="time form-control picker__input"
                                            value="{{ $reservation->notes }}" required data-error="Please enter time">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="reserve[persons]" class="custom-select d-block form-control"
                                            id="person"required data-error="Please select Person">
                                            <option selected>{{ $reservation->persons }}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::check())
                                <div class="col-md-6">
                                    <h3>Contact Details</h3>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="reserve[phone]" placeholder="Your Numbar"
                                                id="phone" class="form-control" value="{{ $reservation->phone }}"
                                                required data-error="Please enter your Numbar">
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
                                            <input type="text" name="reserve[name]" class="form-control" id="name"
                                                value="{{ $reservation->name }}" placeholder="Your Name" required
                                                data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="reserve[email]" placeholder="Your Email"
                                                id="email" class="form-control" value="{{ $reservation->email }}"
                                                required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="reserve[phone]" placeholder="Your Numbar"
                                                id="phone" class="form-control" value="{{ $reservation->phone }}"
                                                required data-error="Please enter your Numbar">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="submit-button text-center">
                                    <button class="btn btn-common" id="submit" type="submit">Update</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </div>

 <x-front-footer />

 </body>

 </html>
