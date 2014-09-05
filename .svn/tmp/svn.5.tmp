<div class="page-header">
    <h1>Список Порушень <small></small></h1>
</div>
<div class="row">
<?php
    if ( !empty($bids_list) ) {
        foreach ($bids_list as $one_bid) {
?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?php print $one_bid->img ?>" alt="...">
                    <div class="caption">
                        <h3><?php print $one_bid->avto_number ?></h3>
                        <p><?php print $one_bid->date ?></p>
                        <p><?php print $one_bid->address ?></p>
                        <p><a href="/main/details/<?php print $one_bid->id ?>" class="btn btn-primary" role="button">Детальніше</a> </p>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>
</div>
