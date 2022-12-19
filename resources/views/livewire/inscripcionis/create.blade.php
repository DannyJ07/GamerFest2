<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Inscripcioni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
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
                <!-- <select wire:model="id_juego" class="form-control selectícker" id="id_juego" placeholder="Id Juego">@error('id_juego') <span class="error text-danger">{{ $message }}</span> @enderror --> 
                <select class="form-control" wire:model="selectedJuego">
                <option value="">seleccione un juego</option>         
                </select>
            </div>
            <div class="form-group">
                <label for="id_participantes"></label>
                <!-- <input wire:model="id_participantes" type="text" class="form-control" id="id_participantes" placeholder="Id Participantes">@error('id_participantes') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select class="form-control" wire:model="selectedParticipante">
                        <option value="">seleccione un Participante</option>        
                </select>
            </div>
            <div class="form-group">
                <label for="id_pago"></label>
                <!-- <input wire:model="id_pago" type="text" class="form-control" id="id_pago" placeholder="Id Pago">@error('id_pago') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select class="form-control" wire:model="selectedTipoPagos">
                        <option value="">seleccione un tipo de pago</option>          
                </select>
            </div>
            <div class="form-group">
                <label for="doc_pago"></label>
                <input wire:model="doc_pago" type="text" class="form-control" id="doc_pago" placeholder="Doc Pago">@error('doc_pago') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
