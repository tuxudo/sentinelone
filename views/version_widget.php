    <div class="col-lg-4 col-md-6">
    <div class="card" id="agent-version-widget">
        <div class="card-header" data-container="body" >
            <i class="fa fa-code"></i>
                <span data-i18n="sentinelone.agent_version"></span>
                <a href="/show/listing/sentinelone/sentinelone" class="pull-right"><i class="fa fa-list"></i></a>
            
        </div>
        <div class="list-group scroll-box"></div>
    </div><!-- /panel -->
</div><!-- /col -->

<script>
$(document).on('appUpdate', function(e, lang) {
    
    var box = $('#agent-version-widget div.scroll-box');
    
    $.getJSON( appUrl + '/module/sentinelone/get_versions', function( data ) {
        
        box.empty();
        if(data.length){
            $.each(data, function(i,d){
                var badge = '<span class="badge pull-right">'+d.count+'</span>';
                box.append('<a href="'+appUrl+'/show/listing/sentinelone/sentinelone/#'+d.agent_version+'" class="list-group-item">'+d.agent_version+badge+'</a>')
            });
        }
        else{
            box.append('<span class="list-group-item">'+i18n.t('sentinelone.noversion')+'</span>');
        }
    });
});    
</script>

