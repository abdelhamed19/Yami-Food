<div class="menu-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Special Menu</h2>
                    <p>Here Are some items form diffrent categories</p>
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
                                <button class="{{ Request::input('name') === 'pizza' ? 'active' : '' }}"
                                    name="name" value="pizza">Pizza</button>
                                    <button class="{{ Request::input('name') === 'burgers' ? 'active' : '' }}"
                                    name="name" value="burgers">Burger</button>
                                    <button class="{{ Request::input('name') === 'pasta' ? 'active' : '' }}"
                                    name="name" value="pasta">Pasta</button>
                                    <button class="{{ Request::input('name') === 'desserts' ? 'active' : '' }}"
                                    name="name" value="desserts">Desserts</button>
                                    <button class="{{ Request::input('name') === 'drinks' ? 'active' : '' }}"
                                    name="name" value="drinks">Drinks</button>
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
