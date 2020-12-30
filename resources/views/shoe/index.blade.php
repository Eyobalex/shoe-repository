
<ul>
@foreach( $shoes as $shoe)
   <li>{{ $shoe->name }} || {{ $shoe->price }} || {{ $shoe->owner->name }}
   <img src="{{url('/images/'. $shoe->image_path) }}" alt="" height="50px">
       <br>
       <button>Add to cart</button>
   </li>
@endforeach

</ul>
