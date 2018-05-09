@extends ('layouts.master')

@section ('content')

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
                </li>
                <li class="active">{{ $subCategory->name }}</li>
            </ol>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="men-position animated wow slideInLeft" data-wow-delay=".5s">
                    <a href="single.blade.php"><img src="{{ asset('img/27.jpg') }}" alt=" " class="img-responsive"/></a>
                    <div class="men-position-pos">
                        <h4>Summer collection</h4>
                        <h5><span>55%</span> Flat Discount</h5>
                    </div>
                </div>
                <hr>
                <div class="filter-price">
                    <h3>Filter By Price</h3>
                    <p>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>

                    <div id="slider-range"></div>
                    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
                    <!---->
                </div>
                <hr>
                <div class="filter-price">
                    <h3>Sort By</h3>
                    <div class="col-md-6">
                        <select class="form-control" id="sort" onchange="getProducts(1)">
                            <option value="price" selected>Price</option>
                            <option value="created_at">Date added</option>
                            <option value="name">Name</option>
                            <option value="reviews_count">Reviews</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="sort_direction" onchange="getProducts(1)">
                            <option value="asc" selected>Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="categories">
                    <h3>{{ str_limit($subCategory->category->name, 20, '...') }}</h3>
                    <ul class="cate">
                        @foreach ($subCategory->category->subcategories as $similar)
                            <li><a href="/products/{{ $similar->name }}">{{ $similar->name }}</a>
                                <span>({{ count($similar->products) }})</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>New Products</h3>
                    <div class="new-products-grids">
                        @foreach($newestProducts as $newestProduct)
                            <div class="new-products-grid">
                                <div class="new-products-grid-left">
                                    <a href="single/{{ $newestProduct->name }}"><img src="{{ asset('img/6.jpg') }}"
                                                                                     alt=" "
                                                                                     class="img-responsive"/></a>
                                </div>
                                <div class="new-products-grid-right">
                                    <h4><a href="single/{{ $newestProduct->name }}">{{ $newestProduct->name }}</a></h4>
                                    <div class="rating">
                                        @for ($i = 1; $i < 6; $i++ )
                                            @if ($newestProduct->reviews->avg('rating') >= $i)
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
                                    <div class="new-products-grid-right-add-cart">
                                        <p><span>${{ $newestProduct->price }}</span>
                                            <a href="#"
                                               onclick="addToCart('{{ $newestProduct->name }}', {{ $newestProduct->price }})">add
                                                to cart </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                        <img src="{{ asset('img/18.jpg') }}" alt=" " class="img-responsive"/>
                        <div class="products-right-grids-position1">
                            <h4>2016 New Collection</h4>
                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                                necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
                                non recusandae.</p>
                        </div>
                    </div>
                </div>
                <div class="products-ajax">
                    @include('layouts.products')
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
    <!-- //breadcrumbs -->
@endsection