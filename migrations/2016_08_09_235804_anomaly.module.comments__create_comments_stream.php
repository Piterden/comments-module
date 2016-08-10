<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleCommentsCreateCommentsStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleCommentsCreateCommentsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'comments',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'body'       => [
            'required' => true,
        ],
        'approved',
        'user',
        'name',
        'email',
        'parent',
        'subject'    => [
            'required' => true,
        ],
        'ip_address' => [
            'required' => true,
        ],
    ];

}
