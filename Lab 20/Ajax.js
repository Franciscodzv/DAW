$(document).ready(function() {
    var request;
    request = $.ajax({
            url: "GetFruit.php",
            type: "post"
        }

    );

    request.done(function(response, textStatus, jqXHR) {
        console.log(response);
        $('#table').html(response);
    });

    $("#form").submit(function(event) {

        var request;
        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $(this);

        var $input = $form.find("input, select, button, textarea");

        var sData = $form.serialize();

        $input.prop("disabled", true);

        request = $.ajax({
            url: "InsertFruit.php",
            type: "post",
            data: sData
        });

        request.done(function(response, textStatus, jqXHR) {
            console.log(response);
            $('#form').each(function() {
                this.reset();
            });
            $('#table').html(response);
        });

        //In case of errors:
        request.fail(function(jqXHR, textStatus, errorThrown) {
            //Give me error on console:
            console.error(
                "ERROR: " + textStatus, errorThrown
            );
        });

        request.always(function() {
            $input.prop("disabled", false);
        });
    });

    $("#form2").submit(function(event) {
        var request;

        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $(this);

        var $input = $form.find("input, select, button, textarea");

        var sData = $form.serialize();

        $input.prop("disabled", true);

        request = $.ajax({
            url: "UpdateFruit.php",
            type: "post",
            data: sData
        });

        request.done(function(response, textStatus, jqXHR) {

            console.log(response);
            $('#form2').each(function() {
                this.reset();

            });
            $('#table').html(response);


        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.error(
                "ERROR: " + textStatus, errorThrown
            );
        });

        request.always(function() {
            $input.prop("disabled", false);
        });

    });

    $("#form3").submit(function(event) {

        var request;

        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $(this);

        var $input = $form.find("input, select, button, textarea");

        var sData = $form.serialize();

        $input.prop("disabled", true);

        request = $.ajax({

            url: "DeleteFruit.php",
            type: "post",
            data: sData

        });

        request.done(function(response, textStatus, jqXHR) {

            console.log(response);
            $('#form3').each(function() {
                this.reset();
            });
            $('#table').html(response);

        });

        request.fail(function(jqXHR, textStatus, errorThrown) {

            console.log(
                "ERROR: " + textStatus, errorThrown
            );
        });

        request.always(function() {
            $input.prop("disabled", false);
        });


    });





});