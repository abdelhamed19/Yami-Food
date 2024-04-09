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
                    <h1 class="card-title">Resevations</h1>
                    <a href="{{ route('dashboard.reservations.create') }}" class="btn btn-outline-primary btn-fw">Create Resevation</a>
                    <a href="{{ route('dashboard.reservations.trashed') }}" class="btn btn-outline-secondary btn-fw">Trashed Resevations</a>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name</th>
                                    <th> Status </th>
                                    <th> date</th>
                                    <th> time</th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td><a href="{{ route('dashboard.reservations.show',$reservation->id) }}"> {{ $reservation->name }} </a></td>
                                        <td> {{ $reservation->status }} </td>
                                        <td> {{ $reservation->date }} </td>
                                        <td> {{ $reservation->time }} </td>
                                        <td>
                                            <a href="{{ route('dashboard.reservations.edit',$reservation->id) }}" class="btn btn-outline-warning btn-fw">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.reservations.destroy',$reservation->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="color: white" colspan="6">No Resevations found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    <br>
                        @php
                        $currentPage = $reservations->currentPage();
                        $lastPage = $reservations->lastPage();
                    @endphp

                    @for ($i = 1; $i <= $lastPage; $i++)
                        <a href="{{ request()->url() }}?page={{ $i }}" class="btn btn-outline-primary btn-fw{{ $currentPage == $i ? ' active' : '' }}">Page #{{ $i }}</a>
                    @endfor
                    </div>
                </div>
            </div>
        </div>


