#!/usr/bin/php
<?php
/**
 * iloveck101.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */

/**
 * ILoveCK101
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */
class ILoveCK101
{

    /**
     * Static method runOnCommandLine
     *
     * @return void
     */
    public static function runOnCommandLine()
    {

        $url = $_SERVER["argv"][1];

        if (empty($url)) {

            echo "Please provide URL ck101\n";
            exit;

        }

        self::getPictureByUrl($url);

    }// end function runOnCommandLine

    /**
     * Static method iloveck101
	 *
     * @param string $url
     * @param array $options
     *
     * @return void
     */
    public static function getPictureByUrl($url, $options=array())
    {

    	$defaults = array(
         	'mode'=>'default'
      	);

		$options = array_merge($defaults, $options);

      	$thread_filename = substr($url, strrpos($url, '/')+1);

      	// find thread id
		if ( !preg_match('/^thread-(\d+)-.*/', $thread_filename, $thread) ) {

			echo "URL pattern should be something like this: http://ck101.com/thread-2593278-1-1.html\n";
   			exit;

		}

		$thread_id = $thread[1];

		// create `iloveck101` folder in ~/Pictures
		$home_path = $_SERVER['HOME'];
		$base_folder = $home_path.'/Pictures/iloveck101';

		if (!file_exists($base_folder)) {
    		mkdir($base_folder, 0777, true);
		}

		// fetch html and find images
		$thread_page_available = false;
		$thread_page_html = false;

		while ($thread_page_available == false) {

			$thread_page_html = @file_get_contents($url);
			
			if ($thread_page_html === false) {
				
				echo "Retrying ...\n";

			} else {

				$thread_page_available = true;

			} 

		}

		$thread_page_dom = new DomDocument();
		@$thread_page_dom->loadHTML($thread_page_html);
		$title_tags = $thread_page_dom->getElementsByTagName('title');
		$title = $title_tags->item(0)->nodeValue;
		$title_parse = explode(' - ', $title);
		$title = $title_parse[0];

		// create target folder for saving images
    	$thread_page_folder = $home_path.'/Pictures/iloveck101/'.$thread_id.' - '.$title;

    	if (!file_exists($thread_page_folder)) {
    		mkdir($thread_page_folder, 0777, true);
		}

		// iterate and save images
		$img_tags = $thread_page_dom->getElementsByTagName('img');

		foreach ($img_tags as $img_tag) {

			$img_src = $img_tag->getAttribute('file');
			$img_filename = substr($img_src, strrpos($img_src, '/')+1);
			
			// ignore useless image
			if (filter_var($img_src, FILTER_VALIDATE_URL) === false) {
    			continue;
			}

			// fetch image
        	echo "Fetching $img_src ...\n";
        	$img_src_data = @file_get_contents($img_src);

        	// ignore small images
        	$ck101_img = @imagecreatefromstring($img_src_data);
			$ck101_img_width = @imagesx($ck101_img);
			$ck101_img_height = @imagesy($ck101_img);
			if ($ck101_img_width<400 || $ck101_img_height<400) {
				continue;
			}

			// save image
			$ck101_img_path = $thread_page_folder.'/'.$img_filename;
			if (!file_exists($ck101_img_path)) {
    			file_put_contents($ck101_img_path, $img_src_data);
    			echo "Fetching $img_src success ...\n";
			} else {
				echo "$img_src already exist ...\n";
			}	
            
		}		


    }// end function iloveck101

}// end of class ILoveCK101

ILoveCK101::runOnCommandLine();

?>