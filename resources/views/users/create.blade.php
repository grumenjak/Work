@extends('layouts.master')
    
@section('content')

    <div class="card">
        <div class="card-header">Kreiraj korisnika</div>
        <div class="card-body">

        <form method="POST" action="{{ route('users.store') }}">
            <!--Ovo se dodaje u svaku formu - Cross site request forgery-->
            @csrf 
            <div class="form-group">
                <label for="name">Ime</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" placeholder="Upišite svoje ime">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Upišite vaš email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Upišite vašu lozinku">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Ponovite Password</label>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Ponovite vašu lozinku">
            </div>
            <div class="form-group">
                <a href="{{  route('users.index') }}" class="btn btn-warning">Nazad</a>
                <button type="submit" class="btn btn-success float-right">Kreiraj</button>
            </div>

            <!-- Ako postoji ikoja greška onda ispiši ovo ispod   -->
            @if ($errors->any())  
            <div class="form-group">
                <!-- greške od validacije iz UserController.php   -->
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </form>

        </div>
    </div>

@endsection