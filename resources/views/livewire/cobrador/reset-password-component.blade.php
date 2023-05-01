<div>
    <form wire:submit.prevent="cambiarContraseña">
        <div class="row h-100 mb-4">
            <p>Cambio de contraseña del usuario</p>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="form-group form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Contraseña" wire:model.debounce.750ms="password">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label class="form-control-label" for="password">Password</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="form-group form-floating">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Confirmacion de la contraseña" wire:model.debounce.750ms="password_confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <label class="form-control-label" for="password_confirmation">Pasword Confirmation</label>
                </div>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <button type="submit" id="submitForm" class="btn btn-default btn-lg w-100 btn-block">Guardar</button>
            </div>
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <a type="submit" href="javascript:history.back();"
                    class="btn bg-red text-white btn-lg w-100 btn-block">Cancelar</a>
            </div>
        </div>
    </form>
</div>
