<form method="POST">
    <label for="SLA_DESC" class="form-label"></label>
      <input type="text" class="form-control"id="SLA_DESC" name="SLA_DESC">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="ativo" id="ativo1" checked>
        <label class="form-check-label" for="ativo1">
          Ativo
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="ativo" id="ativo2">
        <label class="form-check-label" for="ativo2">
          Desativo
        </label>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
</form>