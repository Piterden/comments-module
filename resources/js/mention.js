$(function () {

    /**
     * Bind mentioning to the comment
     * text area.
     */
    $('textarea[data-field="body"]').atwho({
        at: "@",
        callbacks: {
            remoteFilter: function (query, callback) {

                if (query.length < 3) {
                    return;
                }

                $.getJSON(
                    REQUEST_ROOT_PATH + "/comments/mention",
                    {q: query},
                    function (data) {
                        callback(data)
                    }
                );
            }
        }
    });
});
