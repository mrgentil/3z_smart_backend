@extends('layouts.main')

@section('title') @parent | Validation Commande @endsection

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
        <h3>Validation Commande</h3>
        <ul>
            <li>
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <li>Validation Commande</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
 <div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
                <div class="item-title">
                    <h3>Validation Commande</h3>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <label>Table *</label>
                <select id="table_id"  name="table_id" class="form-control select2 @error('table_id') is-invalid @enderror">
                    @foreach ($tables as $item)
                        <option data-href="{{ route('validation.show',$item->id) }}"  value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 form-group mg-t-8">
                <button  id="btn-submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Suivant</button>

            </div>

    </div>
    <!-- Add New Teacher Area End Here -->

</div>



@endsection

@push('script')

<script>

    $("#btn-submit").on('click',()=>{
        const href = $('#table_id :selected').attr('data-href')
        window.location.href = href

    })
</script>

@endpush
