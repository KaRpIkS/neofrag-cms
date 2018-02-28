<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

class m_talks_c_admin_checker extends Controller_Module
{
	public function index($page = '')
	{
		return [$this->pagination->get_data($this->model()->get_talks(), $page)];
	}

	public function _edit($talk_id, $title)
	{
		if ($talk_id > 1 && $talk = $this->model()->check_talk($talk_id, $title))
		{
			return $talk;
		}
	}

	public function delete($talk_id, $title)
	{
		$this->ajax();

		if ($talk_id > 1 && $talk = $this->model()->check_talk($talk_id, $title))
		{
			return $talk;
		}
	}
}
