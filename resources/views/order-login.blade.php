@extends ('layouts.master')

@section ('content')

    <div class="container">
        Have an account? <a href="{{ url('login') }}">Login</a> to order
        OR
        <a href="{{ url('order') }}">Order without account.</a>

        <div class="animated wow slideInLeft" data-wow-delay=".5s">
            <div class="collections-bottom">
                <div class="container">
                    <div class="collections-bottom-grids">
                        <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                            <h3>45% Offer For <span>Women & Children's</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection