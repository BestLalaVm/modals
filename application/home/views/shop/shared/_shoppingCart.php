<div id="divShoppingCartContainer">
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i
                class="fa fa-shopping-cart"></i><!--ko text:count--><!--/ko--></a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li>购物车列表</li>
        <!--ko foreach:datas-->
        <li>
            <a href="#" data-bind="attr:{href:'<?=site_url("shop/modal/detail/")?>'+id}">
                <div class="media">
                    <img class="media-left media-object" data-bind="attr:{src:smallImage,alt:name}" style="width: 50px;height: 50px;" alt="cart-Image">
                    <div class="media-body">
                        <h5 class="media-heading"><!--ko text:name--><!--/ko--> <br><span></span></h5>
                    </div>
                </div>
            </a>
        </li>
        <!--/ko-->
        <li>
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default"
                        onclick="location.href='<?=site_url("shop/profile/index");?>';">进入个人中心
                </button>
                <button type="button" class="btn btn-default" onclick="location.href='<?=site_url("shop/shoppingcart/index");?>';">进入购物车</button>
            </div>
        </li>
    </ul>
    <script type="text/javascript">
        $(function () {
           var vm = window.modalUtil.getShoppingCartViewModel();
           ko.applyBindings(vm,$("#divShoppingCartContainer")[0]);
        });
    </script>
</div>

