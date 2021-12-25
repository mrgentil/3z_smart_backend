@extends('layouts.main')

@section('title') @parent | Les Produits @endsection

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
        <h3>Les Produits</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Acueil</a>
            </li>
            <li><a class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" href="{{ route('products.create') }}"> Ajouter un produit</a></li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Les Produits</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Notif Min</th>
                        <th>Portion</th>
                        <th>Quantité portion</th>
                        <th>Prix portion</th>
                        <th>Actions</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($products as $item)
                        <tr>
                            <td>{{$item->name}}</td>

                                                <td>{{$item->categorie->name}}</td>
                                                <td>{{$item->price_product}}</td>
                                                <td>{{$item->stock}}</td>
                                                <td>{{$item->notif_min}}</td>
                                                <td>{{$item->portion}}</td>
                                                <td>{{$item->quantity_total_portion}}</td>
                                                <td>{{$item->price_portion}}</td>
                            <td>
                                <div class="d-flex">

                                        <a href="{{route('products.edit',$item)}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-edit"></i></a>


                                        <form id="{{$item->id}}" action="{{route('products.destroy', $item)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash "></i></button>
                                        </form>
                                </div>
                            </td>
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
