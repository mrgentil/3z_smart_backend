<form class="new-added-form" action="{{ isset($action) && $action ===  'POST' ?  route('commandes.store') :  route('commandes.update', $commande) }}"
enctype="multipart/form-data" method="POST">
    <div class="row">
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
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>QUantité *</label>
            <input type="text" name="quantity" value="{{ (old('quantity')) ? old('quantity') : ((isset($commande) ? $commande->quantity : '')) }}"  class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantité" required="required">
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Table *</label>
            <select id="table_espace_id" value="{{ (old('table_espace_id')) ? old('table_espace_id') : ((isset($commande) ? $commande->table_espace_id : '')) }}" name="table_espace_id" class="form-control select2 @error('table_espace_id') is-invalid @enderror">
                @foreach ($tables as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Produit *</label>
            <select id="product_id" value="{{ (old('product_id')) ? old('product_id') : ((isset($commande) ? $commande->product_id : '')) }}" name="product_id[]" class="form-control select2 @error('product_id') is-invalid @enderror" multiple="multiple">
                @foreach ($products as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12 form-group mg-t-8">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{ isset($action) && $action ===  'POST' ? 'Enregistrer' : 'Modiier' }}</button>

        </div>
    </div>
</form>
