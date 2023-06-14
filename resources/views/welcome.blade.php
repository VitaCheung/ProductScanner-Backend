@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<div id="app" data-user="{{ json_encode(auth()->user()) }}">
    <!-- Your React component will be rendered here -->
</div>


@endsection
