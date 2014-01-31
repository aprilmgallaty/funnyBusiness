<?php

function fb_get_random_clown_type() {
	$allClownTypes = array(
		array(
			'imgSrc' => '/_img/clownTypes/auguste150x150.jpg',
			'title' => 'Auguste',
			'desc' => 'The auguste face base makeup color is a variation of pink, red, or tan rather than white. Features are exaggerated in size and are typically red and black in color. The mouth is thickly outlined with white (called the muzzle) as are the eyes. The auguste is dressed (appropriate to character) in either well-fitted garb or in a costume that does not fit - either oversize or too small is appropriate. Bold colors, large prints or patterns, and suspenders often characterize auguste costumes.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/bum150x150.jpg',
			'title' => 'Bum',
			'desc' => 'The most prevalent character clown in the American circus is the hobo, tramp or bum clown. There are subtle differences in the American character clown types. The primary differences among these clown types is attitude.<br/><br/><strong>The Bum:</strong> Non-migratory and non-working.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/character150x150.jpg',
			'title' => 'Character',
			'desc' => 'The character clown adopts an eccentric character of some type, such as a butcher, a baker, a policeman, a housewife or hobo. Prime examples of this type of clown are the circus tramps Otto Griebling and Emmett Kelly. Red Skelton, Harold Lloyd, Buster Keaton, and Charlie Chaplin would all fit the definition of a character clown.<br/><br/>The character clown makeup is a comic slant on the standard human face. Their makeup starts with a flesh tone base and may make use of anything from glasses, mustaches and beards to freckles, warts, big ears or strange haircuts.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/hobo150x150.jpg',
			'title' => 'Hobo',
			'desc' => 'The most prevalent character clown in the American circus is the hobo, tramp or bum clown. There are subtle differences in the American character clown types. The primary differences among these clown types is attitude.<br/><br/><strong>The Hobo:</strong> Migratory and finds work where he travels. Down on his luck but maintains a positive attitude.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/mime150x150.jpg',
			'title' => 'Mime',
			'desc' => 'A mime artist is someone who uses mime as a theatrical medium or as a performance art, involving miming, or the acting out a story through body motions, without use of speech. In earlier times, in English, such a performer would typically be referred to as a mummer. Miming is to be distinguished from silent comedy, in which the artist is a seamless character in a film or sketch.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Mime" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/tramp150x150.jpg',
			'title' => 'Tramp',
			'desc' => 'The most prevalent character clown in the American circus is the hobo, tramp or bum clown. There are subtle differences in the American character clown types. The primary differences among these clown types is attitude.<br/><br/><strong>The Tramp:</strong> Migratory and does not work where he travels. Down on his luck and depressed about his situation.',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		),
		array(
			'imgSrc' => '/_img/clownTypes/whiteFace150x150.jpg',
			'title' => 'White Face',
			'desc' => 'The white face clown, or clown blanc from the original French, is seemingly dignified and serious and is the most ancient type of clown. It is a sophisticated character, as opposed to the clumsy auguste. They are also distinguished as the "sad clown" (blanc) and "happy clown" (auguste).',
			'credit' => '<a href="http://en.wikipedia.org/wiki/Clown" target="_blank" name="Wikipedia">Wikipedia.org</a>'
		)
	);
	
	return $allClownTypes[rand(0,count($allClownTypes)-1)];
}

$clownType = fb_get_random_clown_type();

?>
		
<article class="clownTypes">

	<h2>Clown Types</h2>

		<img src="<?php echo get_stylesheet_directory_uri() . $clownType['imgSrc']; ?>" width="150" height="150" alt="<?php echo $clownType['title']; ?>" />

		<h3><?php echo $clownType['title']; ?></h3>

			<p id="para"><?php echo $clownType['desc']; ?></p>
			<p>- <span class="credit"><?php echo $clownType['credit']; ?></span></p>
                        
			
</article>
