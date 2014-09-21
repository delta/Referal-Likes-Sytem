CREATE DATABASE `fblikes` ;

CREATE TABLE `likes` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `referer_id` varchar(45) DEFAULT NULL,
  `invitees_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `profile_pic` varchar(45) DEFAULT NULL,
  `liked` int(11) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `reg_users` (
  `fbid` varchar(45) NOT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `profile_pic` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
