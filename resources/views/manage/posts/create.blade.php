@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Add New Blog Post</h1>
      </div>
    </div>
    <hr class="m-t-0">


        <form action="{{ route('posts.store') }}" role="form" method="POST">
          {{ csrf_field() }}
          <div class="columns">
            <div class="column is-three-quarters-desktop">
              <b-field>
                <b-input type="text" placeholder="Post Title" size="is-large" v-model="title"></b-input>
              </b-field>
              <slug-widget url="{{url('/')}}" subdirectory="/blog/" :title="title" @slug-changed="updateSlug"></slug-widget>

              <b-field class="m-t-15">
                <b-input type="textarea" placeholder="Write here your post..." rows="30"></b-input>
              </b-field>

            </div><!-- end of .column is-three-quarters -->
            <div class="column is-one-quarter-desktop is-narrow-tablet">
              <div class="card card-widget">
                  <div class="author-widget widget-area">
                    <div class="selected-author">
                      <img src="{{asset('images/twitt.png')}}"/>
                      <div class="author">
                        <h4>Bechir Ahmed</h4>
                        <p class="subtitle">
                          (Bechir_A)
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="post-status-widget widget-area">
                    <div class="status">
                      <div class="status-icon">
                        <b-icon icon="assignment" size="is-medium"></b-icon>
                      </div>
                      <div class="status-details">
                        <h4><span class="status-emphasis">Draft</span> Saved</h4>
                        <p>A few minutes ago (saved)</p>
                      </div>
                    </div>
                  </div>
                  <div class="publish-buttons-widget widget-area">
                    <div class="secondary-action-button">
                      <button class="button is-info is-outlined is-fullwidth">Save</button>
                    </div>
                    <div class="primary-action-button">
                      <button class="button is-primary is-fullwidth">Publish</button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </form>
  </div>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        title: '',
        slug: ''
      },
      methods: {
        updateSlug: function(val) {
          this.slug = val;
        }
      }
    });
  </script>
@endsection
