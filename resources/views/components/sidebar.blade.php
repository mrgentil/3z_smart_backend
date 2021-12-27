<div class="sidebar-menu-content">
    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-home"></i><span>ACCUEIL</span></a>
        </li>
        @if(in_array('Admin. Système', $module_array))
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-settings"></i><span>ADMIN. SYSTEME</span></a>
            <ul class="nav sub-group-menu">
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Config. Niveau Accès
                        </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config. Compte des Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Config.
                        Categorie
                        Produit</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config.
                            Produit</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('espaces-tables.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config.
                            Espaces
                        </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tables.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config.

                            Tables
                        </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('menus.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config.
                            Carte/Menu
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Config.
                            Notification
                    </a>
                </li> --}}
            </ul>
        </li>
        @endif
        @if(in_array('Tableau de bord', $module_array))
        <li class="nav-item sidebar-nav-item">
            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>TABLEAU DE
                BORD</span></a>
            <ul class="nav sub-group-menu">
                <li class="nav-item">
                    <a href="{{ route('commandes.create') }}" class="nav-link"><i class="fas fa-angle-right"></i>Ajout Commande</a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('commandes.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Commandes</a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('validation') }}" class="nav-link"><i class="fas fa-angle-right"></i>Validation Commande</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('facture.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Factures</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stock') }}" class="nav-link"><i
                            class="fas fa-angle-right"></i>Stock</a>
                </li>
            </ul>
        </li>
        @endif
        @if(in_array('Nos Analyses', $module_array))
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-chart-bar"></i><span>NOS ANALYSES</span></a>
        </li>
        @endif
{{--         @if(in_array('Notification', $module_array))
        <li class="nav-item">
            <a href="" class="nav-link"><i
                    class="far fa-bell"></i><span>NOTIFICATION</span></a>
        </li>
        @endif
 --}}
    </ul>
</div>
