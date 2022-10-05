<div class="cart-single-list">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-1 col-12">
            <a href="product-details.html"><img src="assets/images/cart/01.jpg" alt="#"></a>
        </div>
        <div class="col-lg-4 col-md-3 col-12">
            <h5 class="product-name"><a href="{{ route('product-details', $product->slug) }}">
                    {{ $cartItem->name }}</a></h5>
            <p class="product-des">
                <span><em>Category:</em> {{ $product->category->name }}</span>
                <span><em>Category:</em> {{ $product->formattedPrice() }}</span>

            </p>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <div class="count-input">
                <form action="{{ route('cart.increment', ['id' => $cartItem->id]) }}">

                    <div class="input-group">
                        <input wire:model.defer="quantity" type="text" class="form-control" name="qty"
                            placeholder="Quantity" min="0.5" wire:loading.attr="disabled" style="width: 70px;"
                            value="">
                        <span class="input-group-btn">
                            <button wire:loading.attr="disabled" class="btn btn-info text-capitalize"
                                title="Click here to update Quantity." wire:click="update" data-toggle="tooltip"
                                data-placement="right" type="submit">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-12">
            <p>RWF {{ number_format($cartItem->price * $cartItem->quantity) }}</p>
        </div>

        <div class="col-lg-2 col-md-2 col-12">
            <button class="btn btn-xs btn-danger" wire:loading.attr="disabled"
                title="Click here to remove Item." wire:click="remove" data-toggle="tooltip" data-placement="left">
                <i class="fa fa-times-circle"></i> Remove
            </button>
        </div>
    </div>
</div>
