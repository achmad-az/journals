jQuery(function ($) {
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var page = 2; // Start from the second page since we're already on the first one
	$("#loadmore").on("click", function () {
		$.ajax({
			url: ajaxurl,
			data: {
				action: "load_posts_by_ajax",
				page: page,
				security: '<?php echo wp_create_nonce("load_more_posts"); ?>',
			},
			type: "post",
			beforeSend: function (xhr) {
				$("#loadmore").text("Loading..."); // change the button text
			},
			success: function (response) {
				if (response) {
					$("#loadmore").text("Load More");
					$(".post").last().after(response); // insert new posts
					page++;
				} else {
					$("#loadmore").text("No More Posts");
					setTimeout(function () {
						$("#loadmore").fadeOut();
					}, 2000);
				}
			},
		});
		return false;
	});
});
