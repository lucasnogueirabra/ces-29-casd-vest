(function($) {
    "use strict"; // Start of use strict

    $('#submit_status_casd').click(function(){
    	$('#status_casd').submit();
    });

    $('#submit_status_casdinho').click(function(){
    	$('#status_casdinho').submit();
    });

    $('#submit_consulta_casd').click(function(){
    	$('#consulta_casd').submit();
    });

    $('#submit_consulta_casdinho').click(function(){
    	$('#consulta_casdinho').submit();
    });

    $('#submit_resultado_casd').click(function(){
        $('#resultado_casd').submit();
    });


    //Ajustando data
    $('#date_vestibulinho_casd').on('keyup', function()
    {
        var data = $('#date_vestibulinho_casd').val();
        var n = data.length;
        if(n > 2)
        {
            if(data.charAt(2) != '/')
            {
                data = data.substring(0,2)+'/'+data.substring(2, n);
            }
        }
        n = data.length;
        if (n > 5)
        {
            if(data.charAt(5) != '/')
            {
                data = data.substring(0,5)+'/'+data.substring(5, n);
            }
        }
        $('#date_vestibulinho_casd').val(data);
    });

    $('#date_vestibulinho_casdinho').on('keyup', function()
    {
        var data = $('#date_vestibulinho_casdinho').val();
        var n = data.length;
        if(n > 2)
        {
            if(data.charAt(2) != '/')
            {
                data = data.substring(0,2)+'/'+data.substring(2, n);
            }
        }
        n = data.length;
        if (n > 5)
        {
            if(data.charAt(5) != '/')
            {
                data = data.substring(0,5)+'/'+data.substring(5, n);
            }
        }
        $('#date_vestibulinho_casdinho').val(data);
    });

    $('#termino_vestibulinho_casd').on('keyup', function()
    {
        var data = $('#termino_vestibulinho_casd').val();
        var n = data.length;
        if(n > 2)
        {
            if(data.charAt(2) != '/')
            {
                data = data.substring(0,2)+'/'+data.substring(2, n);
            }
        }
        n = data.length;
        if (n > 5)
        {
            if(data.charAt(5) != '/')
            {
                data = data.substring(0,5)+'/'+data.substring(5, n);
            }
        }
        $('#termino_vestibulinho_casd').val(data);
    });

    $('#termino_vestibulinho_casdinho').on('keyup', function()
    {
        var data = $('#termino_vestibulinho_casdinho').val();
        var n = data.length;
        if(n > 2)
        {
            if(data.charAt(2) != '/')
            {
                data = data.substring(0,2)+'/'+data.substring(2, n);
            }
        }
        n = data.length;
        if (n > 5)
        {
            if(data.charAt(5) != '/')
            {
                data = data.substring(0,5)+'/'+data.substring(5, n);
            }
        }
        $('#termino_vestibulinho_casdinho').val(data);
    });

    $("#senha-nova-2").keyup(function()
    {
        if($("#senha-nova").val() == $("#senha-nova-2").val())
        {
            $("#alert-password-1").hide();
        }
        else
        {
            $("#alert-password-1").show();
        }
    });

    $("#senha-nova").keyup(function()
    {
        if($("#senha-nova").val().length < 7)
        {
            $("#alert-password-2").show();
        }
        else
        {
            $("#alert-password-2").hide();
        }
    });

    $("#senha-2").keyup(function()
    {
        if($("#senha").val() == $("#senha-2").val())
        {
            $("#alert-password-1").hide();
        }
        else
        {
            $("#alert-password-1").show();
        }
    });

    $("#senha").keyup(function()
    {
        if($("#senha").val().length < 7)
        {
            $("#alert-password-2").show();
        }
        else
        {
            $("#alert-password-2").hide();
        }
    });

   
    $("#username").on('change keyup paste',function(){
        $(this).val($(this).val().toLowerCase());
        var regex = /^[a-z]+$/;
        if(regex.test($("#username").val()))
        {
            $("#alert-username").hide();
        }
        else
        {
            $("#alert-username").show();
        }
     });

    $("#deletar-trig").off().click(function()
    {
            $("#deletar-prof").show();
    });

})(jQuery); // End of use strict