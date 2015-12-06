<?php
namespace Callisto\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembershipsFixture
 *
 */
class MembershipsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'subscription_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'reader_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'BY_SUBSCRIPTION_ID' => ['type' => 'index', 'columns' => ['subscription_id'], 'length' => []],
            'BY_READER_ID' => ['type' => 'index', 'columns' => ['reader_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'b1181936-b3e5-4a97-b853-f81aef40404a',
            'subscription_id' => '644b6cde-0ef7-40bf-8cdc-2e800d93c83b',
            'reader_id' => '311188ef-2402-4228-bbc4-c9c17e462800',
            'deleted' => '2015-12-06 04:21:03',
            'created' => '2015-12-06 04:21:03',
            'modified' => '2015-12-06 04:21:03'
        ],
    ];
}
