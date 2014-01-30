<?php

use Mockery as m;
use Way\Tests\Factory;

class VariableDetailsTest extends TestCase {

  public function __construct() {
    $this->mock = m::mock('Eloquent', 'Variable_detail');
    $this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
  }

  public function setUp() {
    parent::setUp();

    $this->attributes = Factory::variable_detail(['id' => 1]);
    $this->app->instance('Variable_detail', $this->mock);
  }

  public function tearDown() {
    m::close();
  }

  public function testIndex() {
    $this->mock->shouldReceive('all')->once()->andReturn($this->collection);
    $this->call('GET', 'variable_details');

    $this->assertViewHas('variable_details');
  }

  public function testCreate() {
    $this->call('GET', 'variable_details/create');

    $this->assertResponseOk();
  }

  public function testStore() {
    $this->mock->shouldReceive('create')->once();
    $this->validate(true);
    $this->call('POST', 'variable_details');

    $this->assertRedirectedToRoute('variable_details.index');
  }

  public function testStoreFails() {
    $this->mock->shouldReceive('create')->once();
    $this->validate(false);
    $this->call('POST', 'variable_details');

    $this->assertRedirectedToRoute('variable_details.create');
    $this->assertSessionHasErrors();
    $this->assertSessionHas('message');
  }

  public function testShow() {
    $this->mock->shouldReceive('findOrFail')
      ->with(1)
      ->once()
      ->andReturn($this->attributes);

    $this->call('GET', 'variable_details/1');

    $this->assertViewHas('variable_detail');
  }

  public function testEdit() {
    $this->collection->id = 1;
    $this->mock->shouldReceive('find')
      ->with(1)
      ->once()
      ->andReturn($this->collection);

    $this->call('GET', 'variable_details/1/edit');

    $this->assertViewHas('variable_detail');
  }

  public function testUpdate() {
    $this->mock->shouldReceive('find')
      ->with(1)
      ->andReturn(m::mock(['update' => true]));

    $this->validate(true);
    $this->call('PATCH', 'variable_details/1');

    $this->assertRedirectedTo('variable_details/1');
  }

  public function testUpdateFails() {
    $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
    $this->validate(false);
    $this->call('PATCH', 'variable_details/1');

    $this->assertRedirectedTo('variable_details/1/edit');
    $this->assertSessionHasErrors();
    $this->assertSessionHas('message');
  }

  public function testDestroy() {
    $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

    $this->call('DELETE', 'variable_details/1');
  }

  protected function validate($bool) {
    Validator::shouldReceive('make')
      ->once()
      ->andReturn(m::mock(['passes' => $bool]));
  }

}
