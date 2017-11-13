@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="notification is-success">
          {{ session('status') }}
      </div>
  @endif

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Forgot Password</h1>

          <form class="" action="{{ route('password.email') }}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com">
              </p>
              @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
              @endif
            </div>

            <button class="button is-primary is-outlined is-fullwidth m-t-30">
              Get Reset Link
            </button>
          </form>
        </div> <!-- End of Card-Content -->
      </div> <!-- End of Card -->
      <h5 class="has-text-centered m-t-15"><a href="{{ route('login') }}" class="is-muted"><i class="fa fa-long-arrow-left">&nbsp&nbsp</i>Back to Login page</a></h5>
    </div>
  </div>

@endsection
