	<!-- Start header -->
    <x-front-header title="menu" />
    <br>
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Our Menu</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <form action="{{ url()->current() }}" method="GET">
                            <div class="button-group filter-button-group">
                                <button class="{{ Request::input('name') === null ? 'active' : '' }}" name="name"
                                    value="">All</button>
                                    @foreach ($categories as $category)
                                    <button class="{{ Request::input('name') === $category->name ? 'active' : '' }}"
                                         name="name" value="{{ $category->name }}">
                                        {{ $category->name }}</button>
                                    @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @forelse ($items as $item)
                    <div class="col-lg-4 col-md-6 special-grid drinks">
                        <div class="gallery-single fix">
                            <img src={{ $item->image_url }} width="270px" height="270px" alt="Image">
                            {{-- class="img-fluid" --}}
                            <div class="why-text">
                                <h4>{{ $item->name }}</h4>
                                <p>{{ strlen($item->description) > 100 ? substr($item->description, 0, 100) . '...' : $item->description }}</p>
                                <h5> ${{ $item->price }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h1 class="text-center">No items found</h1>
                    </div>
                @endforelse

            </div>
        </div>
    </div>



	<!-- Start Footer -->
    <x-front-footer />
	<!-- End Footer -->


</body>
</html>
