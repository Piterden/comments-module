<?php

return [
    'comments/mention'         => 'Anomaly\CommentsModule\Http\Controller\MentionController@index',
    'admin/comments'           => 'Anomaly\CommentsModule\Http\Controller\Admin\CommentsController@index',
    'admin/comments/edit/{id}' => 'Anomaly\CommentsModule\Http\Controller\Admin\CommentsController@edit',
];
