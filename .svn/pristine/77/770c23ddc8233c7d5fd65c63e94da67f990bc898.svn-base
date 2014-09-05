<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 15.04.13
 * Time: 17:57
 * To change this template use File | Settings | File Templates.
 */


class Utills {


    static function resize_image_crop($image, $width, $height)
    {

//        $image = '/'.$image;
//        show($image);

        $w = @imagesx($image); //current width

        $h = @imagesy($image); //current height
//        if ( file_exists($image) ) {
//            show($h);
//        }

        if ((!$w) || (!$h)) { $GLOBALS['errors'][] = 'Image couldn\'t be resized because it wasn\'t a valid image.'; return false; }
        if (($w == $width) && ($h == $height)) { return $image; }  //no resizing needed
        $ratio = $width / $w;       //try max width first...
        $new_w = $width;
        $new_h = $h * $ratio;
        if ($new_h < $height) {  //if that created an image smaller than what we wanted, try the other way
            $ratio = $height / $h;
            $new_h = $height;
            $new_w = $w * $ratio;
        }
        $image2 = imagecreatetruecolor ($new_w, $new_h);
        imagecopyresampled($image2,$image, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
        if (($new_h != $height) || ($new_w != $width)) {    //check to see if cropping needs to happen
            $image3 = imagecreatetruecolor ($width, $height);
            if ($new_h > $height) { //crop vertically
                $extra = $new_h - $height;
                $x = 0; //source x
                $y = round($extra / 2); //source y
                imagecopyresampled($image3,$image2, 0, 0, $x, $y, $width, $height, $width, $height);
            } else {
                $extra = $new_w - $width;
                $x = round($extra / 2); //source x
                $y = 0; //source y
                imagecopyresampled($image3,$image2, 0, 0, $x, $y, $width, $height, $width, $height);
            }
            imagedestroy($image2);
            return $image3;
        } else {
            return $image2;
        }
    }





//    public function UploadResize($data,$target,$newwidth)
//    {
//        $arr_img_format = array("jpg"=>'image/jpeg', "png"=>'image/png', "gif"=>'image/gif');
//        $size = $newwidth;
//        $logo_ext = array_search(trim($data["type"]), $arr_img_format);
//        $logo_tmp = $data['tmp_name'];
//
//        list($width, $height) = getimagesize($logo_tmp);
//
//        $percent = $newwidth/$width;
//        $newheight = $height * $percent;
//
//        $thumb = imagecreatetruecolor($newwidth, $newheight);
//
//        switch ( $logo_ext ) {
//            case 'jpg':
//            case 'jpeg':
//                $source = imagecreatefromjpeg($logo_tmp);
//                break;
//            case 'png' :
//                $source = imagecreatefrompng($logo_tmp);
//                break;
//        }
//
//        $uniq_filename = uniqid().$data['name'].'.'.$logo_ext;
//        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//
//        imagejpeg($thumb,'cms'.$target.$uniq_filename);
//        imagedestroy($thumb);
//
//        return $target.$uniq_filename;
//
//    }
//    public function cropResize($data,$target,$newwidth)
//    {
//        $arr_img_format = array("jpg"=>'image/jpeg', "png"=>'image/png', "gif"=>'image/gif');
//
//        $logo_ext = array_search(trim($data["type"]), $arr_img_format);
//        $logo_tmp = $data['tmp_name'];
//
//        switch ( $logo_ext ) {
//            case 'jpg':
//            case 'jpeg':
//                $image = imagecreatefromjpeg($logo_tmp);
//                break;
//            case 'png' :
//                $image = imagecreatefrompng($logo_tmp);
//                break;
//        }
//
//        $thumb_width = $newwidth;
//        $thumb_height = $newwidth;
//
//        $width = imagesx($image);
//        $height = imagesy($image);
//
//        $original_aspect = $width / $height;
//        $thumb_aspect = $thumb_width / $thumb_height;
//
//        if ( $original_aspect >= $thumb_aspect )
//        {
//            // If image is wider than thumbnail (in aspect ratio sense)
//            $new_height = $thumb_height;
//            $new_width = $width / ($height / $thumb_height);
//        }
//        else
//        {
//            // If the thumbnail is wider than the image
//            $new_width = $thumb_width;
//            $new_height = $height / ($width / $thumb_width);
//        }
//
//        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
//
//        // Resize and crop
//        imagecopyresampled($thumb,
//            $image,
//            0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
//            0 - ($new_height - $thumb_height) / 2, // Center the image vertically
//            0, 0,
//            $new_width, $new_height,
//            $width, $height);
//
//        $uniq_filename = uniqid().$data['name'].'.'.$logo_ext;
//        imagejpeg($thumb,'cms'.$target.$uniq_filename, 80);
//        return $target.$uniq_filename;
//    }



}