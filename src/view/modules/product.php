

<div id="product">
    <?php $p = $params["product"];?>
    <div>
        <div class="product-images">
            <img src="/public/images/<?=$p["image"]?>" id="principal"/>
                 <div class="product-miniatures">

                     <div>
                         <img src="/public/images/<?=$p["image"]?>" alt="" id="i1"/>
                     </div>

                     <div>
                         <img src="/public/images/<?=$p["image_alt1"]?>" alt="" id="i2"/>
                     </div>

                     <div>
                         <img src="/public/images/<?=$p["image_alt2"]?>" alt="" id="i3"/>
                     </div>
                     <div>
                         <img src="/public/images/<?=$p["image_alt3"]?>" alt="" id="i4"/>
                     </div>
                 </div>
        </div>

        <div class="product-infos">
            <p class="product-category">
                <?= $p["NomCategory"]
                ?>
            </p>
            <h1>
                <?= $p["NomProduit"]?>
            </h1>

            <p class="product-price">
                <?= $p["price"] ?>€
            </p>
            <form>
                <button type="button" id="moins">
                    -
                </button>
                <button type="button" id="numb" >

                </button>
                <button type="button" id="plus">
                    +
                </button>
                <input type="submit" title="Ajouter au panier">


            </form>
<div >
    <div class="box error"  id ="msgerreur"  style="visibility:hidden;"> Quantité maximale autorisée </div>
</div>


        </div>

    </div>

        <div>
            <div class="product-spec">
                <h2>
                    Spécificités :
                </h2>
                <?= $p["spec"]?>
            </div>
            <div class="product-comments">
                <h2> Avis :</h2>
                <?php
                if(empty($params['comment'])){
                ?>
                <p>Il n'y a pas d'avis sur ce produit 😅😅😅.</p>
<?php
                }else{
                foreach($params['comment'] as $c){?>
                <div class="product-comment">
                    <p>
                        <strong><div class="product-comment-author"><?=$c['firstname']." " . $c['lastname']?></div></strong>

                        <i><div><?= $c['content']?></div></i>
                        <br>
                    <small>Date de publication :<?=$c['date']?></small>
                        <br>
                    </p>
                </div>
                <?php
                }}

                if(isset($_SESSION['usermail'])){?>
                <form method="post" action="/postComment/<?=$p['identite'] ?>">
                    <div>
                        <input type="text" name="content" placeholder="Laisser un commentaire...😅"/>
                        <input type="submit" value="poster"/>
                    </div>

                </form>
                <?php
                }?>


            </div>

        </div>


</div>
<script src="/public/scripts/product.js"></script>