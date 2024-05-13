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
                    <h4 class="card-title">Edit The profile</h4>
                    <form action="{{ route('dashboard.items.update',$user->id) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" style="color: white" placeholder="Name"
                            value="{{ $user->name }}">
                        </div>
                        <x-error-message name="name" />

                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" name="email" class="form-control" style="color: white" placeholder="Email"
                            value="{{ $user->email }}">
                        </div>
                        <x-error-message name="email" />
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard.items.index') }}" role="button" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
