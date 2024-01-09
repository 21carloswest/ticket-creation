<section>

<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nova</button>
    <button type="button" class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="teamId">Equipe</label>
                            <select for="teamId" class="form-control" id="teamId" name="teamId">
                            <?=$aftermathUsers?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="ext">Ramal</label>
                            <input type="number" class="form-control" id="ext" name="ext">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<table class="table bg-light mt-3">

    <thead>
        <tr>
            <th>Nome</th>
            <th>Ativo</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?=$aftermath?>
    </tbody>
</table>



</section>

