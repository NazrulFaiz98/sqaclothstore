<?php
/**
 * DOMPDF library
 *
 * @link       
 * @since 2.6.6     
 *
 * @package  Wf_Woocommerce_Packing_List  
 */
if (!defined('ABSPATH')) {
    exit;
}
class Wt_Pklist_Dompdf
{
	public $dompdf=null;
    public $option = null;
	public function __construct()
	{
		$path=plugin_dir_path(__FILE__).'vendor/';
        include_once($path.'autoload.php');

        // initiate dompdf class
        $this->dompdf = new Dompdf\Dompdf();
        $this->option = new Dompdf\Options();
	}
	public function generate($upload_dir, $html, $action, $is_preview, $file_path, $args=array())
	{
        $this->dompdf->setPaper('A4', 'portrait'); 
        $this->option->set('isHtml5ParserEnabled', true);
        $this->option->set('enableCssFloat', true);
        $this->option->set('isRemoteEnabled', true);
        $this->option->set('defaultFont', 'dejavu sans');
        $this->option->set('enable_font_subsetting', true);
        $this->dompdf->setOptions($this->option);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->loadHtml($html);
        
        // Render the HTML as PDF
        $this->dompdf->render();

        if("download" === $action || "preview" === $action)
        {  
        	$is_attachment=($is_preview ? false : true);
            $this->dompdf->stream($file_path, array("Attachment" =>$is_attachment));              
        }else
        {
        	@file_put_contents($file_path, $this->dompdf->output());
        }
        return true;    
	}
}