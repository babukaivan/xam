<form class="formoid-solid-blue"
      style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px"
      method="post" novalidate="novalidate" action="/main/addbid">
    <div class="title"><h2>Добавлення правопорушення</h2></div>
    <div class="element-select"><label class="title"><span class="required" aria-required="true">*</span></label>

        <div class="item-cont">
            <div class="large"><span><select name="type" required="required" aria-required="true"
                                             style="display: none;">

                        <option value="parking">Паркупання</option>
                    </select><div class="btn-group select"><i class="dropdown-arrow dropdown-arrow-inverse"></i>
                        <button class="btn dropdown-toggle clearfix btn-huge btn-primary" data-toggle="dropdown"><span
                                class="filter-option pull-left">Паркупання</span>&nbsp;</button>
                        <ul class="dropdown-menu dropdown-inverse" role="menu"
                            style="max-height: 322.8125px; overflow-y: auto; min-height: 96px;">
                            <li rel="0" class="selected"><a tabindex="-1" href="#" class=""><span class="pull-left">Паркупання</span></a>
                            </li>
                        </ul>
                    </div><i></i><span class="icon-place"></span></span></div>
        </div>
    </div>
    <div class="element-input"><label class="title"><span class="required" aria-required="true">*</span></label>

        <div class="item-cont"><input class="large" type="text" name="avto_number" value="<?php (isset($formdata['avto_number'])) ? print $formdata['avto_number'] : print '' ?>" required="required"
                                      placeholder="Номер авто" aria-required="true"><span class="icon-place"></span>
        </div>
    </div>
    <div class="element-input"><label class="title"><span class="required" aria-required="true">*</span></label>

        <div class="item-cont"><input class="large" value="<?php (isset($formdata['address'])) ? print $formdata['address'] : print '' ?>" type="text" name="address" required="required"
                                      placeholder="Місце порушення (адреса)" aria-required="true"><span
                class="icon-place"></span></div>
    </div>
    <div class="element-input"><label class="title">Карта</label>
        <div id="map" style="width: 430px;height: 300px;">

        </div>
        <input type="hidden" value="<?php (isset($formdata['lat'])) ? print $formdata['lat'] : print '' ?>" name="lat" id="lat"/>
        <input type="hidden" value="<?php (isset($formdata['lng'])) ? print $formdata['lng'] : print '' ?>" name="lng" id="lng"/>
    </div>
    <div class="element-input"><label class="title"><span class="required" aria-required="true">*</span></label>

        <div class="item-cont"><input class="large" type="text" name="datetime" value="<?php (isset($formdata['datetime'])) ? print $formdata['datetime'] : print '' ?>" required="required"
                                      placeholder="Дата та час фіксації" aria-required="true"><span
                class="icon-place"></span></div>
    </div>
    <div class="element-file"><label class="title"></label>
        <input type="file"  id="f-updl" class="file_input" name="file">
    </div>

    <div class="well well-lg">
        <label>Загруженні фото</label>
        <table>            
            <tr>
                <?php
                    for ( $i = 0; $i < 3; $i++ ) {
                ?>
                        <th <?php if (isset($formdata['files'][$i]) && $formdata['files'][$i] != '') { print 'style="display: table-cell !important;"'; } ?>>
                            <input type="hidden" name="files[]" value="<?php isset($formdata['files'][$i]) ?  print $formdata['files'][$i] : print ''; ?>">
                            <img class="img-thumbnail img-prod-img <?php if (isset($formdata['files'][$i]) && $formdata['files'][$i] != '' ) { print 'ins'; } ?>" width="100" height="100" src="<?php isset($formdata['files'][$i]) ?  print $formdata['files'][$i] : print ''; ?>" >
                            <span class="cls">x</span>
                        </th>
                <?php
                    }
                ?>
            </tr>
            <tr>
                <?php
                for ( $i = 3; $i < 6; $i++ ) {
                    ?>
                        <th <?php if (isset($formdata['files'][$i]) && $formdata['files'][$i] != '') { print 'style="display: table-cell !important;"'; } ?>>
                            <input type="hidden" name="files[]" value="<?php isset($formdata['files'][$i]) ?  print $formdata['files'][$i] : print ''; ?>">
                            <img class="img-thumbnail img-prod-img <?php if (isset($formdata['files'][$i]) && $formdata['files'][$i] != ''  ) { print 'ins'; } ?>" width="100" height="100" src="<?php isset($formdata['files'][$i]) ?  print $formdata['files'][$i] : print ''; ?>" >
                            <span class="cls">x</span>
                        </th>
                <?php
                }
                ?>
            </tr>
        </table>
    </div>
    <div class="element-textarea"><label class="title"></label>

        <div class="item-cont"><textarea class="medium" name="comment" cols="20" rows="5"
                                         placeholder="Коментар"> <?php (isset($formdata['comment'])) ? print $formdata['comment'] : print '' ?></textarea><span class="icon-place"></span></div>
    </div>
    <div class="submit"><input type="submit" value="Додати"></div>
</form>