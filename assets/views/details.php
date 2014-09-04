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
    <!-- /.row -->

    <hr>
    <div class="well">
        <h4>Залиште свій коментар:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>


</div>