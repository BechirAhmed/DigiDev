@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column is-one-third">
        <a href="{{ route('users.index') }}" class="button is-primary"><i class="fa fa-long-arrow-left"></i>&nbsp;Back to Users</a>
      </div>
      <div class="column  is-one-third">
        <h1 class="title is-one">View User Details</h1>
      </div>
      <div class="column  is-one-third">
        <a href="{{ route('users.edit', $user->id) }}" class="button is-primary is-pulled-right"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit User</a>
      </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">

        <div class="field">
          <label for="name" class="label">Username</label>
          <pre>{{ $user->name }}</pre>
        </div>

        <div class="field">
          <label for="first_name" class="label">First Name</label>
          <pre>{{ $user->first_name }}</pre>
        </div>

        <div class="field">
          <label for="last_name" class="label">Last Name</label>
          <pre>{{ $user->last_name }}</pre>
        </div>

        <div class="field">
          <label for="email" class="label">Email</label>
          <pre>{{ $user->email }}</pre>
        </div>

        <div class="field">
          <label for="roles" class="label">Roles</label>
          <ul>
            {{ $user->roles->count() == 0 ? 'This user has not been assigned any roles yet!!!.' : '' }}
            @foreach ($user->roles as $role)
              <li>{{ $role->display_name }} ({{ $role->description }})</li>
            @endforeach
          </ul>
        </div>

      </div>
    </div>
  </div>
@endsection
