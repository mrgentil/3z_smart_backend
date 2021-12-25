@extends('layouts.main')

@section('title') @parent | Details @endsection

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
        <h3>Detail Menu</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Detail Menu {{ $carteMenu->name }}</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>A propos de Menu : {{ $carteMenu->name }}</h3>
                </div>

            </div>
            <div class="single-info-details">
                <div class="item-content">

                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                @forelse ($carteMenu->products  as $item )
                                <li>{{ $item->name }}</li>
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
    </div>
</div>
@endsection
