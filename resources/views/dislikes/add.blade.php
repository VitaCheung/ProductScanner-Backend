@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Dislike</h2>

    <form method="post" action="/console/dislikes/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="UPC">UPC:</label>
            <input type="text" name="UPC" id="UPC" value="{{old('UPC')}}" required>
            
            @if ($errors->first('UPC'))
                <br>
                <span class="w3-text-red">{{$errors->first('UPC')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Dislike</button>

    </form>

    <a href="/console/dislikes/list">Back to Dislike List</a>

</section>

@endsection