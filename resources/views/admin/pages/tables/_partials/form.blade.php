@include('admin.includes.alerts')

<div class="form-group">
    <label for="identify">Identificador da mesa:</label>
    <input type="text" name="identify" class="form-control" placeholder="Identificador da mesa" value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control" value="{{ $table->description ?? old('description') }}"></textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>