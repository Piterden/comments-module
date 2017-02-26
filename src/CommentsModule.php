<?php namespace Anomaly\CommentsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class CommentsModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule
 */
class CommentsModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-comment';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'comments',
    ];

}
