<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SpotsFixture
 *
 */
class SpotsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '観光地ID', 'autoIncrement' => true, 'precision' => null],
        'spot_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '観光地の名前', 'precision' => null, 'fixed' => null],
        'spot_description' => ['type' => 'string', 'length' => 1024, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '観光地の説明', 'precision' => null, 'fixed' => null],
        'spot_address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '住所', 'precision' => null, 'fixed' => null],
        'start_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '開始日', 'precision' => null],
        'end_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '終了日', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'spot_name' => 'Lorem ipsum dolor sit amet',
                'spot_description' => 'Lorem ipsum dolor sit amet',
                'spot_address' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2018-07-10 01:35:54',
                'end_date' => '2018-07-10 01:35:54'
            ],
        ];
        parent::init();
    }
}
