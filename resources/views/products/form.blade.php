<form class="new-added-form" action="{{ isset($action) && $action ===  'POST' ?  route('products.store') :  route('products.update', $product) }}"
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
            <label>Nom *</label>
            <input type="text" name="name" value="{{ (old('name')) ? old('name') : ((isset($product) ? $product->name : '')) }}"  class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nom" required="required">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Prix produit *</label>
            <input type="text" value="{{ (old('price_product')) ? old('price_product') : ((isset($product) ? $product->price_product : '')) }}" name="price_product" class="form-control @error('price_product') is-invalid @enderror" id="price_product" placeholder="Prix produit" required="required">
            @error('price_product')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Stock *</label>
            <input type="text" name="stock" value="{{ (old('stock')) ? old('stock') : ((isset($product) ? $product->stock : '')) }}"  class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="Stock" required="required">
            @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Seuil Stock *</label>
            <input type="text" value="{{ (old('notif_min')) ? old('notif_min') : ((isset($product) ? $product->notif_min : '')) }}" name="notif_min" class="form-control @error('notif_min') is-invalid @enderror" id="notif_min" placeholder="Seuil stock" required="required">
            @error('notif_min')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Portion</label>
            <input type="text" value="{{ (old('portion')) ? old('portion') : ((isset($product) ? $product->portion : '')) }}" name="portion" class="form-control @error('portion') is-invalid @enderror" id="portion" placeholder="Portion" >
            @error('portion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Categorie *</label>
            <select id="categorie_id" value="{{ (old('categorie_id')) ? old('categorie_id') : ((isset($product) ? $product->categorie_id : '')) }}" name="categorie_id" class="form-control select2 @error('role_id') is-invalid @enderror">
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Prix portion </label>
            <input type="text" value="{{ (old('price_portion')) ? old('price_portion') : ((isset($product) ? $product->price_portion : '')) }}" name="price_portion" class="form-control @error('price_portion') is-invalid @enderror" id="price_portion" placeholder="prix portion">
            @error('price_portion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="col-12 form-group mg-t-8">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{ isset($action) && $action ===  'POST' ? 'Enregistrer' : 'Modiier' }}</button>

        </div>
    </div>
</form>
