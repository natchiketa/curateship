@extends('admin::layouts.master')
@section('content')
  @include('page::partials.modals')
  @include('page::partials.edit-modals')
  @include('page::partials.reject-modal')
  <section>
    <div class="container max-width-lg">
      <div class="grid">
        @include('admin::partials.sidebar')
        <main class="position-relative z-index-1 col-12@md link-card">
            <div id="site-table-with-pagination-container">
                @include('page::partials.control')
                <div class="margin-top-auto border-top border-contrast-lower"></div><!-- Divider -->
                    <div class="padding-sm">
                    @include('page::partials.table')
                    </div><!-- Padding -->
                </div>
            </div><!-- /#site-table-with-pagination-container -->
        </main><!-- .column -->
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('page::partials.script-js')
@endpush
