{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('firstName', 'FirstName:') !!}
			{!! Form::text('firstName') !!}
		</li>
		<li>
			{!! Form::label('lastName', 'LastName:') !!}
			{!! Form::text('lastName') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}