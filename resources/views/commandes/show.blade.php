@extends('layouts.main')

@section('title') @parent | Les Commandes @endsection

@section('description')
    @yield('description')
@endsection

@section('keywords')
    ('keywords') 3z Smart
@endsection

@section('meta-image')
    ('meta-image'){{ asset('img/favicon.png') }}
@endsection

@section('content')
 <!-- Sidebar Area End Here -->
 <div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Les Commandes</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Acueil</a>
            </li>
            {{-- <li><a class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" href="{{ route('commandes.create') }}"> Ajouter une commande</a></li> --}}
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Commande de la table {{ $facture->table->name }}</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Numero Commande</th>
                        <th>Produit</th>
                        <th>Prix Unitaire</th>
                        <th>Quantité</th>
                        <th>Montant Total</th>
                        <th>Date Commande</th>
                        
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($produits as $item)
                        <tr>
                            <td>{{$item->id}}</td>

                                                <td>{{$item->name}}</td>
                                                <td>{{$item->pivot->price_unit}}</td>
                                                <td>{{$item->pivot->quantity}}</td>
                                                <td>{{$item->pivot->quantity * $item->pivot->price_unit}}</td>
                                                <td>{{$item->created_at}}</td>

                        </tr>
                    @empty
                        <li class="col-md-12 col-sm-12 col-xs-12">
                            Aucune Commande trouvée
                        </li>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
