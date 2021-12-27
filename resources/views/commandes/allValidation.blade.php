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

        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Les Commandes de la table {{ $table->name }}</h3>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Table *</label>
                <select id="table_id"  name="table_id" class="form-control select2 @error('table_id') is-invalid @enderror">
                    @foreach ($tables as $item)
                        <option data-href="{{ route('validation.show',$item->id) }}" {{ $table->id==$item->id?"selected":null }} value="{{ $item->id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Nom Serveur</th>
                        <th>Nom Auteur</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Montant Total</th>

                        <th>Statut</th>

                        <th>Actions</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($commande as $item)
                        <tr>
                            <td>{{$item['user']->name}}</td>
                            <td>{{$item['user']->name}}</td>

                            <td>{{$item['product']->name}}</td>
                            <td>{{$item['quantity']}}</td>
                            <td>{{$item['price_product']}}</td>
                             <td>{{$item['price_total']}}</td>
                            <td>{{$item['state']}}</td>


                            <td>
                                <div class="d-flex">

                                        <a href="{{route('change',$item['id'])}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fas fa-toggle-on"></i></a>
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
                <div class="col-12 form-group mg-t-8">
                    <a href="{{ route('facture',$table->id) }}"  type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Facturer</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#table_id').on('change',(e)=>{
        const href = $('#table_id :selected').attr('data-href')
        window.location.href = href
    })
</script>

@endpush
