@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="text-center mb-3">👩‍🍼 Login Admin</h4>

                <input type="email" class="form-control mb-2" placeholder="Email">
                <input type="password" class="form-control mb-3" placeholder="Password">

                <button class="btn btn-warning w-100">
                    Login
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
