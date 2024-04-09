<x-dashboard.dashboard-layout />

    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <x-dashboard.dashboard-sidebar />

        <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            <div class="container-fluid page-body-wrapper">
            <x-dashboard.dashboard-navbar />
            <!-- partial -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <x-success-message />
                    <h1 class="card-title">Trashed Items</h1>
                    <a href="{{ route('dashboard.items.index') }}" class="btn btn-outline-primary btn-fw">Items</a>
                    <div class="table-responsive">
                        <br>
                        <hr>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Item Name </th>
                            <th> status</th>
                            <th> Category</th>
                            <th> Restore </th>
                            <th> Force Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td><a href="{{ route('dashboard.items.show',$item->id) }}"> {{ $item->name }} </a></td>
                                <td> {{ $item->status }} </td>
                                <td> {{ $item->category->name }} </td>
                                <td>
                                    <form action="{{ route('dashboard.items.restore',$item->id) }}" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary btn-fw">Restore</button>
                                    </form>

                                </td>
                                <td>
                                    <form action="{{ route('dashboard.items.force-delete',$item->id) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                    </form>
                                </td>
                              </tr>

                            @empty
                            <tr>
                                <td style="color: white" colspan="6">No Items found</td>
                            </tr>
                            @endforelse
                        </tbody>
                      </table>
                      <br>
                      @php
                      $currentPage = $items->currentPage();
                      $lastPage = $items->lastPage();
                  @endphp

                  @for ($i = 1; $i <= $lastPage; $i++)
                      <a href="{{ request()->url() }}?page={{ $i }}" class="btn btn-outline-primary btn-fw{{ $currentPage == $i ? ' active' : '' }}">Page #{{ $i }}</a>
                  @endfor
                    </div>
                  </div>
                </div>
              </div>
