<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/add-richting.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (load only once) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Trumbowyg core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">
    <!-- Trumbowyg plugins CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/ui/trumbowyg.colors.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/ui/trumbowyg.table.min.css">

    <!-- Trumbowyg core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>
    <!-- Trumbowyg plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/colors/trumbowyg.colors.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/plugins/table/trumbowyg.table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/langs/nl.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body >

    <div id="divId"></div>

    <div class="container">
        <div class="form_area">
            <p class="title">RICHTING TOEVOEGEN</p>
            <form action="">
                <div class="form_group" style="align-items: center;">
                    <div class="sub_title" for="richting">Richting</div>
                    <input placeholder="Naam van de richting" class="form_style" id="richting" type="text" style="width: 100%;" value="">
                </div>
                <!-- summary GROUP -->
                <div class="form_group">
                    <div class="row">
                        <div class="col-6">
                            <div class="sub_title" for="summary">Summary</div>
                            <div class="form_style">
                                <div id="summaryID" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="sub_title" for="Hoofdimg">Hoofdfoto</div>
                            <input class="form_style" id="hoofd-img" type="file">
                        </div>
                    </div>
                </div>
                <!-- course tabel -->
                <div class="form_group" style="align-items: center;">
                    <table id='tbl'>
                        <thead>
                            <tr>
                                <th>Vakken</th>
                                <th>Uren</th>
                                <th>Verwijderen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type='text' name='name[]'></td>
                                <td><input type="number" name='age[]'></td>
                                <td><input type='button' value='Remove' class='rmv'></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='3'><input type='button' value='+Add Row' id='add_row'></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- ONZE Troeven GROUP -->
                <div class="form_group">
                    <div class="row">
                        <div class="col-6">
                            <div class="sub_title" for="our-advantages">Onze Troeven</div>
                            <div class="form_style">
                                <div id="troevenID" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="sub_title" for="advanteges-img">Onze Troeven Foto</div>
                            <input id="advanteges-img" class="form_style" type="file">
                        </div>
                    </div>
                </div>
                <!-- Toekomst GROUP -->
                <div class="form_group">
                    <div class="row">
                        <div class="col-6">
                            <div class="sub_title" for="Toekomst">Toekomst</div>
                            <div class="form_style">
                                <div id="toekomstID" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="sub_title" for="toekomst-img">Toekomst Foto</div>
                            <input id="toekomst-img" class="form_style" type="file">
                        </div>
                    </div>
                </div>


            </form>
        </div>
        <div>
            <button class="submit-btn" onclick="submit()">SUBMIT</button>
        </div>
    </div>

    <script>
        $('#summaryID').trumbowyg({
            btnsDef: {
                highlight: {
                    ico: 'preformatted'
                }
            },
            btns: [
                ['undo'],
                ['formatting'],
                ['strong', 'em', 'underline', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['mathml'],

            ],
            plugins: {
                colors: {
                    foreColorList: [
                        'f75555', '3ad03f', '4fbfea', 'bd4fea'
                    ],
                    backColorList: [
                        'e88484', 'a6d69c', 'a2c0dc', 'caa1e0'
                    ]
                }
            },
            lang: 'nl',
            autogrow: true,
            removeformatPasted: false,
            changeActiveDropdownIcon: true
        });
        $('#troevenID').trumbowyg({
            btns: [
                ['undo'],
                ['formatting'],
                ['strong', 'em', 'underline', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['mathml'],
                ['highlight'],

            ],
        });
        $('#toekomstID').trumbowyg({
            btns: [
                ['undo'],
                ['formatting'],
                ['strong', 'em', 'underline', 'del'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['mathml'],
                ['highlight'],

            ],
        });
    </script>
    <script src="./js/add-richting.js"></script>
</body>


</html>