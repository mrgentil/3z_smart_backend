@extends('layouts.main')

@section('title') @parent | Les Utilisateurs @endsection

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
        <h3>Accès</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Acueil</a>
            </li>
            <li><a class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" href="{{ route('users.create') }}"> Ajouter un utilisateur</a></li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Les Niveaux Accès</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <th>Avatar</th>
                        <th>Nom</th>
                        <th>PostNom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Adresse Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($users as $item)
                        <tr>
                            <td class="text-center"><img src="{{asset($item->xsLogo)}}" alt="{{ $item->name }}"></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->firstName}}</td>
                                                <td>{{$item->lastNAme}}</td>
                                                <td>{{$item->adress}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->role->name}}</td>
                            <td>
                                <div class="d-flex">

                                        <a href="{{route('users.edit',$item)}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('users.show',$item)}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-eye"></i></a>


                                        <form id="{{$item->id}}" action="{{route('users.destroy', $item)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash "></i></button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <li class="col-md-12 col-sm-12 col-xs-12">
                            Aucun Utilisateur trouvé
                        </li>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
