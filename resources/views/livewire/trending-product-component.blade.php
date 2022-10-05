<div class="col-lg-3 col-md-6 col-12">
    <div class="single-product">
        <div class="product-image">
            <img src="{{ asset('images/products/product-1.jpg') }}" alt="#">
            @if ($added)
                <div class="button">
                    <button type="button" wire:click="remove" wire:loading.attr="disabled" class="btn" style="background-color:red !important;">
                        <i class="lni lni-close"></i>
                        Remove
                    </button>
                </div>
            @else
                <div class="button">
                    <button type="button" wire:loading.attr="disabled" wire:click="addToCart" class="btn">
                        <i class="lni lni-cart"></i>&nbsp;
                        Add to Cart</a>
                    </button>
                </div>
            @endif


        </div>
    </div>
    <div class="product-info py-4">

        <h4 class="title text-center">
            <a href="{{ route('product-details', $product->slug) }}">{{ $product->name }}</a>
        </h4>

        <div class="price text-center mt-4">
            <span>{{ $product->formattedPrice() }}</span>
        </div>
    </div>
</div>
