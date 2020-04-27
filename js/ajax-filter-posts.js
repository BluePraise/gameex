(function($, root, undefined) {
    $(function() {
        "use strict";

        var tags = [];

        $(".tag-filter").click(function(event) {
            // Prevent defualt action - opening tag page
            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }
            var checkbox = $(this).find("input");
            var isBox = $(this).hasClass("js-filter-box") ? 1 : 0;
            checkbox.prop("checked", !checkbox.prop("checked"));

            // Get tag slug from title attirbute
            var selectedTaxonomy = $(this).attr("title");
            if (tags.indexOf(selectedTaxonomy) !== -1) {
                tags = tags.filter(function(i) {
                    return i !== selectedTaxonomy;
                });
            } else {
                tags.push(selectedTaxonomy);
            }

            var data = {
                action: "filter_posts", // function to execute
                afp_nonce: afp_vars.afp_nonce, // wp_nonce
                taxonomy: JSON.stringify(tags),
                isBox: isBox
            };

            $.post({
                url: afp_vars.afp_ajax_url,
                data: data,
                beforeSend: function() {
                    $(".js-loading-container").addClass("js-loading");
                },
                success: function(response) {
                    if (response) {
                        // Display posts on page
                        $(".js-ajax-posts").html(response);
                        $(".js-loading-container").removeClass("js-loading");
                    }
                }
            });
        });
    });
})(jQuery, this);
