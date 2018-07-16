<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpotsTable Test Case
 */
class SpotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpotsTable
     */
    public $Spots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.spots',
        'app.routes',
        'app.tags',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Spots') ? [] : ['className' => SpotsTable::class];
        $this->Spots = TableRegistry::getTableLocator()->get('Spots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spots);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
