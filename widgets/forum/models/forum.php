<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

class w_forum_m_forum extends Model
{
	public function get_last_messages()
	{
		$forums = $this->_get_forum();

		return $this->db->select('m.message_id', 'm.topic_id', 'm.message', 'm.date', 't.title as topic_title', 'u.user_id', 'u.username', 'up.avatar', 'up.sex')
						->from('nf_forum_messages m')
						->join('nf_forum_topics t',    'm.topic_id = t.topic_id')
						->join('nf_users u',           'u.user_id  = m.user_id AND u.deleted = "0"')
						->join('nf_users_profiles up', 'up.user_id = m.user_id')
						->where('t.forum_id', $forums)
						->order_by('m.date DESC')
						->limit(3)
						->get();
	}

	public function get_last_topics()
	{
		$forums = $this->_get_forum();

		return $this->db->select('t.topic_id', 't.title', 'm.message_id', 'u.user_id', 'm.date', 'u.username', 'up.avatar', 'up.sex', 't.count_messages')
						->from('nf_forum_messages m')
						->join('nf_forum_topics t',    'm.topic_id = t.topic_id')
						->join('nf_users u',           'u.user_id  = m.user_id AND u.deleted = "0"')
						->join('nf_users_profiles up', 'up.user_id = m.user_id')
						->where('t.forum_id', $forums)
						->group_by('t.topic_id')
						->order_by('m.date DESC')
						->limit(3)
						->get();
	}

	public function _get_forum()
	{
		$categories = [];

		foreach ($this->db->select('category_id')->from('nf_forum_categories')->get() as $category_id)
		{
			if ($this->access('forum', 'category_read', $category_id))
			{
				$categories[] = $category_id;
			}
		}

		return $this->db->select('f.forum_id')
						->from('nf_forum f')
						->join('nf_forum f2', 'f2.forum_id = f.parent_id AND f.is_subforum = "1"')
						->where('IFNULL(f2.parent_id, f.parent_id)', $categories)
						->get();
	}
}
