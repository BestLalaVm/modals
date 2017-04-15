<script>
    window.cheditorUtil ={
        filebrowserImageUploadUrl:"<?=site_url("ajax/uploadEditorImage");?>"
    }
</script>
<script type="text/javascript">
    window.modalUtil=window.modalUtil ||{};
    window.modalUtil.config={
        addwishlistUrl:"<?=site_url("ajax/addWishList");?>",
        addshoppingcartUrl:"<?=site_url("ajax/addShoppingCart");?>",
        loadshoppingcartsUrl:"<?=site_url("shop/profile/getShoppingCarts");?>",
        removewishlistUrl:"<?=site_url("ajax/removeWishList");?>"
    }

    $(function () {
        $.ajaxSetup({
            beforeSend:function () {
                $(".loading").show();
            },
            complete:function () {
                $(".loading").hide();
            }
        });

    })
</script>
<div class="loading">
    <div class="loading-image"></div>
</div>