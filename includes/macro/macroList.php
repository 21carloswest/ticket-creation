<section>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nova</button>
    <button type="button" class="btn btn-primary me-2" onclick="window.location='/ticket-creation'">Voltar</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Macro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method=POST>
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Titulo:</label>
                            <input type="text" class="form-control" id="recipient-name" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Mensagem da Macro:</label>
                            <textarea class="form-control" id="message-text" rows=12 name="description"></textarea>
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
                <th>Título</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?=$aftermath?>
        </tbody>
    </table>

</section>