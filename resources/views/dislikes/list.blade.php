@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage dislikes</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>ID</th>
            <th>code</th>
            <th>Disliked users</th>
            <th></th>

        </tr>
        <?php foreach($dislikes as $dislike): ?>
            <tr>
                <td>{{$dislike->id}}</td>
                <td>{{$dislike->code}}</td>
                <td>@foreach($dislike->users as $dislike)
                    <li>{{$dislike->id}}</li>
                    @endforeach
                </td>
                <td><a href="/console/dislikes/delete/{{$dislike->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/dislikes/add" class="w3-button w3-green">New dislikes</a>

</section>

@endsection