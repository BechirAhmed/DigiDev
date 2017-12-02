@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-5">
      <div class="column">
        <h1 class="title is-one">Edit User Details</h1>
      </div>
      <div class="column">
        <a href="{{ route('users.show', $user->id) }}" class="button is-danger is-pulled-right" style="width:250px">Cancel</a>
      </div>
    </div>
    <hr class="m-t-0">

        <form action="{{ route('users.update', $user->id) }}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" name="name" id="name" class="input" value="{{$user->name}}">
                  </p>
                </div>

                <div class="field">
                  <label for="first_name" class="label">First Name</label>
                  <p class="control">
                    <input type="text" name="first_name" id="first_name" class="input" value="{{$user->first_name}}">
                  </p>
                </div>

                <div class="field">
                  <label for="last_name" class="label">Last Name</label>
                  <p class="control">
                    <input type="text" name="last_name" id="last_name" class="input" value="{{$user->last_name}}">
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
              </div>
            </div>
            <hr>
              <div class="columns">
                <div class="column">
                  <button class="button is-primary is-pulled-right" style="width:250px;">Save Changes</button>
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
