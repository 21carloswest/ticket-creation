<h3>Nova macro</h3>
<form method="POST">
  <div class="mb-3">
    <label class="form-label" for="title">Título</label>
    <input class="form-control shadow-lg rounded" id="title" type = "text" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label" for="description">Descrição</label>
    <textarea class="form-control shadow-lg rounded" id="description"name="description" rows="16"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <button type="button"class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
</form>


