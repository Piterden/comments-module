<?php namespace Anomaly\CommentsModule\Http\Controller\Admin;

use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\CommentsModule\Comment\Table\CommentTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class CommentsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param CommentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CommentTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param CommentFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CommentFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param CommentFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CommentFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
