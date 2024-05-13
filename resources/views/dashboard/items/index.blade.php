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
                    <h1 class="card-title">Items</h1>
                    <a href="{{ route('dashboard.items.create') }}" class="btn btn-outline-primary btn-fw">Add item</a>
                    <a href="{{ route('dashboard.items.trashed') }}" class="btn btn-outline-secondary btn-fw">Trashed
                        Items</a>
                    <div class="table-responsive">
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Item Name </th>
                                    <th> status</th>
                                    <th> Category </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('dashboard.items.show', $item->id) }}"> {{ $item->name }}
                                            </a></td>
                                        <td> {{ $item->status }} </td>
                                        <td> {{ $item->category->name }} </td>
                                        <td>
                                            <a href="{{ route('dashboard.items.edit', $item->id) }}"
                                                class="btn btn-outline-warning btn-fw">Edit</a>

                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.items.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-danger btn-fw">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td style="color: white" colspan="6">No items found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                    </div>
                    @php
                        $currentPage = $items->currentPage();
                        $lastPage = $items->lastPage();
                    @endphp

                    @for ($i = 1; $i <= $lastPage; $i++)
                        <a href="{{ request()->url() }}?page={{ $i }}"
                            class="btn btn-outline-primary btn-fw{{ $currentPage == $i ? ' active' : '' }}">Page
                            #{{ $i }}</a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
