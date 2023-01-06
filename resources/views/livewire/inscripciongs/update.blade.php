<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Inscripciong</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="fecha"></label>
                <input wire:model="fecha" type="text" class="form-control" id="fecha" placeholder="Fecha">@error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="total"></label>
                <input wire:model="total" type="text" class="form-control" id="total" placeholder="Total">@error('total') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_juego"></label>
                <select class="form-control" wire:model="id_juego">
                <option value="">seleccione un juego</option> 
                        @foreach ($juegos as $juego)
                        <option value="{{$juego->id}}">{{ $juego->nombre}}</option>
                        @endforeach  
                </select>
            </div>
            <div class="form-group">
                <label for="id_equipo"></label>
                <select class="form-control" wire:model="id_equipo">
                <option value="">Seleccione un Equipo</option>
                        @foreach ($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{ $equipo->nombre}}</option>
                        @endforeach  
                </select>
            </div>
            <div class="form-group">
                <label for="id_pago"></label>
                <select class="form-control" wire:model="id_pago">
                <option value="">seleccione un tipo de pago</option>
                        @foreach ($tipopgs as $tipopg)
                        <option value="{{$tipopg->id}}">{{ $tipopg->tipo}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="doc_pago"></label>
                <input wire:model="doc_pago" type="text" class="form-control" id="doc_pago" placeholder="Doc Pago">@error('doc_pago') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
