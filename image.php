<?php

// echo phpinfo(); // 查看配置imagick信息

/* 
 * 图片压缩类  重新封装了Imagick 
 */  

class Imagick_tool{  
      
    //Imagick对象实例  
    public $obj = null;
      
    public function __construct()
    {  
        //判断是否加载了该扩展
        if(!extension_loaded('Imagick')) {  
            return false;
        }  
        $this->obj = new Imagick();
    }  
    /* 
     * png2jpg转换图片格式 
     *  
     * @param string src_img 源图片路径 
     * @param string dest_img 要生成的图片的路径 
     * @return boolean 转换成共返回true  否则false 
     */  
    public function png2jpg($src_img,$dest_img)  
    {  
        if(!is_object($this->obj)) {  
            return false;  
        }  

        try {  
            $this->obj->readImage($src_img);  
            if($this->obj->writeImage($dest_img)) {  
                $this->destory();  
                return $dest_img;  
            }
            return false;  
        } catch (ImagickException $e) {  
            return false;  
        }  
    }  

      
    /* 
     * 设置jpg图片质量 
     *  
     * @param string src_img 源图片路径 
     * @param string dest_img 要生成的图片的路径 
     * @return boolean 转换成共返回true  否则false 
     */  
    public function set_quality($src_img,$quality = 70,$dest_img = '')  
    {  
        if(!is_object($this->obj)) {  
            return false;  
        } 

        try {  
            $dest_img = empty($dest_img) ? $src_img : $dest_img;  
            $this->obj->readImage($src_img);  
            $this->obj->setImageCompression(Imagick::COMPRESSION_JPEG);  
            $this->obj->setImageCompressionQuality($quality);  
            if($this->obj->writeImage($dest_img)) {  
                $this->destory();  
                return $dest_img;  
            }  
            return false;  
        } catch (ImagickException $e) {  
            return false;  
        }  
    }  
      
    /* 
     * 图片瘦身 
     *  
     * @param string src_img 源图片路径 
     * @param int quality 设置图片压缩质量 
     * @param string dest_img 要生成的图片的路径 
     * @return boolean 转换成共返回true  否则false 
     */  
    public function slimming($src_img,$quality = 60,$dest_img = '')  
    {  
        if(!is_object($this->obj)) {  
            return false;  
        }  

        try {  
            $dest_img = empty($dest_img) ? $src_img : $dest_img;  
            $this->obj->readImage($src_img);  
            $this->obj->setImageFormat('jpeg');  
            $this->obj->setImageCompression(Imagick::COMPRESSION_JPEG);  
            //将图片的质量降低到原来的60%  
            $quality = $this->obj->getImageCompressionQuality() * $quality / 100;  
            $this->obj->setImageCompressionQuality($quality);  
            $this->obj->stripImage();  
               
            if($this->obj->writeImage($dest_img)) {  
                $this->destory();  
                return $dest_img;  
            }  
            return false;  
        } catch (ImagickException $e) {  
            return false;  
        }  
    }  
      
    /* 
     * 生成缩略图 
     *  
     * @param string src_img 源图片路径 
     * @param int quality 设置图片压缩质量 
     * @param string dest_img 要生成的图片的路径 
     * @return boolean 转换成共返回true  否则false 
     */  
    public function thump($src_img,$width = 250,$height = '')  
    {  
        if(!is_object($this->obj)) {  
            return false;  
        }  

        try {  
            $file_info = pathinfo($src_img);  
            //生成缩略图名称  
            $file_name = substr($file_info['basename'],0,strrpos($file_info['basename'],'.'));  
            $dest_img = $file_info['dirname'] . '/' . $file_name . '_thump.' . $file_info['extension'];  
            $this->obj->readImage($src_img);  
            //计算要获得缩略图的高度  
            $img_width = $this->obj->getImageWidth();  
            $img_height = $this->obj->getImageHeight();  
            $dest_height = $img_height * ($width / $img_width);  
            $this->obj->resizeImage($width, $dest_height, Imagick::FILTER_CATROM, 1, false);  
            //生成图片  
            if($this->obj->writeImage($dest_img)) {  
                $this->destory();  
                return $dest_img;  
            }  
            return false;  
        } catch (ImagickException $e) {  
            return false;  
        }  
    }  


