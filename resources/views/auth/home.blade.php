@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <h1 class="text-center mt-3">Welcome to your App</h1>

    <div class="container mt-4">
        <div class="row justify-content-center">
            {{-- Login Card --}}
            <div class="col-md-6">
                <div class="card p-3 home-card">
                    <div class="card-header p-2 home-card-header">
                        <h3 class="fs-4">Login</h3>
                    </div>
                    <div class="card-body p-1">
                        <form action="{{ route('login') }}" method="POST" novalidate>
                            
                            @csrf

                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="loginEmailId" class="form-label mb-0">Email:</label>
                                    @error('loginEmail', 'login')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="email" name="loginEmail" id="loginEmailId" class="form-control form-control-sm" value="{{ old('loginEmail', '', 'login') }}" required>
                            </div>
                        
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="loginPasswordId" class="form-label mb-0">Password:</label>
                                    @error('loginPassword', 'login')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="password" name="loginPassword" id="loginPasswordId" class="form-control form-control-sm" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Register Card --}}
            <div class="col-md-6">
                <div class="card p-3 home-card">
                    <div class="card-header p-2 home-card-header">
                        <h3 class="fs-4">Register</h3>
                    </div>
                    <div class="card-body p-1">
                        <form action="{{ route('register') }}" method="POST" novalidate>
                            
                            @csrf
                            
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="nameId" class="form-label mb-0">Name:</label>
                                    @error('name', 'register')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" name="name" id="nameId" class="form-control form-control-sm" value="{{ old('name', '', 'register') }}" required>
                            </div>
                        
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="emailRegisterId" class="form-label mb-0">Email:</label>
                                    @error('registerEmail', 'register')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="email" name="registerEmail" id="emailRegisterId" class="form-control form-control-sm" value="{{ old('registerEmail', '', 'register') }}" required>
                            </div>
                        
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="registerPasswordId" class="form-label mb-0">Password:</label>
                                    @error('registerPassword', 'register')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="password" name="registerPassword" id="registerPasswordId" class="form-control form-control-sm" required>
                            </div>
                        
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password_confirmation_id" class="form-label mb-0">Confirm Password:</label>
                                    @error('registerPassword_confirmation', 'register')
                                        <span class="ms-2 error-form">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="password" name="registerPassword_confirmation" id="password_confirmation_id" class="form-control form-control-sm" required>
                            </div>
                        
                            <button type="submit" class="btn btn-success mt-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col text-center">
                {{-- Determine the alert type and message --}}
                @php
                    $alertClass = '';
                    $alertMessage = '';
    
                    // Register form errors
                    if ($errors->getBag('register')->any()) {
                        $alertClass = 'alert-danger';
                        $alertMessage = $errors->getBag('register')->all(':message');
                    } 
                    // Login form errors
                    elseif ($errors->getBag('login')->any()) {
                        $alertClass = 'alert-danger';
                        $alertMessage = $errors->getBag('login')->all(':message');
                    } 
                    // Success messages and general alert
                    elseif (session('success') || session('success') === null) {
                        $alertClass = session('success') ? 'alert-info' : 'alert-warning';
                        $alertMessage = [session('success', 'You must be registered and logged in to access the App')];
                    }
                @endphp
    
                {{-- Show the alert if messages exist --}}
                @if (!empty($alertMessage))
                    @foreach ($alertMessage as $message)
                        <div class="alert {{ $alertClass }} d-inline-block" role="alert">
                            {!! $message !!}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
 
@endsection