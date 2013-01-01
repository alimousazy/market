<?php

class itemTest extends WebTestCase
{
	public $fixtures=array(
		'items'=>'item',
	);

	public function testShow()
	{
		$this->open('?r=item/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=item/create');
	}

	public function testUpdate()
	{
		$this->open('?r=item/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=item/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=item/index');
	}

	public function testAdmin()
	{
		$this->open('?r=item/admin');
	}
}
