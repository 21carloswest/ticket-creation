<h3>Editar Categoria</h3>
<form method="POST">
    <label for="DESCRICAO_CATEGORIA" class="form-label">Descrição</label>
      <input type="text" class="form-control" id="DESCRICAO_CATEGORIA" value='<?=$obCategory->DESCRICAO_CATEGORIA?>' name="DESCRICAO_CATEGORIA">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ATIVO_CATEGORIA" id="ativo1" value='1' checked>
        <label class="form-check-label" for="ativo1">
          Ativo
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="ATIVO_CATEGORIA" value='0' id="ativo2">
        <label class="form-check-label" for="ativo2">
          Inativo
        </label>
      </div>
      <div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <button type="button"class="btn btn-primary me-2" onclick="window.location='../../ticket-creation/category/viewCategory.php'">Voltar</button>
      </div>
</form>