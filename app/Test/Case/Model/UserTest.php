<?php

App::uses('User', 'Model');

/**
 * User Test Case
 *
 * @property User $User 
 */
class UserTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->User);

        parent::tearDown();
    }

    public function testAQuantidadeDeUsuariosDeveSerIgualAZero() {
        $this->assertCount(0, $this->User->find('all'));
    }

    public function testAQuantidadeDeUsuariosDeveSerIguaA4() {
        for ($index = 0; $index < 4; $index++) {
            $i = $index + 1;
            $this->User->create();
            $this->User->save(array(
                'name' => 'User' . $i,
                'user_name' => 'UserName' . $i,
                'password' => 'Password' . $i,
            ));
        }
        var_dump($this->User->find('all'));
        $this->assertCount(4, $this->User->find('all'));
    }

}
