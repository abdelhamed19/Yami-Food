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
                    <x-success-message />
                    <h1 class="card-title">users</h1>
                    <a href="" class="btn btn-outline-primary btn-fw">Add user</a>
                    <a href="" class="btn btn-outline-secondary btn-fw">Trashed users</a>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> email</th>
                                    <th> last Active at </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href=""> {{ $user->name }} </a></td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td>
                                            <a href="" class="btn btn-outline-warning btn-fw">Edit</a>

                                        </td>
                                        <td>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="color: white" colspan="6">No users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    <br>
                        @php
                        $currentPage = $users->currentPage();
                        $lastPage = $users->lastPage();
                    @endphp

                    @for ($i = 1; $i <= $lastPage; $i++)
                        <a href="{{ request()->url() }}?page={{ $i }}" class="btn btn-outline-primary btn-fw{{ $currentPage == $i ? ' active' : '' }}">Page #{{ $i }}</a>
                    @endfor
                    </div>
                </div>
            </div>
        </div>


