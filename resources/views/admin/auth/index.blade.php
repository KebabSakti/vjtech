@extends('admin.layout.app')

@section('content')
    
    <h2 class="text-center mb-4 text-white">Login | Admin</h2>
    <div class="auto-form-wrapper">
        <form method="POST" action="{{route('login.go')}}">
            @csrf
            <div class="form-group">
                <label class="label">Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-user fa-fw"></i>
                      </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-lock fa-fw"></i>
                      </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>

@endsection
