<div class="logo-nav">
    <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
        <h1><a href="{{ route('home') }}">Best Store <span>Shop anywhere</span></a></h1>
    </div>
    <div class="logo-nav-left1">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <h6>{{ $category->name }}</h6>
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="{{ url('products/' . $subcategory->name) }}">{{ $subcategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    {{--<div class="logo-nav-right">--}}
    {{--<div class="search-box">--}}
    {{--<div id="sb-search" class="sb-search">--}}
    {{--<form>--}}
    {{--<input class="sb-search-input" placeholder="Enter your search term..." type="search"--}}
    {{--id="search">--}}
    {{--<input class="sb-search-submit" type="submit" value="">--}}
    {{--<span class="sb-icon-search"> </span>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- search-scripts -->--}}
    {{--<script src="{{ asset('js/classie.js') }}"></script>--}}
    {{--<script src="{{ asset('js/uisearch.js') }}"></script>--}}
    {{--<script>--}}
    {{--new UISearch(document.getElementById('sb-search'));--}}
    {{--</script>--}}
    {{--<!-- //search-scripts -->--}}
    {{--</div>--}}
    <div class="header-right">
        <div class="cart box_1">
            <a href="{{ url('cart') }}">
                <h3>
                    <div class="total">
                        $<span id="total_price">{{ $navCart['total_price'] }}</span>
                        (<span id="total_qtty">{{ $navCart['total_qtty'] }}</span> items)
                    </div>
                    <img src="{{ asset('img/bag.png') }}" alt=""/>
                </h3>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>