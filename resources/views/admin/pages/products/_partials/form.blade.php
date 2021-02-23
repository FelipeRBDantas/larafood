@include('admin.includes.alerts')

<div class="form-group">
    <label for="title">* Nome:</label>
    <input type="text" name="title" class="form-control" placeholder="Nome" value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label for="price">* Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label for="image">* Imagem:</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label for="description">* Descrição:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control" value="{{ $product->description ?? old('description') }}"></textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>