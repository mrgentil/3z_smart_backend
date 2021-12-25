@extends('layouts.main')

@section('title') @parent | Ajout Utilisateur @endsection

@section('description')
    @yield('description')
@endsection

@section('keywords')
    ('keywords') 3Z Smart
@endsection

@section('meta-image')
    ('meta-image'){{ asset('img/favicon.png') }}
@endsection

@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teacher</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Ajout Utilisateur</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Ajout Utilisateur</h3>
                </div>
            </div>
            @include('user.form', ['action' => 'POST'])
        </div>
    </div>
    <!-- Add New Teacher Area End Here -->

</div>

@endsection
