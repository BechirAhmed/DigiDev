@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>
      <div class="column">
        <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right"><span><i class="fa fa-user-plus"></i>&nbsp;&nbsp;</span>Create New User</a>
      </div>
    </div>
    <hr>
    <div class="card">
      <div class="card-content">
        <table class="table is-fullwidth is-hoverable is-narrow">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)

              <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                <td class="has-text-right"><a class="button is-light m-r-5" href="{{ route('users.show', $user->id) }}">View</a><a class="button is-outlined" href="{{ route('users.edit', $user->id) }}">Edit</a></td>
              </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    {{ $users->links() }}
  </div>
@endsection
