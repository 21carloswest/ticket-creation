<div>
    <div class="d-flex flex-row">
        <div class="simplebar-content d-flex flex-column justify-content-start  table-overflow me-3 text-light shadow min-vh-100" style="background-color: #474787">
            
            <div class="input-group">
                <input type="text" class="form-control rounded-0" placeholder="Pesquisar Ticket" aria-label="Pesquisar Ticket" aria-describedby="Pesquisar Ticket">
                <div class="input-group-append">
                    <button class="btn btn-outline-secundary btn-light bi-search rounded-0" type="button" id="button-addon2"></button>
                </div>
            </div>
            <div class="">
                <ul class="navbar-nav vld-parent d-flex flex-column"> <!-- Itens da nav bar -->
                    <li class="dropdown dropend sidebar-item ">
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ticket
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="create.php">Novo Ticket</a></li>
                            <li class="dropdown-item"><a href="#">Lista de Tickets</a></li>
                        </ul>
                    </li>
                    <li><a class="list sidebar-item flex-grow-1" href="user/viewUser.php">Usuário</a></li>
                    <li><a class="list sidebar-item" href="sys/viewSys.php">Sistema</a></li>
                    <li><a class="list sidebar-item" href="costumer/viewCostumer.php">Cliente</a></li>
                    <li><a class="list sidebar-item" href="tag/viewTag.php">Tag</a></li>
                    <li><a class="list sidebar-item" href="status/viewStatus.php">Status</a></li>
                    <li><a class="list sidebar-item" href="sla/viewSla.php">SLA</a></li>
                    <li><a class="list sidebar-item" href="category/viewCategory.php">Categoria</a></li>
                    <li><a class="list sidebar-item" href="macro/viewMacro.php">Macro</a></li>
                    <li><a class="list sidebar-item" href="team/viewTeam.php">Equipe</a></li>    
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
</div>
