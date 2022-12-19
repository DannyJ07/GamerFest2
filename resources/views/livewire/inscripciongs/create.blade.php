<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevas Inscripciong</h5>
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
                <!-- <input wire:model="id_juego" type="text" class="form-control" id="id_juego" placeholder="Id Juego">@error('id_juego') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select class="form-control" wire:model="selectedJuego">
                <option value="">seleccione un juego</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_equipo"></label>
                <!-- <input wire:model="id_equipo" type="text" class="form-control" id="id_equipo" placeholder="Id Equipo">@error('id_equipo') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select class="form-control" wire:model="selectedEquipo">
                <option value="">seleccione un Equipo</option>
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
