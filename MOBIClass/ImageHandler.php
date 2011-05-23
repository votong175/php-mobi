<?php

class ImageHandler {
	/**
	 * Download an image
	 * @param string $url Url to the image
	 * @return false|string False if failed, else the data of the image (converted to grayscale jpeg)
	 */
	public static function DownloadImage($url){
		$imgFile = @imagecreatefromstring(Http::Request($src));

		if($imgFile !== false){
			@imagefilter($imgFile, IMG_FILTER_GRAYSCALE);

			ob_start();
			@imagejpeg($imgFile);
			$image = ob_get_contents();
			ob_end_clean();

			return $image;
		}
		return false;
	}
}
?>
