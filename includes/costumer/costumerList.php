<section>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nova</button>
    <button type="button" class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Tag</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">

                        <div class="col-md-6">
                            <label class="form-label" for="sysId">Sistema</label>
                            <select for="sysId" class="form-control" id="sysId" name="sysId">
                                <?=$aftermathSys?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        </div>

                        <div class="mb-3">
                            <label for="company" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="cell">Celular</label>
                                <input type="number" class="form-control" id="cell" name="cell">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="tel">Telefone</label>
                                <input type="number" class="form-control" id="tel" name="tel">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="company" class="form-label">Link</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="CNPJ" class="form-label">CNPJ</label>
                                <input type="number" class="form-control" id="CNPJ" name="CNPJ">
                            </div>

                            <div class="col-md-6">
                                <label for="cod" class="form-label">Código de cliente</label>
                                <input type="number" class="form-control" id="cod" name="cod">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
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

