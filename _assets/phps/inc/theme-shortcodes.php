<?php 
add_filter('widget_text', 'do_shortcode');
//Clean Up WordPress Shortcode Formatting - important for nested shortcodes
//adjusted from http://donalmacarthur.com/articles/cleaning-up-wordpress-shortcode-formatting/
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

//move wpautop filter to AFTER shortcode is processed
// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

  // adds hr tag
	function hr(){ return '<hr class="hide"/>';}
	add_shortcode('hr','hr');

// adds logo of website in content
	function logo(){ return '<img class="logo" src="'.get_stylesheet_directory_uri().'/images/logo.png"/>';}
	add_shortcode('logo','logo');

  // adds button like a tag
	function buttons ($atts) {
		extract(shortcode_atts(array(
		'label' => 'button',
		'url'=>'#',
		'style' => 'button'
		), $atts));
		return '<a class="button '.$style.'" href="'.$url.'" >'.$label.'</a>';
	}
	add_shortcode ('btn','buttons');

	function listtype ($atts, $content = '') {
		extract(shortcode_atts(array(
									'type'=>'basic'
									 ), $atts));
		return '<span class="'.$type.' block">'.$content.'</span>';
	}
	
	add_shortcode ('list','listtype');
	
//singleline 
 function videoPlayer ($atts) {
		extract(shortcode_atts(array(
		'border'=>'0',
		'url'=>''
		), $atts));
		return '<div class="flex-video"><iframe src="'.$url.'"  border="'.$border.'" allowfullscreen></iframe></div>';
	}
	add_shortcode ('video','videoPlayer');

 function ytPlayer ($atts) {
		extract(shortcode_atts(array(
		'border'=>'0',
		'vid'=>''
		), $atts));
		return '<div class="flex-video"><iframe src="http://www.youtube.com/embed/'.$vid.'"  border="'.$border.'" allowfullscreen></iframe></div>';
	}
add_shortcode ('youtube','ytPlayer');

function vimeoPlayer ($atts) {
		extract(shortcode_atts(array(
		'border'=>'0',
		'vid'=>''
		), $atts));
		return '<div class="flex-video"><iframe src="http://player.vimeo.com/video/'.$vid.'"  border="'.$border.'" allowfullscreen></iframe></div>';
	}
	add_shortcode ('vimeo','vimeoPlayer');

	/*columns cell from foundation*/
	function row ($atts, $content = '') {
		extract(shortcode_atts(array(
		'title' => 'row'
		), $atts));
		return '<div class="row grid-x" data-equalizer>'.do_shortcode($content).'</div>';
	}
	add_shortcode ('row','row');

	function panel ($atts, $content = '') {
		extract(shortcode_atts(array(
		'title' => 'panel'
		), $atts));
		return '<div class="callout">'.do_shortcode($content).'</div>';
	}
	add_shortcode ('panel','panel');
// tabs shortcode
/* added on 10-09-2015
  [tabs]
    [tab title="some title" link="#id1"] some content 1[/tab]
    [tab title="some title" link="#id2"] some content 2[/tab]
    [tab title="some title" link="#id3"] some content 3[/tab]
  [/tabs]
*/
  function tabs ($atts, $content=null)
  {
    global $tabs_content;
    $tabs_content ='';

    extract(shortcode_atts(array(
      'id' => '',
      'type'=>'tabs'
    ),$atts));
    $output = '<ul class="'.$type.'" data-tab';
    if(!empty($id))
      $output.= 'id="'.$id.'"';

    $output.= '>'.do_shortcode($content).'</ul>';
    $output.= '<div class="tabs-content">'.$tabs_content.'</div>';

    return $output;
  }
  add_shortcode('tabs','tabs');

 function tab ($atts, $content=null){
   global $tabs_content;
   extract(shortcode_atts(array(
     'id'=>'',
     'title'=>'',
     'active'=>''
   ),$atts));
   if (empty($id))
       $id = 'tab-item-'.rand(100,999);
    $activeClass = $active == 'y' ? 'active' :'';
    $output = '
         <li class="tab-title '.$activeClass.'">
             <a href="#'.$id.'">'.$title.'</a>
         </li>';
    $tabs_content.= '<div class="content '.$activeClass.'" id="'.$id.'">'.do_shortcode($content).'</div>';
   return $output;
 }
 add_shortcode('tab', 'tab');


/*// sections
	[accordion]
		[acc title="panel1" link="panel1"]
		[/acc]
	[/accordion]
*/

	function accordion ($atts, $content = '') {
		extract(shortcode_atts(array(
		'type' => 'accordion'
		), $atts));
		return '<dl class="'.$type.'" data-'.$type.' style="margin-bottom:2rem;">'.do_shortcode($content).'</dl>';
	}
	add_shortcode ('accordion','accordion');
	
	//sections internals
	function acc ($atts, $content = '') {
		extract(shortcode_atts(array(
		'title' => 'panel1',
		'state'=> ' ',
		'link'=>'#',
		'slug'=>''
		), $atts));
		return '<dd style="border-bottom: 1px solid #ccc;"><a href="#'.$link.'">'.$title.'<span><i>Click to Open</i></span><i class="fa fa-chevron-circle-down subheader right"></i></a><div id="'.$link.'" class="content panel" style="margin-bottom:0;">'.do_shortcode($content).'</div></dd>';
	}
	add_shortcode ('acc','acc');



	/**
	 * columns  cell Shortcodes
	 *
	 */
	function onethird( $atts, $content = null ) {
	   return '<div class="p0 medium-4 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('onethird', 'onethird');
	
	function twothird( $atts, $content = null ) {
	   return '<div class="p0 medium-8 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('twothird', 'twothird');

	function onehalf( $atts, $content = null ) {
	   return '<div class="p0 medium-6 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('onehalf', 'onehalf');
	
	function onefourth( $atts, $content = null ) {
	   return '<div class="p0 medium-3 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('onefourth', 'onefourth');
	
	function threefourth( $atts, $content = null ) {
	   return '<div class="p0 medium-9 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('threefourth', 'threefourth');

	function onefifth( $atts, $content = null ) {
	   return '<div class="p0 onefifth" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('onefifth', 'onefifth');
	
	function twofifth( $atts, $content = null ) {
	   return '<div class="p0 twofifth" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('twofifth', 'twofifth');
	
	function threefifth( $atts, $content = null ) {
	   return '<div class="p0 threefifth" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('threefifth', 'threefifth');
	
	function onesixth( $atts, $content = null ) {
	   return '<div class="p0 small-3 medium-2 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('onesixth', 'onesixth');
	
	function fivesixth( $atts, $content = null ) {
	   return '<div class="p0 medium-10 columns cell" data-equalizer-watch><div class="block">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('fivesixth', 'fivesixth');
	
?>