    /* 
     * 做旧处理
     *  
     */  
    function make_old($src_img, $dest_img = '')
    {
    	try {
    		//打开图片
			$im = new Imagick($src_img);
			//新建图层，使用颜色`#C0FFFF`填充后，不透明度设为`44%`
			$layer = new Imagick();
			$layer->newImage($im->getImageWidth(), $im->getImageHeight(), '#C0FFFF');
			$layer->setImageOpacity (0.44);
			//叠加到原图上，图层混合模式为`柔光`
			$im->compositeImage($layer, Imagick::COMPOSITE_SOFTLIGHT, 0, 0);
			//新建图层，使用颜色`#000699`填充后，不透明设置为`48%`
			$layer = new Imagick();
			$layer->newImage($im->getImageWidth(), $im->getImageHeight(), '#000699');
			$layer->setImageOpacity (0.48);
			//叠加到原图上，图层混合模式为`排除` 
			$im->compositeImage($layer, Imagick::COMPOSITE_EXCLUSION, 0, 0);

			$file_info = pathinfo($src_img);
			$file_name = substr($file_info['basename'],0,strrpos($file_info['basename'],'.'));  
	        $dest_img = empty($dest_img) ? $file_info['dirname'] . '/' . $file_name . '_old.' . $file_info['extension'] : $dest_img; 

			if($im->writeImage($dest_img)) {
	            return $dest_img;  
			}
			return false;
    	} catch (ImagickException $e) {
            return false;  
        } 
    }

    /* 
     * 抠图-适合公章抠图
     */
    function cut_out($src_img, $c = 8000, $dest_img = '')
    {
	    try {
	    	$im = new Imagick($src_img);
			$x = $im->getImageWidth();
			$y = $im->getImageHeight();
			$im->thumbnailImage($x, $y, true);
			$im->transparentPaintImage($im->getImagePixelColor(0, 0), 0, $c, 0);
			$im->transparentPaintImage($im->getImagePixelColor(0, $y), 0, $c,0);
			$im->transparentPaintImage($im->getImagePixelColor($x, 0), 0, $c,0);
			$im->transparentPaintImage($im->getImagePixelColor($x, $y), 0, $c,0);
			$im->setImageFormat("png");
			$im->getImageBlob();

			$file_info = pathinfo($src_img);
			$file_name = substr($file_info['basename'],0,strrpos($file_info['basename'],'.'));  
			$dest_img = empty($dest_img) ? $file_info['dirname'] . '/' . $file_name . '_koutu.' . 'png' : $dest_img; 

			if($im->writeImage($dest_img)) {
				return $dest_img;
			}
			return false;
	    } catch (ImagickException $e) { 
	    	return false; 
	    }
    }

    

    /* 
     * 抠图操作并格式图片
     *  
     */  
    function magick_cut($src_img)
    {
    	try {
    		$sm = new Imagick($src_img);

    	} catch (ImagickException $e) {
    		return false;
    	}
    }
      
    /* 
     * 释放资源 
     *  
     */  
    function destory()  
    {  
        if(is_object($this->obj)) {  
            $this->obj->clear();
            $this->obj->destroy();
        }
    }
}




$tool = new Imagick_tool();

// 做旧
// $src = $_SERVER['DOCUMENT_ROOT'].'/img/html.jpg';
// $dest = $_SERVER['DOCUMENT_ROOT'].'/img_html.jpg';
// $res = $tool->make_old($src,$dest);
// var_dump($res);

// 公章抠图
// $src = $_SERVER['DOCUMENT_ROOT'].'/img/qq.jpg';
// $r = $tool->cut_out($src, 1000);
// var_dump($r);
