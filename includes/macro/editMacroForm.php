<h3>Editar macro</h3>
<form method="POST">

  <div class="mb-3">
    <label class="form-label" for="title">Título</label>
    <input class="form-control shadow-lg rounded" id="title" type = "text" name="title" value="<?=$obMacro->TITULO_MACRO?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="description">Descrição</label>
    <textarea class="form-control shadow-lg rounded" id="description" name="description" rows="16"><?=$obMacro->TEXTO_MACRO?></textarea>
  </div>


  <input class="form-check-input" type="radio" name="ativo" id="ativo1" value='1' checked>
  <label class="form-check-label" for="ativo1">
    Ativo
  </label>

  <input class="form-check-input" type="radio" name="ativo" value='0' id="ativo2">
  <label class="form-check-label" for="ativo2">
    Desativado
  </label>

  <div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <button type="button"class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
  </div>


</form>