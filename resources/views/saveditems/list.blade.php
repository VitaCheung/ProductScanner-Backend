@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage SavedItemss</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>ID</th>
            <th>user</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($saveditems as $saveditem): ?>
            <tr>
                <td>{{$saveditem->id}}</td>
                <td>{{$saveditem->user_id}}</td>
                <td><img src={{$saveditem->img}} height="80"/> </td>
                <td>{{$saveditem->UPC}}</td>
                <td>{{$saveditem->name}}</td>
                <td>{{$saveditem->asin}}</td>
                <td>{{$saveditem->saved_at}}</td>
                <!-- <td><a href="/console/saveditems/edit/{{$saveditem->id}}">Edit</a></td> -->
                <td><a href="/console/saveditems/delete/{{$saveditem->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/saveditems/add" class="w3-button w3-green">New SavedItems</a>

</section>

@endsection