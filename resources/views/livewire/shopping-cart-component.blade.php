<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning"></i> Problem! </strong>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="cart-list-head">
        @if (count($cart))
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-2 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>

                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>

            @foreach ($cart as $cartItem)
                <livewire:cart-item-component :product="$cartItem->associatedModel" :cart-item="$cartItem" :key="$cartItem->id" />
            @endforeach
        @else
            <div class="alert alert-info">There is no item in your cart</div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">

            <div class="total-amount">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="left">
                            <div class="button py-4">
                                <button type="button" class="btn" wire:click="removeAll">
                                    <i class="fa fa-remove"></i>
                                    Remove all items
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="right">
                            <ul>
                                <li>Cart Subtotal<span>RWF {{ number_format(Cart::getSubTotal()) }}</span></li>
                            </ul>
                            <div class="button">
                                <a href="{{ route('checkout.index') }}" class="btn">Checkout</a>
                                <a href="{{ route('shop') }}" class="btn btn-alt">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
