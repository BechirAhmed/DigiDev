@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit User</h1>
      </div>
    </div>
    <hr class="m-t-0">

        <form action="{{ route('users.update', $user->id) }}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
    <div class="columns">
          <div class="column">
            <div class="field">
              <label for="name" class="label">Name</label>
              <p class="control">
                <input type="text" name="name" id="name" class="input" value="{{$user->name}}">
              </p>
            </div>

            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input type="text" name="email" id="email" class="input" value="{{$user->email}}">
              </p>
            </div>

            <div class="field">
              <label for="password" class="label">Password</label>
                <div>
                  <div class="field">
                    <b-radio v-model="password_options" name="password_options" native-value="keep">Do not Change the Password</b-radio>
                  </div>
                  <div class="field">
                    <b-radio v-model="password_options" name="password_options" native-value="auto">Auto Generate New Password</b-radio>
                  </div>
                  <div class="field">
                    <b-radio v-model="password_options" name="password_options" native-value="manual">Manually Set New Password</b-radio>
                    <p class="control">
                      <input type="text" name="password" id="password" class="input m-t-15" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
                    </p>
                  </div>
                </div>
              </div>
          </div>
          <div class="column">
            <label for="roles" class="label">Roles</label>
            <input type="hidden" name="roles" :value="rolesSelected">
            <div class="block">
                @foreach ($roles as $role)
                  <div class="field">
                    <b-checkbox v-model="rolesSelected" :native-value="{{ $role->id }}">{{ $role->name }}</b-checkbox>
                  </div>
                @endforeach
            </div>
            <button class="button is-primary is-pulled-right" style="width:250px;">Edit User</button>
          </div>
    </div>
  </form>
  </div>

@endsection

@section('scripts')
  <script>
    const app = new Vue({
      el: '#app',
      data:{
        password_options: '',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });
    app.password_options = 'keep';
  </script>
@endsection
