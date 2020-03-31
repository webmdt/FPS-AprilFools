<?php
function get_message(){
	$messages = array(
		'I am counting down the days...',
		'Buh bye Dr. Title',
		'Good riddance',
		'You are so much nicer and smarter than what people say about you',
		'I don\'t care what they say about you, you\'re alright',	
	);
		
	$messageRandom = array_rand($messages, 1);
	return $messages[$messageRandom];
}
