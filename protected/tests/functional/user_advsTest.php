<?php

class user_advsTest extends WebTestCase
{
	public $fixtures=array(
		'user_advs'=>'user_advs',
	);

	public function testShow()
	{
		$this->open('?r=user_advs/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=user_advs/create');
	}

	public function testUpdate()
	{
		$this->open('?r=user_advs/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=user_advs/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=user_advs/index');
	}

	public function testAdmin()
	{
		$this->open('?r=user_advs/admin');
	}
}
