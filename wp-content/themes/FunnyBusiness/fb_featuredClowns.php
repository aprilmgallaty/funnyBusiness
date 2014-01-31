<?php

	$allClowns = buatp_get_all_users_by_type('Clown');
	$allClowns[0] = $allClowns[''];
	unset($allClowns['']);
	$featuredClownId = $allClowns[rand(0,count($allClowns)-1)];
	$featuredClownName = bp_core_get_user_displayname($featuredClownId);
	$featuredClownLink = bp_core_get_user_domain($featuredClownId);
	$featuredClownAvatar = bp_core_fetch_avatar(
		array(
			'item_id'    => $featuredClownId,
			'type'       => 'full',
			'class'      => 'featuredClownImg',
			'html'       => true,
			'title'      => $featuredClownName
		)
	);
	$featuredClownProfile = BP_XProfile_ProfileData::get_all_for_user( $featuredClownId );
	if ($featuredClownProfile['Professional history']['field_data']) {
		$words = explode(' ', $featuredClownProfile['Professional history']['field_data']);
		$featuredClownDesc = implode(' ', array_splice($words, 0, 50));
	} else {
		$featuredClownDesc = 'None';
	}
	$featuredClownSkills = unserialize($featuredClownProfile['Skills']['field_data']);
	
    function fb_show_ratings($clown_id)
    {
        global $wpdb;
        $check_content_loop = $wpdb->get_results("SELECT AVG(star) AS Average FROM " . $wpdb->prefix . "bp_activity WHERE  type = 'Member_review' AND usercheck='" . $clown_id . "'");
        $check_content_loop_count = $wpdb->get_col("SELECT star FROM " . $wpdb->prefix . "bp_activity WHERE  type = 'Member_review' AND usercheck='" . $clown_id . "'");
        if ($check_content_loop[0]->Average != "") {
            $check_show_star_loop = $check_content_loop[0]->Average;
            $demss = 0;
			echo '<span class="rating-top"> ';
            for ($dem = 1; $dem < 6 ; $dem ++){
                if ($dem <= $check_show_star_loop) {
                    echo '<img style="border-width:0;" style="position:relative;top:-5px" alt="1 star" src="'.DEPROURL.'/images/star.png">';
                } else {
                    $demss++;
                    if (ceil($check_show_star_loop)- $check_show_star_loop > 0 and $demss == 1) {
                            echo '<img style="border-width:0;" alt="1 star" src="'.DEPROURL.'/images/star_half.png">';
                    } else {
                        echo '<img style="border-width:0;" alt="1 star" src="'.DEPROURL.'/images/star_off.png">';
                    }
                }
            }
			echo '<br/>(Based on '.count($check_content_loop_count).' reviews)</span>';
        } else {
			echo '<span class="rating-top" style="position:relative;top:-5px;font-weight:bold">No Reviews</span>';
        }
    }

?>

<article class="featuredClowns">

    <h2>Featured Clown</h2>

	<div class="clownAvatar">
		<a href="<?php echo $featuredClownLink; ?>">
			<?php echo $featuredClownAvatar; ?>
		</a>

		<div class="clownName"><h3><a href="<?php echo $featuredClownLink; ?>"><?php echo $featuredClownName; ?></a></h3></div>
		<div class="cityState"><h4><?php echo $featuredClownProfile['City']['field_data'] . ', ' . $featuredClownProfile['State']['field_data']; ?></h4></div>
	</div>

	<div class="clownAttributes">
		<div class="rating"><h3>Rating: &nbsp;</h3>
			<?php fb_show_ratings($featuredClownId); ?>
		</div>

		<div class="skills">
			<h3>Skills:</h3>
				<h4><?php if ($featuredClownSkills) echo implode(', ', $featuredClownSkills); else echo 'None'; ?></h4>
		</div>
	</div>

	<div class="description">
		<p><?php echo stripcslashes($featuredClownDesc); ?></p>
	</div>
	
</article>


