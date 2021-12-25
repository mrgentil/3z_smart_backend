@extends('layouts.main')

@section('title') @parent | Les Accès @endsection

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
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Niveau Accès</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Modification Niveau Accès</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add New Book Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Modification Niveau Accès</h3>
                </div>

            </div>
            @include('roles.form', ['action' => 'PUT', 'role' => $roles])

        </div>
    </div>

</div>

@endsection
