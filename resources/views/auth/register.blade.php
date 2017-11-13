@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-50">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Join The Community</h1>
          <form class="" action="{{ route('register') }}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="field">
              <label for="name" class="label">Name</label>
              <p class="control">
                <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required>
              </p>
              @if ($errors->has('name'))
                <p class="help is-danger">{{ $errors->first('name') }}</p>
              @endif
            </div>
            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
              </p>
              @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
              @endif
            </div>
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                    <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password" required>
                  </p>
                  @if ($errors->has('password'))
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                  @endif
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label for="password-confirm" class="label">Confirm Password</label>
                  <p class="control">
                    <input class="input {{ $errors->has('password-confirm') ? 'is-danger' : '' }}" type="password" name="password_confirmation" id="password-confirm" required >
                  </p>
                  @if ($errors->has('password-confirm'))
                    <p class="help is-danger">{{ $errors->first('password-confirm') }}</p>
                  @endif
                </div>
              </div>
            </div>

            <button type="submit" class="button is-primary is-outlined is-fullwidth m-t-30">
              Register
            </button>
          </form>
        </div> <!-- End of Card-Content -->
      </div> <!-- End of Card -->
      <h5 class="has-text-centered m-t-15"><a href="{{ route('login') }}" class="is-muted">Already have an Account? Log In</a></h5>
    </div>
  </div>

@endsection
