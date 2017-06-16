<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    
                    <?php if ($productsInCart): ?>
                        <p><b>Список выбранных товаров:</b></p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th><center>Код товара</center></th>
                                <th><center>Название</center></th>
                                <th><center>Стомость, руб</center></th>
                                <th><center>Количество, шт</center></th>
                                <th><center>Удалить</center></th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                            
                                <tr>
                                    <td><center><?php echo $product['code'];?></center></td>
                                    <td><center>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name'];?>
                                        </a></center>
                                    </td>
                                    <td><center><?php echo $product['price'];?></center></td>
                                    <td><center><?php echo $productsInCart[$product['id']];?></td> 
                                    <td><center>
                                        <a href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a></center>
                                    </td>
                                </tr>
                                
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Общая стоимость, руб:</td>
                                    <td><center><?php echo $totalPrice;?></center></td>
                                </tr>
                            
                        </table>
                        
                        <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                        
                        <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                    <?php endif; ?>

                </div>

                
                
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>