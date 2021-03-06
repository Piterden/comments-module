<?php namespace Anomaly\CommentsModule;

use Anomaly\CommentsModule\Comment\CommentModel;
use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Comments\CommentsCommentsEntryModel;
use Anomaly\Streams\Platform\Model\EloquentModel;

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
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        CommentsModulePlugin::class,
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        'comment'                         => CommentFormBuilder::class,
        CommentsCommentsEntryModel::class => CommentModel::class,
    ];

    /**
     * Register the addon.
     *
     * @param EloquentModel $model
     */
    public function register(EloquentModel $model)
    {
        $model->bind(
            'comments',
            function () {
                /* @var EloquentModel $this */
                return $this->morphMany(CommentModel::class, 'subject', 'subject_type');
            }
        );
        $model->bind(
            'get_comments',
            function () {
                /* @var EloquentModel $this */
                return $this->comments()->get();
            }
        );
    }
}
