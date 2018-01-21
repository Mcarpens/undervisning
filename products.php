<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
<?php if(isset($_GET['search'])) {
    foreach($products->searchProduct($_GET['search']) as $product) { ?>
        <tr>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
            <td><?= $product->product_number ?></td>
            <td><?= $product->description ?></td>
            <td>
                <a href="?side=produkt&id=<?=$product->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis produkt"><i class="fas fa-external-link-alt"></i> </button></a>
            </td>
        </tr>
    <?php }
} else {
    foreach($products->allProducts() as $product) { ?>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5"><?= $product->name ?></h2>
                <p class="lead"><?= $product->description ?></p>
                <p><?= $product->price ?> DKK</p>
                <a href="#" class="btn btn-outline-success">Tilføj til kurv</a> &nbsp; <a href="?side=produkt&id=<?=$product->id?>" class="btn btn-outline-info">Se produktet</a>
            </div>
            <div class="bg-white box-shadow mx-auto" style="width: auto; height: 300px; border-radius: 21px 21px 0 0;"><img src="<?= $product->image ?>" style="height: 300px; width: auto; border-radius: 21px 21px 0 0; overflow: hidden"></div>
        </div>
    <?php }
}
?>