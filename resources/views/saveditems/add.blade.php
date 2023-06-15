@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add SavedItem</h2>

    <form method="post" action="/console/saveditems/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="UPC">UPC:</label>
            <input type="text" name="UPC" id="UPC" value="{{old('UPC')}}" required>
            
            @if ($errors->first('UPC'))
                <br>
                <span class="w3-text-red">{{$errors->first('UPC')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="name">Product name:</label>
            <input type="title" name="name" id="name" value="{{old('name')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="asin">asin:</label>
            <input type="text" name="asin" id="asin" value="{{old('asin')}}" required>
            
            @if ($errors->first('asin'))
                <br>
                <span class="w3-text-red">{{$errors->first('asin')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="image">Image:</label>
            <input type="url" name="img" id="img" value="{{old('img')}}" required>

            @if ($errors->first('url'))
                <br>
                <span class="w3-text-red">{{$errors->first('url')}}</span>
            @endif
            
        </div>

        <button type="submit" class="w3-button w3-green">Add saveditem</button>

    </form>

    <a href="/console/saveditems/list">Back to saveditem List</a>

</section>

@endsection