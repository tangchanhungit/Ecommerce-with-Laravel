@include('frontend.partials._header')


<div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Products</span></p>
          <h1 class="mb-0 bread">Products</h1>
        </div>
      </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="{{ route('products') }}" class="{{ request('category') ? '' : 'active' }}">All</a></li>
                    @foreach ($categories as $cat)
                        <li>
                            <a href="{{ route('products', ['category' => $cat->id]) }}" class="{{ request('category') == $cat->id ? 'active' : '' }}">{{ $cat->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ route('products.info', ['id' => $product->id]) }}" class="img-prod">
                            <img src="{{ asset($product->image) }}" class="img-fluid">
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{ route('products.info', ['id' => $product->id]) }}">{{ $product->product_name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2">${{ $product->price }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    @if ($products->lastPage() > 1)
                        <ul>
                            @if ($products->onFirstPage())
                                <li class="disabled"><span>&lt;</span></li>
                            @else
                                <li><a href="{{ $products->previousPageUrl() }}{{ http_build_query(request()->except('page')) }}">&lt;</a></li>
                            @endif

                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $products->url($i) }}{{ http_build_query(request()->except('page')) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($products->hasMorePages())
                                <li><a href="{{ $products->nextPageUrl() }}{{ http_build_query(request()->except('page')) }}">&gt;</a></li>
                            @else
                                <li class="disabled"><span>&gt;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>





@include('frontend.partials._footer')