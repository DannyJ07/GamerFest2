<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="reglas"></label>
                <input wire:model="reglas" type="text" class="form-control" id="reglas" placeholder="Reglas">@error('reglas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="aula"></label>
                <input wire:model="aula" type="text" class="form-control" id="aula" placeholder="Aula">@error('aula') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="valor"></label>
                <input wire:model="valor" type="text" class="form-control" id="valor" placeholder="Valor">@error('valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_evento"></label>
                <input wire:model="fecha_evento" type="date" class="form-control" id="fecha_evento" placeholder="Fecha Evento">@error('fecha_evento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_categoria"></label>
                <select class="form-control" wire:model="id_categoria">
                <option value="">seleccione una categoria</option>   
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{ $categoria->tipo}}</option>
                        @endforeach   
                </select>
            </div>
            <div class="form-group">
                <label for="id_modo"></label>
                <select class="form-control" wire:model="id_modo">
                <option value="">seleccione un modo</option>   
                        @foreach ($modos as $modo)
                        <option value="{{$modo->id}}">{{ $modo->tipo}}</option>
                        @endforeach   
                </select>            
            </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
