@extends('layouts.main')

@section('title') @parent | Les Tables @endsection

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
            <li><a class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" href="{{ route('tables.create') }}"> Ajouter une table</a></li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Les Tables</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                        <th>Nom </th>
                        <th>Espace</th>
                        <th>Actions</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tables as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->espace->name}}</td>
                            <td>
                                <div class="d-flex">

                                        <a href="{{route('tables.edit',$item)}}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-edit"></i></a>
                                        <form id="{{$item->id}}" action="{{route('tables.destroy', $item)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash "></i></button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <li class="col-md-12 col-sm-12 col-xs-12">
                            Aucune Table trouvée
                        </li>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
