<x-dashboard.dashboard-layout />

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <x-dashboard.dashboard-sidebar />

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_navbar.html -->
        <x-dashboard.dashboard-navbar />


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create A Reservation</h4>
                    <form class="forms-sample" action="{{ route('dashboard.reservations.store') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="reserve[name]"  class="form-control" style="color: white" placeholder="Name" value="{{ old('reserve.name') }}">
                        </div>
                        <x-error-message :name="'reserve.name'" />

                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="email" name="reserve[email]" class="form-control" style="color: white" placeholder="Email" value="{{ old('reserve.email') }}">
                        </div>
                        <x-error-message :name="'reserve.email'" />

                        <div class="form-group">
                            <label for="exampleInputName1">Phone</label>
                            <input type="number" name="reserve[phone]" class="form-control" style="color: white" placeholder="Phone number" value="{{ old('reserve.phone') }}">
                        </div>
                        <x-error-message :name="'reserve.phone'" />


                        <div class="form-group">
                            <label for="exampleSelectGender">Number Of persons</label>
                            <select name="reserve[persons]" class="form-control" style="color: white">
                                <option value="" >Select Number</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                            <x-error-message :name="'reserve.persons'" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Notes</label>
                            <input type="text" name="reserve[notes]"  class="form-control" style="color: white" placeholder="Notes" value="{{ old('reserve.notes') }}">
                        </div>
                        <x-error-message :name="'reserve.notes'" />

                        <div class="form-group">
                            <label for="exampleInputName1">Date</label>
                            <input type="date" name="reserve[date]" class="form-control" style="color: white" placeholder="Date" value="{{ old('reserve.date') }}" >
                        </div>
                        <x-error-message :name="'reserve.date'" />


                        <div class="form-group">
                            <label for="exampleInputName1">Time</label>
                            <input type="time" name="reserve[time]" class="form-control" style="color: white" placeholder="Time"value="{{ old('reserve.time') }}">
                        </div>
                        <x-error-message :name="'reserve.time'" />
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard.reservations.index') }}" role="button" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
