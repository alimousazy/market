<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ImageUpload 
{
    const NOT_ALL_IMAGE_VALID = 1;
    const SIZE_IS_TOO_BIG     = 2;

    private $validIMG;
    private $config = array();
    /**
     *constructer
     */
    public function __construct($upload_image_size, $allowed_image_type, $image_width, $image_height)
    {
        $this->config = array(
            "upload_image_size" => $upload_image_size,
            "allowed_image_type" => $allowed_image_type,
            "image_height" => $image_height,
            "image_width" => $image_width,
        );
    }

    public function setValidIMG($validIMG)
    {
        $this->validIMG = $validIMG;
    }

    /*
     *check if img is in valid img list 
     */
    public function isImgValid($model , $attr, $param)
    {
        if(!isset($this->validIMG[$attr]))
        {
            $model->addError($attr, 'Please provide valid image');
        }
        return true;
    } 


    /**
     * Check for uploaded image and validate if they are valid images
     *
     */
    public function handleImageUpload($file_list, $numOfImage)
    {
        $pathList = array();
        $list     = array();
        foreach($file_list as $key=>$value)
        {
            if(!in_array($key, array("error", "size", "type", "tmp_name")))
            {
                continue;
            }
            if($key == "error")
            {
                $callback = function ($item) {
                    if($item == 0)
                        return true;
                    return false;
                };
                $error = self::NOT_ALL_IMAGE_VALID;
                
            }
            else if($key == "size")
            {
                $callback = function ($item) {
                    if($item < $this->config['upload_image_size'])
                        return true;
                    return false;
                };
                $error = self::SIZE_IS_TOO_BIG;
            }
            else if($key == "type")
            {
                $callback = function ($name) {
                    $is_valid = false;
                    foreach($this->config['allowed_image_type'] as $item)
                    {
                        if(strpos($name, $item) !== false)
                        {
                            $is_valid = true;
                        }
                    }
                    return $is_valid;
                };
                $error = self::NOT_ALL_IMAGE_VALID;
            }
            else if($key == "tmp_name")
            {
                $pathList[key($value)] = $value ;
                $callback = function ($item) {
                    if(empty($item))
                        return false;
                    list($width, $height, $type, $attr) = getimagesize($item);
                    if($width < $this->config['image_height'] || $height  < $this->config['image_width'])
                    {
                        return false;
                    }
                    return true;

                };
                $error = self::NOT_ALL_IMAGE_VALID;
            }
            $list[$key] = array_filter($value, $callback);
        }
        $prev = array_shift($list);
        foreach($list as $key => $value)
        {
            $prev =  array_intersect_key($prev, $value);
        }
        $return = array();
        foreach($prev as $key=>$value)
        {
            $return[$key] = $list['tmp_name'][$key] ; 
        }
        return $return;
    }
    function setImageMap($img_map)
    {
        $this->img_map = $img_map;
    }
    function setImageSize($img_sizes)
    {
        $this->img_sizes = $img_sizes;
    }
    function saveFile($path, $list)
    {
        if(!file_exists($path))
        {
            mkdir($path);
        }
        foreach($list as $key=>$value)
        {
            $dest =  $path . "/" . $this->img_map[$key] . ".jpeg"; 
            move_uploaded_file($value, $dest); 
            foreach($this->img_sizes as $size_name=>$cord)
            {
                $tmp =  $path . "/" . $this->img_map[$key] . "_" . $size_name . ".jpeg";
                copy($dest,  $tmp);
                $imgMagic = new Imagick($tmp);
                $imgMagic->cropThumbnailImage($cord[0], $cord[1]);
                $imgMagic->writeImage($tmp);
            }
        }
    }

}
