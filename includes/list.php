<div class="ps-3">
    <div class="btn-group">
        <button class="btn btn-success me-2" onclick="window.location='create.php'">Novo</button>
        <button class="btn btn-primary me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
        </button>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastro
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user/newUser.php">Usuário</a></li>
                <li><a class="dropdown-item" href="sys/newSys.php">Sistema</a></li>
                <li><a class="dropdown-item" href="costumer/newCostumer.php">Cliente</a></li>
                <li><a class="dropdown-item" href="tag/newTag.php">Tag</a></li>
                <li><a class="dropdown-item" href="status/newStatus.php">Status</a></li>
                <li><a class="dropdown-item" href="sla/newSla.php">SLA</a></li>
                <li><a class="dropdown-item" href="category/newCategory.php">Categoria</a></li>
                <li><a class="dropdown-item" href="macro/newMacro.php">Macro</a></li>
                <li><a class="dropdown-item" href="team/newTeam.php">Equipe</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Lista
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user/viewUser.php">Usuário</a></li>
                <li><a class="dropdown-item" href="sys/viewSys.php">Sistema</a></li>
                <li><a class="dropdown-item" href="costumer/viewCostumer.php">Cliente</a></li>
                <li><a class="dropdown-item" href="tag/viewTag.php">Tag</a></li>
                <li><a class="dropdown-item" href="status/viewStatus.php">Status</a></li>
                <li><a class="dropdown-item" href="sla/viewSla.php">SLA</a></li>
                <li><a class="dropdown-item" href="category/viewCategory.php">Categoria</a></li>
                <li><a class="dropdown-item" href="macro/viewMacro.php">Macro</a></li>
                <li><a class="dropdown-item" href="team/viewTeam.php">Equipe</a></li>
            </ul>
        </div>
    </div>
    <section>

        <table class="table bg-light mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Responsável</th>
                </tr>
            </thead>

            <tbody>
                <?= $resultado;?>

            </tbody>
        </table>

    </section>
</div>
