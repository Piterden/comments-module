<?php

use Anomaly\CommentsModule\Comment\CommentModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\UserModel;

/**
 * Class AnomalyModuleCommentsCreateCommentsFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleCommentsCreateCommentsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'body'       => 'anomaly.field_type.textarea',
        'approved'   => 'anomaly.field_type.boolean',
        'user'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => UserModel::class,
            ],
        ],
        'parent'     => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => CommentModel::class,
            ],
        ],
        'comment'    => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => CommentModel::class,
            ],
        ],
        'name'       => 'anomaly.field_type.text',
        'email'      => 'anomaly.field_type.email',
        'subject'    => 'anomaly.field_type.polymorphic',
        'ip_address' => 'anomaly.field_type.text',
    ];

}
