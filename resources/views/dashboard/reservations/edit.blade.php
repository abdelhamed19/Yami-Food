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
                    <h4 class="card-title">Edit an Reservation</h4>
                    <form class="forms-sample" action="{{ route('dashboard.reservations.update',$reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="reserve[name]" class="form-control" style="color: white" placeholder="Name"
                            value="{{ $reservation->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="email" name="reserve[email]"  class="form-control" style="color: white" placeholder="email"
                            value="{{ $reservation->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Date</label>
                            <input type="date" name="reserve[date]"   class="form-control" style="color: white" placeholder="date"
                            value="{{ $reservation->date }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Time</label>
                            <input type="time" name="reserve[time]"  class="form-control" style="color: white" placeholder="time"
                            value="{{ $reservation->time }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Num of persons</label>
                            <input type="number" name="reserve[persons]"  class="form-control" style="color: white" placeholder="number"
                            value="{{ $reservation->persons }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Status</label>
                            <select name="reserve[status]" class="form-control" style="color: white">
                                <option selected value="{{ $reservation->status }}" >{{ $reservation->status }}</option>
                                <option value="pending" >Pending</option>
                                <option value="confirmed" >Confirmed</option>
                                <option value="cancelled" >Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard.reservations.index') }}" role="button" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
