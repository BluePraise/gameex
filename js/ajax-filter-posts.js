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
                taxonomy: tags.join(",")
            };

            $.post({
                url: afp_vars.afp_ajax_url,
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
