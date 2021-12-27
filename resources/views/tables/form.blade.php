<form class="new-added-form" action="{{ isset($action) && $action ===  'POST' ?  route('tables.store') :  route('tables.update', $table) }}"
enctype="multipart/form-data" method="POST">
@csrf
    @if(isset($action) && $action ===  'PUT')
        <input type="hidden" name="_method" value="PUT">
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
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Intitulé*</label>
            <input type="text" name="name" value="{{ (old('name')) ? old('name') : ((isset($table) ? $table->name : '')) }}"  class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nom" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Produit *</label>
            <select id="espace_id"  value="{{ (old('espace_id')) ? old('espace_id') : ((isset($menu) ? $menu->espace_id : '')) }}" name="espace_id[]" class="form-control select2  @error('espace_id') is-invalid @enderror" multiple="multiple">
                @foreach ($espaces as $item)
                    <option {{ in_array($item->id) ? 'selected' : '' }}  value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Espace *</label>
            <select id="espace_id" value="{{ (old('espace_id')) ? old('espace_id') : ((isset($table) ? $table->espace_id : '')) }}" name="espace_id" class="form-control select2 @error('espace_id') is-invalid @enderror">
                @foreach ($espaces as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-none d-xl-block form-group">

        </div>
        <div class="col-12 form-group mg-t-8">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{ isset($action) && $action ===  'POST' ? 'Enregistrer' : 'Modiier' }}</button>
        </div>
    </div>
</form>
