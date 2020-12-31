

<li>
    <a href="{{ route('product.shoppingCart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
    </a>
</li>

<hr>
<hr>
<hr>
<ul>
@foreach( $shoes as $shoe)
   <li>{{ $shoe->name }} || {{ $shoe->price }} || {{ $shoe->owner->name }}
   <img src="{{url('/images/'. $shoe->image_path) }}" alt="" height="50px">
       <br>
       <a href="{{ route('product.addToCart', ['id' => $shoe->id]) }}"
           role="button">Add to Cart</a>
   </li>
@endforeach

</ul>
