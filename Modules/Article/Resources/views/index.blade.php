@extends('admin::layouts.master')
@section('content')
  @include('article::partials.modals')
  <section>
    <div class="container max-width-lg margin-top-xs">
      <div class="grid gap-md@md">
        @include('article::partials.sidebar')
        <main class="position-relative padding-top-md z-index-1 col-12@md">
            <div id="site-table-with-pagination-container">
                @include('article::partials.control')
                <div class="bg radius-md padding-md shadow-sm">
                @include('article::partials.table')
            </div><!-- /.bg radius-md padding-md shadow-sm -->
        </div><!-- /#site-table-with-pagination-container -->
        </main>
      </div><!-- /.grid -->
    </div><!-- /.container -->
  </section>
@endsection

@push('module-scripts')
<!-- MODULE'S CUSTOM SCRIPT -->
  @include('article::partials.script-js')
@endpush
