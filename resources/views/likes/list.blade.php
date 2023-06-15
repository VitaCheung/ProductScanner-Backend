@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Likess</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>ID</th>
            <th>code</th>
            <th>Liked users</th>
            <th></th>

        </tr>
        <?php foreach($likes as $like): ?>
            <tr>
                <td>{{$like->id}}</td>
                <td>{{$like->code}}</td>
                <td>@foreach($like->users as $like)
                    <li>{{$like->id}}</li>
                    @endforeach
                </td>
                <td><a href="/console/likes/delete/{{$like->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/likes/add" class="w3-button w3-green">New Likes</a>

</section>

@endsection