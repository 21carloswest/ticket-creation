<h3>Editar usuário</h3>
<form method="POST">

  <div class="mb-3">
    <label class="form-label" for="teamId">Equipe</label>
    <select for="teamId" class="form-control" id="teamId" name="teamId">
      <?=$aftermathUsers?>
    </select>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="<?=$obUser->NOME_USUARIO?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?=$obUser->EMAIL_USUARIO?>">
  </div>

  <div class="mb-3">
    <label class="form-label" for="ext">Ramal</label>
    <input type="number" class="form-control" id="ext" name="ext" value="<?=$obUser->RAMAL?>">
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <button type="button"class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
</form>