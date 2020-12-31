@if(Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <span class="badge">{{ $product['qty'] }}</span>
                        <br>
                        <strong>{{ $product['item']['name'] }}</strong>
                        <br>
                        <span class="label label-success">{{ $product['price'] }}</span>
                        <br>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                                <li><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button onclick="onCheckoutClicked()" type="button" class="btn btn-success">Checkout</button>
        </div>
    </div>

{{--    <script>--}}
{{--        function onCheckoutClicked(){--}}
{{--            alert('you have successfully payd a total of {{ $totalPrice }}');--}}
{{--        }--}}
{{--    </script>--}}
@else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
@endif
