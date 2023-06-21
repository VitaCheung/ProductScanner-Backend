@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <ul id="dashboard">
        <li><a href="/console/users/list">Manage Users</a></li>
        <li><a href="/console/saveditems/list">Manage Saved Items</a></li>
        <li><a href="/console/likes/list">Manage Likes</a></li>
        <li><a href="/console/dislikes/list">Manage Dislikes</a></li>
        <li><a href="/console/logout">Log Out</a></li>
    </ul>

</section>

@endsection
