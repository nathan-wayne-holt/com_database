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
        </style>

        <!-- Pure CSS for forms -->
        <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        Danger creation form.
        <form method="POST" action="/create" class="pure-form pure-form-aligned">
            @csrf

            <fieldset>
                <div class="pure-control-group">
                    <label for="name">Danger name</label>
                    <input type="text" name="name" class="pure-input-1-2" />
                </div>

                <div class="pure-control-group">
                    <label for="rating">Danger rating</label>
                    <input type="number" min="1" max="5" name="rating" />
                </div>

                <div class="pure-control-group">
                    <label>Creator (your) name</label>
                    <input type="text" name="creator" class="pure-input-1-2" />
                </div>

                <div id="spectrums">
                    <h2> Danger Spectrum(s) </h2>

                    <div id="spectrum-1">
                        <div class="pure-control-group">
                            <label for="spectrum[1][name]">Name</label>
                            <input type="text" name="spectrum[1][name]" />
                        </div>
                        <div class="pure-control-group">
                            <label for="spectrum[1][threshold]">Threshold</label>
                            <input type="number" name="spectrum[1][threshold]" min="1" max="6" />
                        </div>
                    </div>
                </div>
                <div class="pure-controls">
                    <button class="pure-button" id="add-spectrum" type="button">Add another spectrum</button>
                </div>

                <div id="moves">
                    <h2> Danger Move(s) </h2>

                    <div id="move-1">
                        <div class="pure-control-group">
                            <label for="move[1][name]">Name (optional)</label>
                            <input type="text" name="move[1][name]" />
                        </div>
                        <div class="pure-control-group">
                            <label for="move[1][type]">Move type</label>
                            <select name="move[1][type]">
                                <option value="custom">Custom</option>
                                <option value="hard">Hard</option>
                                <option value="soft">Soft</option>
                            </select>
                        </div>
                        <div class="pure-control-group">
                            <label for="move[1][description]">Description</label>
                            <textarea type="text" name="move[1][description]"></textarea>
                        </div>
                    </div>
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
