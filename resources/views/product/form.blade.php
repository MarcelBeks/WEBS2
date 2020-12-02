<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Naam:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Naam','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Selecteer een categorie:</strong>
            <select size="1" class="dd form-control" name="category">
                @if(!empty($product))
                    <option value="{{ $product->subcategory->id }}">{{ $product->subcategory->name }}</option>
                @else
                    <option selected disabled>Kies een categorie.</option>
                @endif
                @foreach($cats as $c)
                    <optgroup label="{{ $c->name }}">
                        @foreach($c->subcategories as $sc)
                            <option value="{{ $sc->id }}">
                                {{ $sc->name }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prijs:</strong>
            {!! Form::number('price', null, array('step' => '0.01', 'placeholder' => '123.00','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Beschrijving:</strong>
            {!! Form::textarea('desc', null, array('placeholder' => 'Beschrijving','class' => 'form-control','style'=>'height:150px')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            @if(!empty($product))
                <strong>Huidige Foto:</strong><br>
                {!! Form::image('/storage/images/products/' . $product->image,'success', array('height' => 200 ))  !!}</br>
                <strong>Nieuwe Foto:</strong><br>
                {!! Form::file('image') !!}
            @else
                <strong>Foto:</strong><br>
                {!! Form::file('image') !!}
            @endif
            
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>