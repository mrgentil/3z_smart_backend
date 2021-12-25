<form class="new-added-form" action="{{ isset($action) && $action ===  'POST' ?  route('users.store') :  route('users.update', $user) }}"
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
            <input type="text" name="name" value="{{ (old('name')) ? old('name') : ((isset($user) ? $user->name : '')) }}"  class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nom" required="required">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Post Nom *</label>
            <input type="text" value="{{ (old('firstName')) ? old('firstName') : ((isset($user) ? $user->firstName : '')) }}" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="Post nom" required="required">
            @error('firstName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Prenom *</label>
            <input type="text" name="lastNAme" value="{{ (old('lastNAme')) ? old('lastNAme') : ((isset($user) ? $user->lastNAme : '')) }}"  class="form-control @error('lastNAme') is-invalid @enderror" id="name" placeholder="Prénom" required="required">
            @error('lastNAme')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Genre *</label>
            <select id="gender_id" value="{{ (old('gender_id')) ? old('gender_id') : ((isset($user) ? $user->gender_id : '')) }}" name="gender_id" class="form-control @error('gender_id') is-invalid @enderror">
                @foreach ($genders as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>E-Mail *</label>
            <input type="email" value="{{ (old('email')) ? old('email') : ((isset($user) ? $user->email : '')) }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required="required">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Mot de passe *</label>
            <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Mot de passe" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Role *</label>
            <select id="role_id" value="{{ (old('role_id')) ? old('role_id') : ((isset($user) ? $user->role_id : '')) }}" name="role_id" class="form-control select2 @error('role_id') is-invalid @enderror">
                @foreach ($roles as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Adresse *</label>
            <input type="text" value="{{ (old('adress')) ? old('adress') : ((isset($user) ? $user->adress : '')) }}" name="adress" class="form-control @error('adress') is-invalid @enderror" id="adress" placeholder="Adresse">
            @error('adress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <label>Téléphone *</label>
            <input type="tel" value="{{ (old('phone')) ? old('phone') : ((isset($user) ? $user->phone : '')) }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Téléphone" required="required">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-lg-6 col-12 form-group mg-t-30">
            @if(isset($users))
                <p>
                    <img src="{{ asset('images/avatar/sm/' . $users->avatar) }}" alt="{{ $user->name }}" class="img-fluid img-thumbnail">
                </p>
            @endif
            <label class="text-dark-medium">Upload Avatar </label>
            <input type="file" class="form-control-file" id="avatar" name="avatar">
        </div>
        <div class="col-12 form-group mg-t-8">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{ isset($action) && $action ===  'POST' ? 'Enregistrer' : 'Modiier' }}</button>

        </div>
    </div>
</form>
