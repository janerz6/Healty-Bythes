
<div class="row">
    <div class="col-md-12" style="overflow: auto; margin: 10px">     
        <div id="timeline-example"></div>               
    </div>        
</div>

<a href="#top" id="smoothscroll" title="Back to top"></a>

<script id="timeline-entry" type="text/x-handlebars-template">
    <li class="timeline-item">
        <time class="timeline-date" datetime="{{datetime}}">
            <span>{{date_complete}}</span>
            <span>{{date_principal}}</span>
        </time>
        <div class="timeline-icon {{icon}}"></div>
        <div class="timeline-label">
            <div class="timeline-title collapsed">
                <h3>{{title}} | {{composer}}</h3>
            </div>
            <div class="timeline-content">
                {{{content}}}
            </div>
        </div>
    </li>
</script>


