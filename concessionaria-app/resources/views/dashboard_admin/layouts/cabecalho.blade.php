<header class="bg-white">
    <h2>
        <label for="menu">
            <i class="fa-solid fa-bars-staggered" tooltip="tooltip" title="MENU"></i>
        </label>
    </h2>

    <div class="btn-group mb-2">
        <button type="button" class="btn bg-white dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <i class="fa-solid fa-user me-2"></i> {{Auth::user()->name}}
        </button>
        <ul class="dropdown-menu dropdown-menu-lg-end">
            <li>
                <a class="dropdown-item" href="#" tooltip="tooltip" title="Perfil">
                    Perfil
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Sair</button>
                </form>

                <!-- <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <a type="submit" class="dropdown-item text-danger" tooltip="tooltip" title="Sair do Sistema">
                        Sair
                    </a>
                </form> -->

            </li>
        </ul>
    </div>

</header>