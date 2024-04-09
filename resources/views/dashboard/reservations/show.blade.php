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
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Info</th>
                                    <th> #.Persons </th>
                                    <th> Status </th>
                                    <th> date & Time</th>
                                    <th> Phone </th>
                                    <th> Reservation Number </th>
                                    <th> Notes </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td style="color: white">Name:  {{ $reservation->name }}
                                        <br>
                                        <br>
                                       Email: {{ $reservation->email }}
                                        </td>
                                        <td style="color: white"> {{ $reservation->persons }} </td>
                                        <td style="color: white"> {{ $reservation->status }} </td>
                                        <td style="color: white">Day: {{ $reservation->date }}
                                        <br>
                                        <br>
                                           At: {{ $reservation->time }}

                                        </td>
                                        <td style="color: white">{{ $reservation->phone }}  </td>
                                        <td style="color: white">{{ $reservation->number }}  </td>
                                        <td style="color: white"> {{ $reservation->notes }}</td>
                                        <td>
                                            <form action="{{ route('dashboard.reservations.status',$reservation->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" name="status" value="confirmed" class="btn btn-outline-success btn-fw">
                                            </form>
                                            <br>
                                            <br>
                                            <form action="{{ route('dashboard.reservations.status',$reservation->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="submit" name="status" value="cancelled" class="btn btn-outline-danger btn-fw">                                            </form>

                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    <br>
                    </div>
                </div>
            </div>
        </div>


