@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New User</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{ route('users.store') }}" role="form" method="POST">
      {{ csrf_field() }}
      <div class="columns">
        <div class="column">

          <div class="field">
            <label for="name" class="label">Username</label>
            <p class="control">
              <input type="text" name="name" id="name" class="input">
            </p>
          </div>
          <div class="field">
            <label for="first_name" class="label">First Name</label>
            <p class="control">
              <input type="text" name="first_name" id="first_name" class="input">
            </p>
          </div>
          <div class="field">
            <label for="last_name" class="label">Last Name</label>
            <p class="control">
              <input type="text" name="last_name" id="last_name" class="input">
            </p>
          </div>
          <div class="field">
            <label for="email" class="label">Email Address</label>
            <p class="control">
              <input type="text" name="email" id="email" class="input">
            </p>
          </div>
          <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
              <input type="text" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
              <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
            </p>
          </div>
        </div>
        <div class="column">
          <label for="roles" class="label">Roles</label>
          <input type="hidden" name="roles" :value="rolesSelected">
          <div class="block">
              @foreach ($roles as $role)
                <div class="field">
                  <b-checkbox v-model="rolesSelected" :native-value="{{ $role->id }}">{{ $role->display_name }}</b-checkbox>
                </div>
              @endforeach
          </div>
        </div>
      </div>
      <hr>
      <div class="columns">
        <div class="column">
          <button class="button is-success is-pulled-right is-medium" type="submit">Create User</button>
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
        auto_password: true,
        rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
      }
    });
  </script>
@endsection
