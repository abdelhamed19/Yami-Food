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
                    <h4 class="card-title">Edit an Item</h4>
                    <form action="{{ route('dashboard.items.update',$item->id) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" style="color: white" placeholder="Name"
                            value="{{ $item->name }}">
                        </div>
                        <x-error-message name="name" />
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group col-xs-12">
                              <input type="file" name="img" class="form-control file-upload-info" placeholder="{{ $item->image }}" value="{{ $item->image }}">
                            </div>
                          </div>
                          <x-error-message name="img" />
                        <div class="form-group">
                            <label for="exampleSelectGender">Category</label>
                            <select name="category_id" class="form-control" style="color: white">
                                <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id  }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-error-message name="category_id" />
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name="description" style="color: white" rows="4">{{ $item->description }}</textarea>
                        </div>
                        <x-error-message name="description" />
                        <div class="form-group">
                            <label for="exampleInputPassword4">Price</label>
                            <input type="number" name="price" class="form-control" style="color: white"
                                placeholder="Price"
                                value="{{ $item->price }}">
                        </div>
                        <x-error-message name="price" />
                        <div class="form-group">
                            <label for="exampleSelectGender">Status</label>
                            <select class="form-control" style="color: white">
                                <option value="active" >Active</option>
                                <option value="drafted" >Drafted</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard.items.index') }}" role="button" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
