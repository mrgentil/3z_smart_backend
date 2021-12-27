@extends('layouts.main')

@section('title') @parent | Les Stocks @endsection

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
        <h3>Les Stocks</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Acueil</a>
            </li>
           {{--  <li><a class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" href="{{ route('products.create') }}"> Ajouter un produit</a></li> --}}
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Les Stocks</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Seuil Produit</th>
                        <th>Stock</th>

                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($stocks as $item)
                        <tr>
                            <td>{{$item->name}}</td>

                                                <td>{{$item->categorie->name}}</td>
                                                <td>{{$item->notif_min}}</td>
                                                <td><span style="color:red;">{{$item->stock}}</span></td>


                        </tr>
                    @empty
                        <li class="col-md-12 col-sm-12 col-xs-12">
                            Aucun Produit trouvé
                        </li>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
