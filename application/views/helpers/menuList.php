<?php
class Zend_View_Helper_menuList
{
    function menuList($list, $id='')
    {
        $output = '';
        if (is_array($list)) {
            $output = '<ul';
            if ($id) {
                $output .= ' id="'.$id.'"';
            }
            $output .= '>';
            foreach ($list as $item) {
            	$output .= '<li>';
            	if(isset($item['url'])) {
                    $output .= '<a href="'.$item['url'].'">'.$item['title'].'</a>';
            	} else {
            	    $output .= '<h3>'.$item['title'].'</h3>';
            	}
            	$output .= "</li>\n";
            }
            
            $output .= '</ul>';
        }
        return $output;
    }
}