<main>
    <section>
        <?php echo @$msg ?>
        <p class="mt-3"><?="Ticket: ".$obTicket->id.". Data: ".date("d/m/Y à\s H:i", strtotime($obTicket->data))?></p>

        <form method="POST" class="d-flex flex-row">

            <div class="d-flex flex-column me-3">
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select for="status" class="form-control" id="status"name="status">
                        <?=$aftermathStatus?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sys">Sistema</label>
                    <select for="sys" class="form-control" id="sys"name="sys">
                        <option value="0">Quero Faturar</option>
                        <option value="1">Parceiros</option>
                        <option value="3">Diamond</option>
                        <option value="4">Sispred</option>
                        <option value="5">Factoring</option>
                        <option value="6">CRM</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="SLA">Urgência</label>
                    <select for="SLA" class="form-control" id="SLA"name="SLA">
                        <?=$aftermathSla?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="GCM">Nº GCM</label>
                    <input class="form-control" type="number" min="0" id="GCM"name="GCM">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="author">Responsável</label>
                    <select for="author" class="form-control" id="author"name="author">
                        <option value="0">Atendente bagre</option>
                        <option value="1">Atendente bagre 2</option>
                        <option value="3">Atendente bagre 3</option>
                        <option value="4">Atendente bagre 4</option>
                        <option value="5">Atendente bagre 5</option>
                        <option value="6">Atendente bagre 6</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="costumer">Cliente</label>
                    <input for="costumer" class="form-control" id="costumer"name="costumer">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tag">Tag</label>
                    <select for="tag" class="form-control" id="tag" name="tag">
                        <?=$aftermathTag?>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-column col-md-10">
                <div class="navbar-nav-scroll px-3">
                <div class="mb-3">
                    <label class="form-label" for="title">Título</label>
                    <input class="form-control" type = "text" id="title"name="title">
                </div>

                <?= $aftermath?>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Última Descrição</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method=POST>
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="descEdit" class="col-form-label">Descrição:</label>
                                            <textarea class="form-control" id="descEdit" name="descEdit" rows="14"></textarea>
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

                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel1">Nova interação</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method=POST>
                                <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="newDesc" class="col-form-label">Descrição:</label>
                                            <textarea class="form-control" id="newDec" name="newDesc" rows="14"></textarea>
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

                </div>
                <div class="align-self-end mt-3">
                <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="bi bi-plus-circle"></i></button>
                <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i></button>
                <button type="button" class="btn btn-primary me-2" onclick="window.location='index.php'">Voltar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            </div>
    </section>
</main>

