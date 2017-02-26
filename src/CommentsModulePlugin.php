<?php namespace Anomaly\CommentsModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class CommentsModulePlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CommentsModulePlugin extends Plugin
{

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'comments',
                function ($subject) {
                    return view(
                        'anomaly.module.comments::comments.index',
                        [
                            'subject' => (new Decorator())->undecorate($subject),
                        ]
                    );
                },
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }
}
