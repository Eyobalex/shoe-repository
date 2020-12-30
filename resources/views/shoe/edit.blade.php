<h1>Edit Page</h1>

{!! Form::open(['route' => 'shoe.store', 'method' => 'post', 'files' =>'true']) !!}
	{!! Form::label('name', 'Name'); !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
<br>
    {!! Form::label('price', 'Price'); !!}
    {!! Form::number('price', 0.00, ['class' => 'form-control']) !!}
<br>

    {!! Form::label('currency', 'Currency', ['class' => 'control-label']) !!}
    <label>
    	{!! Form::radio('currency', 'USD', null,  ['id' => 'USD']) !!}
    	USD
    </label>
    <label>
    	{!! Form::radio('currency', 'GBP', null,  ['id' => 'GBP']) !!}
    	GBP
    </label>
    <label>
    	{!! Form::radio('currency', 'ETB', null,  ['id' => 'ETB']) !!}
    	ETB
    </label>
<br>
    {!! Form::file('image') !!}

<br>

    {!! Form::submit('Upload', ['class' => 'form-control']) !!}
{!! Form::close() !!}
