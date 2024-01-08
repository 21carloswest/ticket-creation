<h3>Novo cliente</h3>
<form method="POST">

  <div class="row mb-3">

    <div class="col-md-6">
      <label class="form-label" for="sysId">Sistema</label>
      <select for="sysId" class="form-control" id="sysId" name="sysId">
        <?=$aftermathSys?>
      </select>
    </div>

    <div class="col-md-6">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" id="name" name="name" value = "<?=$consultaCostumer->NOME_CLIENTE?>">
    </div>

  </div>

  <div class="mb-3">
    <label for="company" class="form-label">Empresa</label>
    <input type="text" class="form-control" id="company" name="company" value = "<?=$consultaCostumer->EMPRESA?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value = "<?=$consultaCostumer->EMAIL_CLIENTE?>">
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label" for="cell">Celular</label>
      <input type="number" class="form-control" id="cell" name="cell" value = "<?=$consultaCostumer->CELULAR_CLIENTE?>">
    </div>

    <div class="col-md-6">
      <label class="form-label" for="tel">Telefone</label>
      <input type="number" class="form-control" id="tel" name="tel" value = "<?=$consultaCostumer->TELEFONE_CLIENTE?>">
    </div>
  </div>

  <div class="mb-3">
    <label for="link" class="form-label">Link</label>
    <input type="text" class="form-control" id="link" name="link" value = "<?=$consultaCostumer->LINK?>">
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label for="CNPJ" class="form-label">CNPJ</label>
      <input type="number" class="form-control" id="CNPJ" name="CNPJ" value = "<?=$consultaCostumer->CNPJ?>">
    </div>

    <div class="col-md-6">
      <label for="cod" class="form-label">Código de cliente</label>
      <input type="number" class="form-control" id="cod" name="cod" value = "<?=$consultaCostumer->COD_CLIENTE?>">
    </div>
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <button type="button"class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
</form>