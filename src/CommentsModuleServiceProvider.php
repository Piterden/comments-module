<?php namespace Anomaly\CommentsModule;

use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class CommentsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule
 */
class CommentsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        'comment'                                                            => CommentFormBuilder::class,
        'Anomaly\Streams\Platform\Model\Comments\CommentsCommentsEntryModel' => 'Anomaly\CommentsModule\Comment\CommentModel',
    ];
}
