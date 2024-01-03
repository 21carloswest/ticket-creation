<h3>Editar SLA</h3>
<form method="POST">
    <label for="SLA_DESC" class="form-label">Descrição</label>
      <input type="text" class="form-control"id="SLA_DESC" value='<?=$obSla->DESCRIÇAO_SLA?>' name="SLA_DESC">
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
      </div>
</form>