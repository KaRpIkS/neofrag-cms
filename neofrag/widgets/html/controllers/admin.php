<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

class w_html_c_admin extends Controller_Widget
{
	public function index($settings = [])
	{
		return $this->view('bbcode', $settings);
	}
	
	public function html($settings = [])
	{
		return '<textarea class="form-control" name="settings[content]" placeholder="'.$this->lang('html_code').'" rows="6">'.(isset($settings['content']) ? $settings['content'] : '').'</textarea>';
	}
}
