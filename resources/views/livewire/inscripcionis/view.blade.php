@section('title', __('Inscripcionis'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Inscripciones Individuales </h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Inscripciones Individuales">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Inscripciones Individuales
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.inscripcionis.create')
						@include('livewire.inscripcionis.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Fecha</th>
								<th>Total</th>
								<th>Juego</th>
								<th>Participante</th>
								<th>Tipo de Pago</th>
								<th>Doc Pago</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($inscripcionis as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->fecha }}</td>
								<td>{{ $row->total }}</td>
								<td>{{ $row->id_juego }}</td>
								<td>{{ $row->id_participantes }}</td>
								<td>{{ $row->id_pago }}</td>
								<td>{{ $row->doc_pago }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Inscripcioni id {{$row->id}}? \nDeleted Inscripcionis cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $inscripcionis->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
