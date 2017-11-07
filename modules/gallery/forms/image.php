<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

$rules = [
	'title' => [
		'label' => '{lang title}',
		'type'  => 'text',
		'value' => $this->form->value('title'),
		'rules' => 'required'
	],
	'description' => [
		'label' => '{lang description}',
		'type'  => 'textarea',
		'value' => $this->form->value('description')
	]
];
