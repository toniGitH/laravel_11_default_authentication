@extends('layouts.app')

@section('title', 'Index')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col">
                <h1 class="text-center mt-4">Dashboard</h1>
                <p class="text-center mt-4">Hello, {{ optional($user)->name ?? 'Guest' }} !!</p>     
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fs-4 text-center my-auto">YOUR APP CONTENT</h3>
                    </div>
                    <div class="card-body">
                        <p>Coloca aquí el contenido de tu aplicación:</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eos error alias, sequi reprehenderit iure dolore quidem dolorum distinctio labore molestiae quibusdam, provident natus libero sunt suscipit quisquam sit nulla?</p>
                    </div>    
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-6 text-end">
                <a href="{{ route('home')}}" class="btn btn-info">Back to home</a>
            </div>
            <div class="col-6 text-start">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>

    </div>
        
@endsection