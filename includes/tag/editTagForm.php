<h3>Editar Tag</h3>
<form method="POST">
    <label for="TAG_DESC" class="form-label">Descrição</label>
      <input type="text" class="form-control"id="TAG_DESC" value='<?=$obTag->NOME_TAG?>' name="TAG_DESC">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ativo" id="ativo1" value='1' checked>
        <label class="form-check-label" for="ativo1">
          Ativo
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ativo" value='0' id="ativo2">
        <label class="form-check-label" for="ativo2">
          Desativo
        </label>
      </div>
      <div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <button type="button"class="btn btn-primary me-2" onclick="window.location='../../ticket-creation/tag/viewTag.php'">Voltar</button>
      </div>
</form>