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
                    <h3>Les Commandes</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Numero Commande</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Montant Total</th>
                        <th>Nom du Serveur</th>
                        <th>Statut</th>
                        <th>Numero Client</th>
                        <th>N# Facturation</th>
                        <th>Espace</th>
                        <th>Date Commande</th>
                        <th>Actions</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($commandes as $item)
                        <tr>
                            <td>{{$item->num_commande}}</td>

                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->state}}</td>
                                                <td>{{$item->phone_client}}</td>
                                                <td>{{$item->num_facture}}</td>
                                                <td>{{$item->table->name}}</td>
                                                <td>{{$item->created_at}}</td>
                            <td>
                                <div class="d-flex">

                                        <a href="{{route('commandes.edit',$item)}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-edit"></i></a>


                                        <form id="{{$item->id}}" action="{{route('commandes.destroy', $item)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash "></i></button>
                                        </form>
                                </div>
                            </td>
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
