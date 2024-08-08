<input type="checkbox" id="menu">
<div class="sidebar">
    <div class="sidebarLogo">
        <a href="{{url('/')}}" data-bs-toggle="tooltip" title="Página Inicial">
            <div class="logo">
                <img src="/storage/img/icon.png" class="img-menu" alt="KeyVehicles Icone"/>
            </div>
        </a>
    </div>

    <div class="sidebarMenu">
        <ul>
            <li class="sidebarTitulo">
                Administração
            </li>
            <li>
                <a href="{{url('/dashboard/administracao')}}" tooltip="tooltip" title="Dashboard">
                    <i class="fa-solid fa-file-pen"></i>
                    <span>Dashboard</span>
                </a>
            </li>  
            <li>
                <a href="{{url('/dashboard/administracao/veiculos')}}" tooltip="tooltip" title="Administração de Veículos">
                <i class="bi bi-car-front-fill"></i>
                    <span>Veículos</span>
                </a>
            </li>  
            <li>
                <a href="{{url('/dashboard/administracao/fabricantes')}}" tooltip="tooltip" title="Administração de Fabricantes">
                    <i class="fa-solid fa-list"></i>
                    <span>Fabricantes</span>
                </a>
            </li> 
            <li>
                <a href="{{url('/dashboard/administracao/usuarios')}}" tooltip="tooltip" title="Administração de Usuários">
                    <i class="fas fa-users"></i> 
                    <span>Usuários</span>
                </a>
            </li>
        </ul>
    </div>
    
</div>