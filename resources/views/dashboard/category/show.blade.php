<x-dashboard.dashboard-layout />

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <x-dashboard.dashboard-sidebar />

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_navbar.html -->
        <x-dashboard.dashboard-navbar />

        <!-- partial -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Category</h1>
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-outline-primary btn-fw">Add Category</a>
                    <button type="button" class="btn btn-outline-secondary btn-fw">Trashed Categories</button>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Category Name </th>
                                    <th> status</th>
                                    <th> Description </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td> {{ $category->name }} </td>
                                        <td> {{ $category->status }} </td>
                                        <td><textarea class="form-control" style="color: white" rows="8">{{ $category->description }}</textarea></td>
                                    </tr>
                            </tbody>
                        </table>
                    <br>
                    </div>
                </div>
            </div>
        </div>


