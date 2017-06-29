<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleCommentsCreateMentionsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleCommentsCreateMentionsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'mentions',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'user'  => [
            'required' => true,
        ],
        'comment' => [
            'required' => true,
        ],
    ];

}
