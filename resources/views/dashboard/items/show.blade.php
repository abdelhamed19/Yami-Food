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
                    <h1 class="card-title">Items</h1>
                    <a href="{{ route('dashboard.items.create') }}" class="btn btn-outline-primary btn-fw">Add item</a>
                    <button type="button" class="btn btn-outline-secondary btn-fw">Trashed Items</button>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Item Name </th>
                                    <th> status</th>
                                    <th> Category </th>
                                    <th> Price </th>
                                    <th> Description </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->status }} </td>
                                        <td> {{ $item->category->name }} </td>
                                        <td> {{ $item->price }} </td>
                                        <td><textarea class="form-control" style="color: white" rows="8">{{ $item->description }}</textarea></td>
                                    </tr>
                            </tbody>
                        </table>
                    <br>
                    </div>
                </div>
            </div>
        </div>


