<div class="form-div-input">
    <label for="image" class="form-label">Box art</label>
    <div class="form-error">
        <input type="file" id="image" name="image" class="form-input" value="{{old('image', $game->image ?? '')}}">
        @error('image')
        <span class="error-message">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-div-input">
    <label for="name" class="form-label">Title</label>
    <div class="form-error">
        <input type="text" id="name" name="name" placeholder="Enter the name/title of the game..." class="form-input" value="{{old('name', $game->name ?? '')}}">
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-div-date">
    <label for="release_date" class="form-label">Release date</label>
    <div class="form-error">
        <input type="date" id="release_date" name="release_date" class="form-input" min="1970-01-01" max="2199-12-31" value="{{old('release_date', $game->release_date ?? '')}}">
        @error('release_date')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-div-select">
    <label for="category_id" class="form-label">Game genre</label>
    <div class="form-error">
        <select name="category_id" id="category_id" class="form-select">
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{old('category_id', $game->category_id ?? '')}}>
                    {{$category->name}}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <span>{{ $message }}</span>
        @enderror

    </div>
</div>

<div class="form-div-select">
    <label for="series_id" class="form-label">Series</label>
    <div class="form-error">
        <select name="series_id" id="series_id" class="form-select">
            @foreach($series as $franchise)
                <option value="{{$franchise->id}}" {{old('series_id', $game->series_id ?? '')}}>
                    {{$franchise->name}}
                </option>
            @endforeach
        </select>

        @error('series_id')
            <span>x{{ $message }}</span>
        @enderror

    </div>
</div>

