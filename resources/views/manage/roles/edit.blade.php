@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="subtitle">Edit {{ $role->display_name }}</h1>
      </div>
      <div class="column">
        <button type="submit" class="button is-success is-pulled-right">Save changes to Role</button>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Roles Details:</h2>
                  <div class="field">
                    <p class="control">
                      <label for="display_name" class="label">Name (Human Readable)</label>
                      <input type="text" name="display_name" value="{{ $role->display_name }}" class="input" id="display_name">
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="name" class="label">Slug (Can not be Edited)</label>
                      <input type="text" name="name" value="{{ $role->name }}" class="input" id="name" disabled>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <label for="description" class="label">Description</label>
                      <input type="text" name="description" value="{{ $role->description }}" class="input" id="description">
                    </p>
                  </div>
                  <input type="hidden" name="permissions" :value="permissionsSelected">
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permissions:</h2>
                  <div class="block">
                      @foreach ($permissions as $permission)
                        <div class="field">
                          <b-checkbox v-model="permissionsSelected" :native-value="{{ $permission->id }}">{{ $permission->display_name }}&nbsp;<em>{{ $permission->description }}</em></b-checkbox>
                        </div>
                      @endforeach
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
      <button type="submit" class="button is-success is-pulled-right">Save changes to Role</button>
    </form>
  </div>
@endsection

@section('scripts')
  <script>
    const app = new Vue({
      el: '#app',
      data:{
        permissionsSelected: []
      }
    });
    app.permissionsSelected = {!! $role->permissions->pluck('id') !!};
  </script>
@endsection
