<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoutesFixture
 *
 */
class RoutesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '観光ルートID', 'autoIncrement' => true, 'precision' => null],
        'route_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '観光ルートの名前', 'precision' => null, 'fixed' => null],
        'route_description' => ['type' => 'string', 'length' => 1023, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '観光ルートの説明', 'precision' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ユーザID(外部キー)', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作成日時', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '変更日時', 'precision' => null],
        '_indexes' => [
            'created' => ['type' => 'index', 'columns' => ['created'], 'length' => []],
        ],
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
                'route_name' => 'Lorem ipsum dolor sit amet',
                'route_description' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2018-07-10 01:35:37',
                'modified' => '2018-07-10 01:35:37'
            ],
        ];
        parent::init();
    }
}
