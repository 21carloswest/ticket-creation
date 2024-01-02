<main>
    <section>

        <h3 class="mt-3">Ticket nº: <?=$obTicket->id.". Criado em ".$obTicket->data?></h3>

        <form method="POST" class="d-flex flex-row">

            <div class="d-flex flex-column me-3">
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select for="status" class="form-control" id="status"name="status">
                        <option value="0">Sem solução no suporte</option>
                        <option value="1">Com equipe de desenvolvimento</option>
                        <option value="3">Resolvido</option>
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
                    <input class="form-control" type="text" id="tag" name="tag">
                </div>
            </div>

            <div class="d-flex flex-column col-md-10 navbar-nav-scroll">
                <div class="mb-3">
                    <label class="form-label" for="title">Título</label>
                    <input class="form-control" type = "text" id="title"name="title">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Descrição</label>
                    <textarea class="form-control" name="description" id="description" rows="15"></textarea>
                </div>
                <?= $aftermath?>
                <div class="align-self-end">
                    <button type="button"class="btn btn-primary me-2" onclick="window.location='index.php'">Voltar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>

    </section>
</main>
