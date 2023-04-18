<div class="">
    <div class="row mb-3">
        <div class="col">
            <h6>Creando prestamo para: <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h6>
           
        </div>
    </div>
    <form wire:submit.prevent="submit">
        <div class="row h-100 mb-4">

            <div wire:ignore class="col-12 col-md-3 col-lg-2 mb-4">
                <div class="form-group form-floating mb-3">
                    <select name="" class="form-control @error('user_id') is-invalid @enderror" id="usuarios"
                        wire:model.debounce.750ms="user_id" placeholder="Usuario">
                        <option value="">Seleccione usuario</option>
                        @foreach ($usuarios as $user)
                            <option value="{{$user->id}}">{{$user->name.' '.$user->apellido}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="usuarios">Usuario</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('fecha_inicial') is-invalid @enderror"
                        placeholder="Fecha" wire:model.debounce.750ms="fecha_inicial">
                    @error('fecha_inicial')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="fecha_inicial">Fecha</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" readonly class="form-control @error('fecha_final') is-invalid @enderror"
                        placeholder="Fecha Fin(aprox)" wire:model.debounce.750ms="fecha_final">
                    @error('fecha_final')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="fecha_final">Fecha Fin(aprox)</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('monto_inicial') is-invalid @enderror"
                        placeholder="Monto (Bs)" wire:model.debounce.750ms="monto_inicial">
                    @error('monto_inicial')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="monto_inicial">Monto (Bs)</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" readonly class="form-control @error('monto_final') is-invalid @enderror"
                        placeholder="Total (Bs)" wire:model.debounce.750ms="monto_final">
                    @error('monto_final')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="monto_final">Total (Bs)</label>
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('cuota') is-invalid @enderror" placeholder="Cuota (Bs)" readonly
                        wire:model.debounce.750ms="cuota">
                    @error('cuota')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="cuota">Cuota (Bs)</label>
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('interes') is-invalid @enderror"
                        placeholder="Interes" wire:model.debounce.750ms="interes">
                    @error('interes')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="interes">Interes</label>
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('dias') is-invalid @enderror" placeholder="Dias"
                        wire:model.debounce.750ms="dias">
                    @error('dias')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="dias">Dias</label>
                </div>
            </div>

            <div class="row h-100 mb-4 ">
                <div class="col-6 col-md-3 col-lg-2 mb-3">
                    <button type="submit" id="submitForm"
                        class="btn btn-lg btn-default mx-auto d-block w-100">Guardar</button>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-3">
                    <a type="submit" href="javascript:history.back();"
                        class="btn bg-red btn-lg text-white mx-auto d-block w-100">Cancelar</a>
                </div>
            </div>
    </form>
</div>
@push('footer')
    <script>
        $(document).ready(function() {
            $('#usuarios').select2({
                theme: 'bootstrap-5'
            });
            $('#usuarios').change(function () { 
                Livewire.emit('usuarioID',$(this).val())
            });
        });
    </script>
@endpush
