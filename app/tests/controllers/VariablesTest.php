<?php

use Mockery as m;
use Way\Tests\Factory;

class VariablesTest extends TestCase {

  public function __construct() {
    $this->mock = m::mock('Eloquent', 'Variable');
    $this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
  }

  public function setUp() {
    parent::setUp();

    $this->attributes = Factory::variable(['id' => 1]);
    $this->app->instance('Variable', $this->mock);
  }

  public function tearDown() {
    m::close();
  }

  public function testIndex() {
    $this->mock->shouldReceive('all')->once()->andReturn($this->collection);
    $this->call('GET', 'variables');

    $this->assertViewHas('variables');
  }

  public function testCreate() {
    $this->call('GET', 'variables/create');

    $this->assertResponseOk();
  }

  public function testStore() {
    $this->mock->shouldReceive('create')->once();
    $this->validate(true);
    $this->call('POST', 'variables');

    $this->assertRedirectedToRoute('variables.index');
  }

  public function testStoreFails() {
    $this->mock->shouldReceive('create')->once();
    $this->validate(false);
    $this->call('POST', 'variables');

    $this->assertRedirectedToRoute('variables.create');
    $this->assertSessionHasErrors();
    $this->assertSessionHas('message');
  }

  public function testShow() {
    $this->mock->shouldReceive('findOrFail')
      ->with(1)
      ->once()
      ->andReturn($this->attributes);

    $this->call('GET', 'variables/1');

    $this->assertViewHas('variable');
  }

  public function testEdit() {
    $this->collection->id = 1;
    $this->mock->shouldReceive('find')
      ->with(1)
      ->once()
      ->andReturn($this->collection);

    $this->call('GET', 'variables/1/edit');

    $this->assertViewHas('variable');
  }

  public function testUpdate() {
    $this->mock->shouldReceive('find')
      ->with(1)
      ->andReturn(m::mock(['update' => true]));

    $this->validate(true);
    $this->call('PATCH', 'variables/1');

    $this->assertRedirectedTo('variables/1');
  }

  public function testUpdateFails() {
    $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
    $this->validate(false);
    $this->call('PATCH', 'variables/1');

    $this->assertRedirectedTo('variables/1/edit');
    $this->assertSessionHasErrors();
    $this->assertSessionHas('message');
  }

  public function testDestroy() {
    $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

    $this->call('DELETE', 'variables/1');
  }

  protected function validate($bool) {
    Validator::shouldReceive('make')
      ->once()
      ->andReturn(m::mock(['passes' => $bool]));
  }

}
