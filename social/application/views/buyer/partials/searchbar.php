<div class="x_panel">
    <div class="row searchBar">
        <form method="POST" action="<?php echo base_url() . "buyer/search/result"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2">
                    <div class="input-group search-group">
                        <div class="input-group-btn search-panel">
                            <select style="width: 120px" id="filterby" name="filterby" class="form-control btn btn-dark">
                                <option value="others">Search By:</option>
                                <option value="Products">Products</option>
                                <option value="Seller">Seller</option>
                                <!--                            <option value="Category">Category</option>
                                                            <option value="Subcategory">Sub-Category</option>-->
                            </select>
                        </div>
                        <input placeholder="Search by seller/ products/ category/ subcategory/ brand.." list="products" name="searchterm" id="searchterm" class="form-control">
                        <datalist id="products">
                        </datalist>
                        <span class="input-group-btn">
                            <button class="btn btn-dark" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
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
