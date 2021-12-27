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
        <h3>Commandes</h3>
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
            <form action="{{ route('commandes.store') }}" method="post">
                <div class="row">
                    @csrf
                @if(isset($action))
                    <input type="hidden" name="_method">
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
             <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Table *</label>
                <select id="table_id" name="table_id" class="form-control select2 @error('table_id') is-invalid @enderror">
                    <option value="" >Choisir une table</option>
                    @foreach ($tables as $item)
                        <option value="{{$item->id}}" >{{$item->name}}</option>
                    @endforeach
                </select>
             </div>
           {{--  @include('commandes.form', ['action' => 'POST']) --}}

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Prodduit</th>
                        <th>Quantité</th>

                        <th style="text-align: center"><a id="btn-add" href="#" class="btn btn-info ">+</a></th>
                    </tr>
                </thead>
                <tbody id="product-body">
                    <tr id="product-line" class="hidden">
                        <td>
                            <select  name="product_id[]" class="form-control" >
                                @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><input type="text" name="quantity[]" class="form-control"></td>

                        <td style="text-align: center"><a href="#" class="btn btn-danger btn-remove">x</a></td>
                    </tr>
                    <tr >
                        <td>
                            <select name="product_id[]" class="form-control select2 @error('product_id') is-invalid @enderror" >
                                @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </td>

                        <td><input type="text" name="quantity[]" class="form-control"></td>

                        <td style="text-align: center"><a href="#" class="btn btn-danger btn-remove">x</a></td>
                    </tr>
                </tbody>

            </table>
            <div class="col-12 form-group mg-t-8">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Enregister</button>

            </div>
        </form>
    </div>
    <!-- Add New Teacher Area End Here -->

</div>



@endsection

@push('script')

<script>

$('.btn-remove').on('click',(e)=>{
        e.preventDefault()
        const btnRemove = $(e.target).parent().parent().remove();
    })

    $("#btn-add").on('click',()=>{
        const productLine = $("#product-line").clone();
        productLine.removeClass("hidden")
        productLine.removeAttr("id")
        const productBody = $("#product-body");
        productBody.append(productLine)

        productLine.find('select').select2({
            width: '100%'
          });

        productLine.find('.btn-remove').on('click',(e)=>{
        e.preventDefault()
        const btnRemove = $(e.target).parent().parent().remove();
    })

    })
</script>

@endpush
