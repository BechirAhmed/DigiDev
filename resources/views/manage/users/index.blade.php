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
              <th>Username</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Date Created</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)

              <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}"><em>{{ $user->email }}</em></a></td>
                <td>
                  @foreach ($user->roles as $role)
                    @if ($role->name == 'superadministrator')
                      @php $label = 'success' @endphp
                    @elseif ($role->name == 'administrator')
                      @php $label = 'primary' @endphp
                    @elseif ($role->name == 'editor')
                      @php $label = 'info' @endphp
                    @elseif ($role->name == 'author')
                      @php $label = 'info' @endphp
                    @elseif ($role->name == 'contributor')
                      @php $label = 'light' @endphp
                    @elseif ($role->name == 'supporter')
                      @php $label = 'warning' @endphp
                    @elseif ($role->name == 'subscriber')
                      @php $label = 'danger' @endphp

                    @endif
                    <span class="tag is-{{$label}} is-rounded">
                      <em>
                        {{ $role->display_name }}
                      </em>
                    </span>
                  @endforeach
                </td>
                <td style="font-size: smaller">
                  {{ $user->created_at->toFormattedDateString() }}
                </td>
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
