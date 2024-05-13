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
                    <h4 class="card-title">Change Password</h4>
                    <form class="forms-sample" action="{{ route('admin.change-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Current Password</label>
                            <input type="password" name="current_password" class="form-control" style="color: white" placeholder="Current Password">

                        </div>
                        <x-error-message name="current_password" />

                        <div class="form-group">
                            <label for="exampleInputName1">New Password</label>
                            <input type="password" name="password" class="form-control" style="color: white" placeholder="Current Password" value="{{ old('password') }}">
                        </div>
                        <x-error-message name="password" />

                        <div class="form-group">
                            <label for="exampleInputName1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" style="color: white" placeholder="Current Password" value="{{ old('password_confirmation') }}">
                        </div>
                        <x-error-message name="password_confirmation" />


                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" role="button" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
