@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Like</h2>

    <form method="post" action="/console/likes/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="code">code:</label>
            <input type="text" name="code" id="code" value="{{old('code')}}" required>
            
            @if ($errors->first('code'))
                <br>
                <span class="w3-text-red">{{$errors->first('code')}}</span>
            @endif
        </div>
        <!-- <div class="w3-margin-bottom">
            <label for="user_id">User:</label>
            <input type="number" name="user_id" id="user_id" value="{{old('user_id')}}" required>
            
            @if ($errors->first('user_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('user_id')}}</span>
            @endif
        </div> -->

        <button type="submit" class="w3-button w3-green">Add Like</button>

    </form>

    <a href="/console/likes/list">Back to Like List</a>

</section>

@endsection