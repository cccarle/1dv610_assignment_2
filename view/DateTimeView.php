<?php


include ("./model/Time.php");


class DateTimeView {

	/* 
	Returns a string with time from server.
	*/
	
	public function show() {

		$timeString = Time::GetTime();

		return '<p>' . $timeString . '</p>';
	}
}



