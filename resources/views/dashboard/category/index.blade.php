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
                    <h1 class="card-title">Categories</h1>
                    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-outline-primary btn-fw">Add Category</a>
                    <a href="{{ route('dashboard.categories.trashed') }}"  class="btn btn-outline-secondary btn-fw">Trashed Categories</a>
                    <div class="table-responsive">
                        <br>
                        <hr>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Category Name </th>
                            <th> status</th>
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td> {{ $category->id }} </td>
                                <td><a href="{{ route('dashboard.categories.show',$category->id) }}"> {{ $category->name }} </a></td>
                                <td> {{ $category->status }} </td>
                                <td>
                                    <a href="{{ route("dashboard.categories.edit",$category->id) }}" class="btn btn-outline-warning btn-fw">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                                    </form>

                                </td>
                              </tr>
                            @empty
                            <tr>
                                <td style="color: white" colspan="6">No Categories found</td>
                            </tr>
                            @endforelse
                        </tbody>
                      </table>
                      <br>
                      @php
                      $currentPage = $categories->currentPage();
                      $lastPage = $categories->lastPage();
                  @endphp

                  @for ($i = 1; $i <= $lastPage; $i++)
                      <a href="{{ request()->url() }}?page={{ $i }}" class="btn btn-outline-primary btn-fw{{ $currentPage == $i ? ' active' : '' }}">Page #{{ $i }}</a>
                  @endfor
                    </div>
                  </div>
                </div>
              </div>
