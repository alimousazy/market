<?php

class user_plansTest extends WebTestCase
{
	public $fixtures=array(
		'user_plans'=>'user_plans',
	);

	public function testShow()
	{
		$this->open('?r=user_plans/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=user_plans/create');
	}

	public function testUpdate()
	{
		$this->open('?r=user_plans/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=user_plans/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=user_plans/index');
	}

	public function testAdmin()
	{
		$this->open('?r=user_plans/admin');
	}
}
