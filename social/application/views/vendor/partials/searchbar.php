<!--<div class="x_panel">
    <div class="row searchBar">    
        <div class="col-xs-8 col-xs-offset-2">
            <div class="input-group search-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Seller</a></li>
                        <li><a href="#">Job Openings</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control search" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-dark" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div>
<style>
    .search-group{
        margin-top: 12px
    }
    .search{
        background-color: #fafafa
    }
</style>
<script>
    $(document).ready(function (e) {
        $('.search-panel .dropdown-menu').find('a').click(function (e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });
</script>-->
