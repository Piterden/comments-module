<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleCommentsCreateParticipationStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'participation'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [];

}
