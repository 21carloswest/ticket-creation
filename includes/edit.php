<main>
    <section>

        <h3 class="mt-3"><?=$obTicket->id." ".date("d/m/Y à\s H:i", strtotime($obTicket->data))?></h3>

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
                        <?=$aftermathSys?>
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
                    <input class="form-control" type="number" min="0" id="GCM"name="GCM" value="<?=$obTicket->GCM?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="author">Responsável</label>
                    <select for="author" class="form-control" id="author"name="author">
                        <?=$aftermathUser?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="costumer">Cliente</label>
                    <select for="costumer" class="form-control" id="costumer"name="costumer">
                        <?=$aftermathCostumer?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tag">Tag</label>
                    <select for="tag" class="form-control" id="tag" name="tag">
                        <?=$aftermathTag?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="category">Categoria</label>
                    <select for="category" class="form-control" id="category" name="category">
                        <?=$aftermathCategory?>
                    </select>
                </div>

            </div>

            <div class="d-flex flex-column col-md-10 navbar-nav-scroll px-3">
                <div class="mb-3">
                    <label class="form-label" for="title">Título</label>
                    <input class="form-control" type = "text" id="title" name="title">
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