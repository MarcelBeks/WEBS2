<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Categorie:</strong>
            <select size="1" class="dd form-control" name="category">
                @if(!empty($subcat))
                    <option value="{{ $subcat->category->id }}">{{ $subcat->category->name }}</option>
                @else
                    <option selected disabled>Kies een categorie.</option>
                @endif
                    @foreach($cats as $c)
                        <option value="{{ $c->id }}">
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select><br>

            <strong>Naam:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Naam','class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>