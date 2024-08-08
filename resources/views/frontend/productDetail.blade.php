@include('frontend.partials._header')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('frontend/images/bg_1.jpg')}}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
          <h1 class="mb-0 bread">Product Detail</h1>
        </div>
      </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('storage/' . $product->image) }}" class="image-popup">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                    </a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <p>Product Name: {{ ucwords($product->product_name) }}</p>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <p class="price"><span>${{ $product->price }}</span></p>
                    <p>{{ $product->description }}</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="size" id="size" class="form-control">
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                        <option value="extra_large">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">{{$product->stock}} kg available</p>
                        </div>
                    </div>
                    <p><a href="#" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                    {{-- {{ route('cart.add', ['id' => $product->id]) }} --}}
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var quantity = 1;

        document.querySelector('.quantity-right-plus').addEventListener('click', function(e) {
            e.preventDefault();
            var quantityInput = document.getElementById('quantity');
            quantity = parseInt(quantityInput.value);

            if (!isNaN(quantity)) {
                quantityInput.value = ++quantity;
                document.getElementById('quantity').value = quantity;
            }
        });

        document.querySelector('.quantity-left-minus').addEventListener('click', function(e) {
            e.preventDefault();
            var quantityInput = document.getElementById('quantity');
            quantity = parseInt(quantityInput.value);

            if (!isNaN(quantity) && quantity > 1) {
                quantityInput.value = --quantity;
                document.getElementById('quantity').value = quantity;
            }
        });
    });
</script>

@include('frontend.partials._footer')