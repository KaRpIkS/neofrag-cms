<?php if (!defined('NEOFRAG_CMS')) exit;
/**************************************************************************
Copyright © 2015 Michaël BILCOT & Jérémy VALENTIN

This file is part of NeoFrag.

NeoFrag is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

NeoFrag is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with NeoFrag. If not, see <http://www.gnu.org/licenses/>.
**************************************************************************/

class Button_submit extends Button
{
	public function __invoke($title = '')
	{
		parent::__invoke();

		$this->_template[] = function(&$content, &$attrs, &$tag){
			$attrs['type'] = 'submit';
			$tag = 'button';
		};

		return $this->title($title ?: $this->lang('save'))
					->color('primary');
	}
}

/*
NeoFrag Alpha 0.1.6
./neofrag/libraries/buttons/submit.php
*/