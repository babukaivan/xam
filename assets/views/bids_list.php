<script type="text/javascript">
    $(document).ready(function(){
        $('.del-st').click(function(e){

            e.preventDefault();
            var quest = confirm("Are you sure you want to delete this location ?");

            if (quest == true){
                window.location = $(this).attr('href');
            }
        });

        $('.comm-imgs').click(function(e){
            e.preventDefault();
            var bid_id = $(this).data('bid_id');

            $.ajax({
                type : 'POST',
                url : '/admin/showimages',
                data : {
                    bid_id : bid_id
                },
               success : function (res) {
                  $('.imgss').html(res);
                  $('.fnc').fancybox();
                   $('.fnc').click();
               }
            });
        });

    });
</script>
<div class="page-header">
    <h1>Список Порушень <small></small></h1>
</div>

<?php if ( $bids_list ) { ?>

    <div class="panel panel-default">
        <!-- Default panel contents -->
<!--        <div class="panel-heading">Panel heading</div>-->

        <!-- Table -->
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Зображення</th>
                <th>Тип</th>
                <th>Номер авто</th>
                <th>Адреса</th>
                <th>Дата порушення</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Комментарії</th>
                <th>Блок.\Розбл.</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach( $bids_list as $one_bid ) { ?>
                <tr>
                    <td><?php print $i; ?></td>
                    <td><a data-bid_id="<?php print $one_bid->id ?>" class="comm-imgs" href="#"><img class="img-thumbnail" src="<?php print $one_bid->img_small; ?>" width="100" height="100" alt=""/><span class="glyphicon glyphicon-camera"></span></a></td>
                    <td><?php print $one_bid->type; ?></td>
                    <td><?php print $one_bid->avto_number; ?></td>
                    <td><?php print $one_bid->address; ?></td>
                    <td><?php print $one_bid->date; ?></td>
<!--                    <td>--><?php //print $one_bid->status; ?><!--</td>-->
                    <td><?php print $one_bid->created_at; ?></td>
                    <td><?php print $one_bid->updated_at; ?></td>
                    <td><a target="_blank" href="/admin/comments/<?php print $one_bid->id ?>"><span class="glyphicon glyphicon-comment"></span>Комментарії</a></td>
                    <td>
                        <?php
                            if ( $one_bid->status == 1 ) {
                                print '<a href="/admin/block/'.$one_bid->id.'"><span class="glyphicon glyphicon-remove-sign"></span>Блокувати</a>';
                            } else {
                                print '<a href="/admin/unblock/'.$one_bid->id.'"><span class="glyphicon glyphicon-ok-sign"></span>Розблокувати</a>';
                            }
                        ?>
                    </td>

                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
<?php }else{ ?>
    <div class="alert alert-warning" role="alert">
        <strong>Sorry!</strong> Список пошушень поки пустий.
    </div>
<?php }  ?>
<div class="imgss" style="display: none;"></div>
