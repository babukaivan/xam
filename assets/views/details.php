<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Правопорушення
                <small>№ <?php print $bid->avto_number; ?></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <a class="fancy" href="<?php (isset($imgs[0])) ?  print str_replace('big_','',$imgs['0']->img) : print ''; ?>">
                <img  class="img-responsive main-img" src="<?php (isset($imgs[0])) ?  print $imgs['0']->img : print ''; ?>" alt="">
            </a>
        </div>

        <div class="col-md-4">
            <h3>Описання</h3>
            <p><?php print $bid->comment; ?></p>
            <h3>Деталі</h3>
            <ul>
                <li>Номер авто - <?php print $bid->avto_number; ?></li>
                <li>Тип порушення - <?php print $bid->type; ?></li>
                <li>Адреса - <?php print $bid->address; ?></li>
                <li>Дата порушення - <?php print $bid->date; ?></li>
            </ul>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Інші фото</h3>
        </div>

        <?php
            if ( !empty($imgs) ) {
                foreach ( $imgs as $one_img ) {
        ?>
                    <div class="img-list">
                        <a class="img-link" href="#">
                            <img class="img-responsive portfolio-item" src="<?php print $one_img->img_small; ?>" alt="">
                        </a>
                    </div>
        <?php
                }
            }
        ?>

    </div>

    <hr>
    <h4>Залиште свій коментар:</h4>
    <div class="well well-form">
        <form id="comment-form" role="form" method="post" action="/main/addcommnet">
            <div class="form-group">
                <textarea name="message" class="form-control" rows="3"></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?php print $bid->id ?>" />
            <input type="hidden" name="reply_id" class="reply_id" />
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
    <div class="comments-list">
        <?php
        print $tree;
        ?>
    </div>
</div>