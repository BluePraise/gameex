(function($, root, undefined) {
    $(function() {
        "use strict";

        $(".js-search-overview").submit(function(event) {
            // Prevent defualt action - opening tag page
            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }
            $(".tag-filter")
                .find("input")
                .prop("checked", false);

            var data = {
                action: "search_posts", // function to execute
                asp_nonce: asp_vars.asp_nonce, // wp_nonce
                search: $(this)
                    .find("input[name=s]")
                    .val()
            };

            $.get({
                url: asp_vars.asp_ajax_url,
                data: data,
                beforeSend: function() {
                    $(".main-overview__in").addClass("js-loading");
                },
                success: function(response) {
                    if (response) {
                        // Display posts on page
                        $(".main-overview__posts").html(response);
                        $(".main-overview__in").removeClass("js-loading");
                    }
                }
            });
        });
    });
})(jQuery, this);
