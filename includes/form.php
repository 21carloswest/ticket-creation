<main>
    <section>

        <h2 class="mt-3">Novo ticket</h2>

        <form method="POST">

            <div class="form-group">
                <label for="title">Título</label>
                <input class="form-control" type = "text" name="title">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" name="description"></textarea>
            </div>

            <div class="form-row mt-3">

                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select for="status" class="form-control" name="status">
                        <option value="0">Sem solução no suporte</option>
                        <option value="1">Com equipe de desenvolvimento</option>
                        <option value="3">Resolvido</option>
                    </select>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="sys">Sistema</label>
                    <select for="sys" class="form-control" name="sys">
                        
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="SLA">Urgência</label>
                    <select for="SLA" class="form-control" name="SLA">
                        <option value="0">Imediata</option>
                        <option value="1">Urgente</option>
                        <option value="3">Normal</option>
                        <option value="4">Baixa</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Nº GCM</label>
                    <input class="form-control" type="number" min="0" name="GCM">
                </div>
                
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="author">Responsável</label>
                    <select for="author" class="form-control" name="author">
                        <option value="0">Atendente bagre</option>
                        <option value="1">Atendente bagre 2</option>
                        <option value="3">Atendente bagre 3</option>
                        <option value="4">Atendente bagre 4</option>
                        <option value="5">Atendente bagre 5</option>
                        <option value="6">Atendente bagre 6</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="costumer">Cliente</label>
                    <input for="costumer" class="form-control" name="costumer">
                </div>

                <div class="form-group col-md-4">
                    <label>Tag</label>
                    <input class="form-control" type="text" name="tag">
                </div>
                
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label>URL Sispred</label>
                    <input class="form-control" type="url" name="link">
                </div>
                
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="index.php">
                    <button type="button"class="btn btn-primary">Voltar</button>
                </a>
            </div>
        
        </form>

    </section>
</main>
