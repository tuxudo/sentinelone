<div class="col-lg-4 col-md-6">

    <div id="self-protection-widget" class="card">

        <div class="card-header">

            <i class="fa fa-fire-extinguisher"></i>
                <span data-i18n="sentinelone.self_protection"></span>
                <a href="/show/listing/sentinelone/sentinelone" class="pull-right"><i class="fa fa-list"></i></a>
            

        </div>

        <div class="card-body text-center">


            <a id="sp-not_self_protected" class="btn btn-danger disabled">
                <span class="sp-count bigger-150"></span><br>
                <span data-i18n="sentinelone.disabled"></span>
            </a>
            <a id="sp-self_protected" class="btn btn-success disabled">
                <span class="sp-count bigger-150"></span><br>
                <span data-i18n="sentinelone.enabled"></span>
            </a>

            <span id="sp-nodata" data-i18n=""></span>

        </div>

    </div><!-- /panel -->

</div><!-- /col -->

<script>
$(document).on('appUpdate', function(e, lang) {

    $.getJSON( appUrl + '/module/sentinelone/get_self_protection_stats', function( data ) {

        if(data.error){
            //alert(data.error);
            return;
        }

        var url = appUrl + '/show/listing/sentinelone/sentinelone#'

        // Set urls
        $('#sp-not_self_protected').attr('href', url + encodeURIComponent('self_protection_enabled = 0'));
        $('#sp-self_protected').attr('href', url + encodeURIComponent('self_protection_enabled = 1'));

        // Show no clients span
        $('#sp-nodata').removeClass('disabled');

        $.each(data.stats, function(prop, val){
            if(val > 0)
            {
                $('#sp-' + prop).removeClass('disabled');
                $('#sp-' + prop + '>span.sp-count').text(val);

                // Hide no clients span
                $('#sp-nodata').addClass('disabled');
            }
            else
            {
                $('#sp-' + prop).addClass('disabled');
            }
        });
    });
});

</script>
