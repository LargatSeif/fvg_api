
<div class="container">
	<h2>Liste des festivales</h2>
	<ul class="festival-list">
		@foreach ($festivals as $festival)
			<li class="single-festival">{!! $festival->name !!}</li>
		@endforeach

	</ul>
</div>
