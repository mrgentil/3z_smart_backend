<form class="new-added-form" action="{{ isset($action) && $action ===  'POST' ?  route('espaces-tables.store') :  route('espaces-tables.update', $table) }}"
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

        
        <div class="col-md-3 d-none d-xl-block form-group">

        </div>
        <div class="col-12 form-group mg-t-8">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{ isset($action) && $action ===  'POST' ? 'Enregistrer' : 'Modiier' }}</button>
        </div>
    </div>
</form>
