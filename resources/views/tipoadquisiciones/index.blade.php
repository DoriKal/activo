@extends('app')

@section('content')
<div>
	<h1>Listado de Tipo Adquisiciones</h1>	

	<div class="well">
		<div class="pull-right">
			<a  href="{{ url('/tipoadquisiciones/create') }}" class="btn btn-primary"> Nuevo</a>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Tipo Adquisicion">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" type="button">Buscar</button>
					</span>
				</div>
			</div>
		</div>
	</div>	
</div>

<table class="table table-bordered">
	<thead class="well"> 
		<tr>
			<th>Id Tipo Adquisicion</th>
			<th>Descripción Tipo Adquisicion</th>
			
			<th width="200px">Acciones</th>
		</tr>
	</thead>

	@foreach($tipoadquisiciones as $tipa)
	<tr>
		<td>{{$tipa->IdTipAdq}}</td>
		<td>{{$tipa->DescAdq}}</td>
		<td>				
			@include('tipoadquisiciones.acciones')
		</td>
	</tr>
	
	@endforeach

</table>
{!! $tipoadquisiciones->render() !!}

@endsection
