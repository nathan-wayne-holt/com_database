<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>

        <!-- handle "add spectrum" button click -->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#add-spectrum").click(function() {
                    // get the latest div
                    var $div = $('div[id^="spectrum-"]:last');

                    // read the number from the div and increment.
                    var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) + 1;

                    // clone the previous spectrum div
                    var $klon = $div.clone().prop('id', 'spectrum-'+num);

                    // iterate over the elements of $klon and clear values
                    $klon.find('input[type="text"]').val('');
                    $klon.find('input[type="number"]').val(1);

                    // iterate over the elements and increment the names
                    $klon.find('input').each(function() {
                        this.name = this.name.replace(/\[[0-9]\]+/, '['+num+']');
                    });

                    // iterate over the labels and increment the names
                    $klon.find('label').each(function() {
                        this.htmlFor = this.htmlFor.replace(/\[[0-9]\]+/, '['+num+']');
                    });

                    // add the new fields to the form
                    $div.after( $klon );
                });

                $("#add-move").click(function() {
                    // get the latest div
                    var $div = $('div[id^="move-"]:last');

                    // read the number from the div and increment.
                    var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) + 1;

                    // clone the previous spectrum div
                    var $klon = $div.clone().prop('id', 'move-'+num);

                    // iterate over the elements, fixing values and names
                    $klon.find('input').each(function() {
                        $(this).val('');
                        this.name = this.name.replace(/\[[0-9]\]+/, '['+num+']');
                    });
                    $klon.find('select').each(function() {
                        $(this).val('custom');
                        this.name = this.name.replace(/\[[0-9]\]+/, '['+num+']');
                    });
                    $klon.find('textarea').each(function() {
                        $(this).val('');
                        this.name = this.name.replace(/\[[0-9]\]+/, '['+num+']');
                    })

                    // iterate over the labels and increment the names
                    $klon.find('label').each(function() {
                        this.htmlFor = this.htmlFor.replace(/\[[0-9]\]+/, '['+num+']');
                    });

                    // add the new fields to the form
                    $div.after( $klon );
                });
            });
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito';
            }
            .error {
                color: red;
            }
        </style>

        <!-- Pure CSS for forms -->
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        Danger creation form.
        <form method="POST" action="/dangers" class="pure-form pure-form-aligned">
            @csrf

            <fieldset>
                <div class="pure-control-group">
                    <label for="name">Danger name</label>
                    <input type="text" name="name" class="pure-input-1-2" value="{{ old('name') }}" />
                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pure-control-group">
                    <label for="rating">Danger rating</label>
                    <input type="number" min="1" max="5" name="rating" value="{{ old('rating', 1) }}" />
                    @error('rating')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pure-control-group">
                    <label for="description">Danger description (optional)</label>
                    <textarea name="description" class="pure-input-1-2">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pure-control-group">
                    <label>Creator (your) name</label>
                    <input type="text" name="creator" class="pure-input-1-2" value="{{ old('creator') }}" />
                    @error('creator')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div id="spectrums">
                    <h2> Danger Spectrum(s) </h2>

                    <div id="spectrum-1">
                        <div class="pure-control-group">
                            <label for="spectrum[1][name]">Name</label>
                            <input type="text" name="spectrum[1][name]" class="pure-input-1-2" value="{{ old('spectrum.1.name') }}" />
                            @error('spectrum.1.name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pure-control-group">
                            <label for="spectrum[1][threshold]">Threshold</label>
                            <select name="spectrum[1][threshold]">
                                <option value="0" @if (old('spectrum.1.threshold')=='0') selected @endif>-</option>
                                <option value="1" @if (old('spectrum.1.threshold')=='1') selected @endif>1</option>
                                <option value="2" @if (old('spectrum.1.threshold')=='2') selected @endif>2</option>
                                <option value="3" @if (old('spectrum.1.threshold')=='3') selected @endif>3</option>
                                <option value="4" @if (old('spectrum.1.threshold')=='4') selected @endif>4</option>
                                <option value="5" @if (old('spectrum.1.threshold')=='5') selected @endif>5</option>
                                <option value="6" @if (old('spectrum.1.threshold')=='6') selected @endif>6</option>
                            </select>
                            @error('spectrum.1.threshold')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Add the other danger spectrums if previously there -->
                    @if (!is_null(old('spectrum')) && count(old('spectrum')) > 1)
                        @foreach(array_slice(old('spectrum'), 1) as $key => $value)
                            @php
                                $key += 2; // offset (since we start counting at 1 instead of 0 and skip the first element in array)
                            @endphp
                            <div id="spectrum-{{$key}}">
                                <div class="pure-control-group">
                                    <label for="spectrum[{{$key}}][name]">Name</label>
                                    <input type="text" name="spectrum[{{$key}}][name]" class="pure-input-1-2" value="{{ old(sprintf('spectrum.%d.name', $key)) }}" />
                                    @error(sprintf('spectrum.%d.name', $key))
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="pure-control-group">
                                    <label for="spectrum[{{$key}}][threshold]">Threshold</label>
                                    <select name="spectrum[{{$key}}][threshold]">
                                        <option value="0" @if (old(sprintf('spectrum.%d.threshold', $key))=='0') selected @endif>-</option>
                                        <option value="1" @if (old(sprintf('spectrum.%d.threshold', $key))=='1') selected @endif>1</option>
                                        <option value="2" @if (old(sprintf('spectrum.%d.threshold', $key))=='2') selected @endif>2</option>
                                        <option value="3" @if (old(sprintf('spectrum.%d.threshold', $key))=='3') selected @endif>3</option>
                                        <option value="4" @if (old(sprintf('spectrum.%d.threshold', $key))=='4') selected @endif>4</option>
                                        <option value="5" @if (old(sprintf('spectrum.%d.threshold', $key))=='5') selected @endif>5</option>
                                        <option value="6" @if (old(sprintf('spectrum.%d.threshold', $key))=='6') selected @endif>6</option>
                                    </select>
                                    @error(sprintf('spectrum.%d.threshold', $key))
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="pure-controls">
                    <button class="pure-button" id="add-spectrum" type="button">Add another spectrum</button>
                </div>

                <div id="moves">
                    <h2> Danger Move(s) </h2>

                    <div id="move-1">
                        <div class="pure-control-group">
                            <label for="move[1][name]">Name (optional)</label>
                            <input type="text" name="move[1][name]" class="pure-input-1-2" value="{{ old('move.1.name') }}" />
                            @error('move.1.name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pure-control-group">
                            <label for="move[1][type]">Move type</label>
                            <select name="move[1][type]">
                                <option value="custom" @if (old('move.1.type')=='custom') selected @endif>Custom</option>
                                <option value="hard" @if (old('move.1.type')=='hard') selected @endif>Hard</option>
                                <option value="soft" @if (old('move.1.type')=='soft') selected @endif>Soft</option>
                            </select>
                        </div>
                        <div class="pure-control-group">
                            <label for="move[1][description]">Description</label>
                            <textarea type="text" name="move[1][description]" class="pure-input-1-2">{{ old('move.1.description') }}</textarea>
                            @error('move.1.description')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Add the other danger moves if previously there -->
                    @if (!is_null(old('move')) && count(old('move')) > 1)
                        @foreach(array_slice(old('move'), 1) as $key => $value)
                            @php
                                $key += 2; // offset (since we start counting at 1 instead of 0 and skip the first element in array)
                            @endphp
                            <div id="move-1">
                                <div class="pure-control-group">
                                    <label for="move[{{$key}}][name]">Name (optional)</label>
                                    <input type="text" name="move[{{$key}}][name]" class="pure-input-1-2" value="{{ old(sprintf('move.%d.name', $key)) }}" />
                                    @error(sprintf('move.%d.name', $key))
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="pure-control-group">
                                    <label for="move[{{$key}}][type]">Move type</label>
                                    <select name="move[{{$key}}][type]">
                                        <option value="custom" @if (old(sprintf('move.%d.type', $key))=='custom') selected @endif>Custom</option>
                                        <option value="hard" @if (old(sprintf('move.%d.type', $key))=='hard') selected @endif>Hard</option>
                                        <option value="soft" @if (old(sprintf('move.%d.type', $key))=='soft') selected @endif>Soft</option>
                                    </select>
                                </div>
                                <div class="pure-control-group">
                                    <label for="move[{{$key}}][description]">Description</label>
                                    <textarea type="text" name="move[{{$key}}][description]" class="pure-input-1-2">{{ old(sprintf('move.%d.description', $key)) }}</textarea>
                                    @error(sprintf('move.%d.description', $key))
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="pure-controls">
                    <button class="pure-button" id="add-move" type="button">Add another move</button>
                </div>

                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Create danger</button>
                </div>
            </fieldset>
        </form>
    </body>
</html>
