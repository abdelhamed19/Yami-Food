 <!-- Start header -->
 <x-front-header title="Reservation" />
 <br>
 <div class="all-page-title page-breadcrumb">
     <div class="container text-center">
         <div class="row">
             <div class="col-lg-12">
                 <h1>Online Payment</h1>
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
                     <form action="{{ route('placeOrder') }}" method="POST" id="contactForm">
                         @csrf
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-6">
                                     <h3>Book a table</h3>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <input type="date" class="datepicker picker__input form-control"
                                                     name="address" required data-error="Please enter Date">
                                                 <div class="help-block with-errors"></div>
                                                 <x-error-message :name="'address'" />
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <input type="time" class="time form-control picker__input"
                                                     name="phone" required data-error="Please enter time">
                                                 <div class="help-block with-errors"></div>
                                                 <x-error-message :name="'phone'" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <input type="text" class="time form-control picker__input"
                                                     name="reserve[notes]" placeholder="Additional Notes [Optional]"
                                                     data-error="Addition Notes">
                                                 <div class="help-block with-errors"></div>
                                                 <x-error-message :name="'reserve.notes'" />
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-group">
                                                 <select name="reserve[persons]"
                                                     class="custom-select d-block form-control" id="person" required
                                                     data-error="Please select Person">
                                                     <option value="{{ old('reserve.persons') }}">
                                                         {{ old('reserve.persons') ?? 'Select Person*' }}</option>
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
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="time form-control picker__input"
                                                    name="reserve[notes]" placeholder="Additional Notes [Optional]"
                                                    data-error="Addition Notes">
                                                <div class="help-block with-errors"></div>
                                                <x-error-message :name="'reserve.notes'" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="reserve[persons]"
                                                    class="custom-select d-block form-control" id="person" required
                                                    data-error="Please select Person">
                                                    <option value="{{ old('reserve.persons') }}">
                                                        {{ old('reserve.persons') ?? 'Select Person*' }}</option>
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
                                 </div>
                                 <div class="col-md-12">
                                     <div class="submit-button text-center">
                                         <button type="submit" class="btn btn-common" id="submit">Book
                                             Table</button>
                                         <div id="msgSubmit" class="h3 text-center hidden"></div>
                                         <div class="clearfix"></div>
                                     </div>
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
