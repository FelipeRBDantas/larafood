@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $tenant->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="logo">Logo:</label>
    <input type="file" name="logo" class="form-control">
</div>
<div class="form-group">
    <label for="email">* E-mail:</label>
    <input type="text" name="email" class="form-control" placeholder="E-mail" value="{{ $tenant->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="cnpj">* CNPJ:</label>
    <input type="text" name="cnpj" class="form-control" placeholder="CNPJ" value="{{ $tenant->cnpj ?? old('cnpj') }}">
</div>
<div class="form-group">
    <label for="active">* Ativo?</label>
    <select name="active" class="form-control" aria-label="Ativo?">
        <option selected>Selecione...</option>
        <option value="Y">SIM</option>
        <option value="N">NÃO</option>
    </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label for="expires_at">Data Assinatura (início)</label>
    <input class="form-control" type="date" value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>
<div class="form-group">
    <label for="expires_at">Expira (final)</label>
    <input class="form-control" type="date" value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>
<div class="form-group">
    <label for="subscription_id">Identificador:</label>
    <input type="text" name="subscription_id" class="form-control" placeholder="Identificador" value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
</div>
<div class="form-group">
    <label for="subscription_active">* Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control" aria-label="Assinatura Ativa?">
        <option selected>Selecione...</option>
        <option value="Y">SIM</option>
        <option value="N">NÃO</option>
    </select>
</div>
<div class="form-group">
    <label for="subscription_suspended">* Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control" aria-label="Assinatura Cancelada?">
        <option selected>Selecione...</option>
        <option value="Y">SIM</option>
        <option value="N">NÃO</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>