@extends ('layouts.master')

@section ('content')

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">{{ $product->name }}</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>{{ $product->subcategory->name }}</h3>
                    <ul class="cate">
                        @foreach ($product->subcategory->category->subCategories as $similar)
                            <li><a href="/products/{{ $similar->name }}">{{ $similar->name }}</a>
                                <span>({{ count($similar->products) }})</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                    <a href="single.blade.php"><img src="{{ asset('img/29.jpg') }}" alt=" " class="img-responsive"/></a>
                    <div class="men-position-pos">
                        <h4>Summer collection</h4>
                        <h5><span>55%</span> Flat Discount</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8 single-right">
                <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{ asset('img/si.jpg') }}">
                                <div class="thumb-image"><img src="{{ asset('img/si.jpg') }}" data-imagezoom="true"
                                                              class="img-responsive"></div>
                            </li>
                            <li data-thumb="{{ asset('img/si1.jpg') }}">
                                <div class="thumb-image"><img src="{{ asset('img/si1.jpg') }}" data-imagezoom="true"
                                                              class="img-responsive"></div>
                            </li>
                            <li data-thumb="{{ asset('img/si2.jpg') }}">
                                <div class="thumb-image"><img src="{{ asset('img/si2.jpg') }}" data-imagezoom="true"
                                                              class="img-responsive"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- flixslider -->
                    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
                    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen"/>
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function () {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- flixslider -->
                </div>
                <div class="col-md-7 single-right-left animated wow slideInRight"
                     data-wow-delay=".5s">
                    <h3>{{ $product->name }}</h3>
                    <h4><span class="">${{ $product->price }}</span></h4>
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
                    <div class="description">
                        <h5><i>Description</i></h5>
                        <p>{{ $product->description }}</p>
                    </div>
                    {{--<div class="color-quality">--}}
                    {{--<div class="color-quality-left">--}}
                    {{--<h5>Color : </h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="#"><span></span>Red</a></li>--}}
                    {{--<li><a href="#" class="brown"><span></span>Yellow</a></li>--}}
                    {{--<li><a href="#" class="purple"><span></span>Purple</a></li>--}}
                    {{--<li><a href="#" class="gray"><span></span>Violet</a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    <div class="occasion-cart">
                        <a class="" href="#" onclick="addToCart('{{ $product->name }}', {{ $product->price }}, 1)">add
                            to cart </a>
                    </div>
                    <div class="social">
                        <div class="social-left">
                            <p>Share On :</p>
                        </div>
                        <div class="social-right">
                            <ul class="social-icons">
                                <li><a href="#" class="facebook"></a></li>
                                <li><a href="#" class="twitter"></a></li>
                                <li><a href="#" class="g"></a></li>
                                <li><a href="#" class="instagram"></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab"
                                                                      data-toggle="tab" aria-controls="home"
                                                                      aria-expanded="true">Description</a></li>
                            <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                                                       aria-controls="profile">Reviews({{ count($product->reviews)}})
                                </a></li>
                            <li role="presentation" class="dropdown">
                                <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"
                                   aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1"
                                    id="myTabDrop1-contents">
                                    <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab"
                                           data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
                                    <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab"
                                           data-toggle="tab" aria-controls="dropdown2">fanny</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home"
                                 aria-labelledby="home-tab">
                                <h5>Product Brief Description</h5>
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                                    stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg
                                    carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                                    Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                                    salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                                    voluptate nisi qui.
                                    <span>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile"
                                 aria-labelledby="profile-tab">
                                <div class="bootstrap-tab-text-grids">
                                    @foreach($product->reviews as $review)
                                        <div class="bootstrap-tab-text-grid">
                                            <div class="bootstrap-tab-text-grid-left">
                                                <img src="{{ asset('img/4.png') }}" alt=" " class="img-responsive"/>
                                            </div>
                                            <div class="bootstrap-tab-text-grid-right">
                                                <ul>
                                                    <li><a href="#">{{ $review->user->name }}</a></li>
                                                    <li>
                                                        <div class="rating">
                                                            @for ($i = 1; $i < 6; $i++ )
                                                                @if ($review->rating >= $i)
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
                                                    </li>
                                                </ul>
                                                <p>{{ $review->comment }}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    @endforeach
                                    <div class="add-review">
                                        <h4>add a review</h4>
                                        @if (auth()->check())
                                            <form method="post" action="/addReview/{{ $product->name }}">
                                                {{ csrf_field() }}
                                                <input type="text" placeholder="Title" minlength="3" name="title"
                                                       required>

                                                Rating:
                                                <span class="starRating">
                                            <input id="rating5" type="radio" name="rating" value="5" checked>
                                            <label for="rating5">5</label>
                                            <input id="rating4" type="radio" name="rating" value="4">
                                            <label for="rating4">4</label>
                                            <input id="rating3" type="radio" name="rating" value="3">
                                            <label for="rating3">3</label>
                                            <input id="rating2" type="radio" name="rating" value="2">
                                            <label for="rating2">2</label>
                                            <input id="rating1" type="radio" name="rating" value="1">
                                            <label for="rating1">1</label>
                                            </span>

                                                <textarea placeholder="Review..." minlength="10" name="comment"
                                                          required></textarea>
                                                <input type="submit" value="Send">
                                            </form>
                                        @else
                                            <a href="/login">Login</a> to leave a review.
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1"
                                 aria-labelledby="dropdown1-tab">
                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                                    fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
                                    them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray
                                    yr.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2"
                                 aria-labelledby="dropdown2-tab">
                                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they
                                    sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny
                                    pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
                                    Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS
                                    viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats
                                    keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                    vegan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //single -->
    <!-- single-related-products -->
    <div class="single-related-products">
        <div class="container">
            <h3 class="animated wow slideInUp" data-wow-delay=".5s">Related Products</h3>
            <p class="est animated wow slideInUp" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            <div class="new-collections-grids">
                @foreach ($relativeProducts as $relativeProduct)
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".{{ 5 + $loop->iteration }}s">
                            <div class="new-collections-grid1-image">
                                <a href="/products/single/{{ $relativeProduct->name }}" class="product-image"><img src="{{ asset('img/8.jpg') }}"
                                                                                      alt=" "
                                                                                      class="img-responsive"></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="/products/single/{{ $relativeProduct->name }}">Quick View</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        @for ($i = 1; $i < 6; $i++ )
                                            @if ($relativeProduct->reviews->avg('rating') >= $i)
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
                            <h4><a href="/products/single/{{ $relativeProduct->name }}">{{ $relativeProduct->name }}</a></h4>
                            <p>{{ str_limit($relativeProduct->description, 20, '...') }}</p>
                            <div class="new-collections-grid1-left">
                                <p><span>${{ $relativeProduct->price }}</span><a href="#"
                                    onclick="addToCart('{{ $relativeProduct->name }}', {{ $relativeProduct->price }}, 1)">add to
                                        cart </a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/cart.js') }}"></script>
    <!-- //single-related-products -->

@endsection