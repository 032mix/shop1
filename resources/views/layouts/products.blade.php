<div class="products-right-grids-bottom">
    <nav class="text-center">
        {{ $subCategoryProducts->links() }}
    </nav>
    @foreach($subCategoryProducts as $product)
        @if ($loop->index % 3 == 0 && !$loop->first)
            <div class="clearfix"></div>
</div>
@endif
@if ($loop->index % 3 == 0)
    <div class="col-md-12 products-right-grids-bottom-grid">
        @endif
        <div class="col-md-4" style="padding: 0">
            <div class="new-collections-grid1 products-right-grid1">
                <div class="new-collections-grid1-image">
                    <a href="single/{{ $product->name }}" class="product-image"><img
                                src="{{ asset('img/19.jpg') }}" alt=" " class="img-responsive"></a>
                    <div class="new-collections-grid1-image-pos products-right-grids-pos">
                        <a href="single/{{ $product->name }}">Quick View</a>
                    </div>
                    <div class="new-collections-grid1-right products-right-grids-pos-right">
                        <div class="rating">
                            @for ($i = 1; $i < 6; $i++ )
                                @if ($product->reviews->avg('rating') >= $i)
                                    <div class="rating-left">
                                        <img src="{{ asset('img/2.png') }}" alt=" "
                                             class="img-responsive">
                                    </div>
                                @else
                                    <div class="rating-left">
                                        <img src="{{ asset('img/1.png') }}" alt=" "
                                             class="img-responsive">
                                    </div>
                                @endif
                            @endfor
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <h4>
                    <a href="single/{{ $product->name }}">{{ str_limit($product->name, 16, '...') }}</a>
                </h4>
                <p>{{ str_limit($product->description, 20, '...') }}</p>
                <div class="products-right-grid1-add-cart">
                    <p><i>$325</i> $<span>{{ $product->price }}</span>
                        <a href="#"
                           onclick="addToCart('{{ $product->name }}', {{ $product->price }})">
                            add to cart </a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <nav class="text-center">
        {{ $subCategoryProducts->links() }}
    </nav>