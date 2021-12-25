@extends('layouts.main')

@section('title') @parent | Ajout Commande @endsection

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
        <h3>Produit</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Ajout Commande</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Ajout Commande</h3>
                </div>
            </div>
            {{-- @include('commandes.form', ['action' => 'POST']) --}}

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th style="text-align: center"><a href="#" class="btn btn-info addRow">+</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="brandom[]" id="" class="form-control">
                                <option value="">Bonjour</option>
                                <option value="">Oza bien</option>
                                <option value="">?ayoki</option>
                            </select>
                        </td>
                        <td><input type="text" name="model[]" class="form-control"></td>
                        <td><input type="text" name="price[]" class="form-control"></td>
                        <td style="text-align: center"><a href="#" class="btn btn-danger">x</a></td>
                    </tr>
                </tbody>
        </table>
    </div>
    <!-- Add New Teacher Area End Here -->

</div>


<script type="text/javascript">
    $('.addRow').on('click', function(){
        addRow();
    });
    function addRow()
    {
        alert('lisoko');
    }
    </script>
@endsection
