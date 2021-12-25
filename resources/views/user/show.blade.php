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
        <h3>Detail Utilisateur</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Detail Utilisateur {{ $users->name }}</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>A propos de {{ $users->name }}</h3>
                </div>

            </div>
            <div class="single-info-details">
                <div class="item-img">
                    <img src="{{asset($users->lgLogo)}}" alt="{{ $users->name }}">
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">{{ $users->name }}</h3>
                        <div class="header-elements">
                            <ul>
                                <li><a href="#"><i class="far fa-edit"></i></a></li>
                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                                <li><a href="#"><i class="fas fa-download"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Nom:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->name }}</td>
                                </tr>
                                <tr>
                                    <td>Genre:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->gender->name }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->email }}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->adress }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Role:</td>
                                    <td class="font-medium text-dark-medium">{{ $users->role->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
