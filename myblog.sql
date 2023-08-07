-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2022 at 09:40 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `post_comments` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `content`, `post_id`, `parent_id`, `created_at`) VALUES
(2, 'Omar', 'omar@culture.com', 'svsdv', 12, NULL, '2022-01-08 11:54:10'),
(3, 'ahmed', 'ahmed@ahmed.com', 'hvuyuyh l', 12, NULL, '2022-01-08 13:02:20'),
(4, 'omar', 'ahmed@ahmed.com', 'efewt43', 12, NULL, '2022-01-08 13:15:20'),
(5, 'Omar', 'eeed@ahmed.com', 'cvrtebtrny6', 12, NULL, '2022-01-08 13:17:29'),
(6, 'Ahmad', 'user1@culture.com', 'fbdbeteeasssssssssssssssssssssssssssss', 11, NULL, '2022-01-08 13:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `image_path` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `status`, `image_path`, `user_id`) VALUES
(1, 'Red Rose', 'Kırmızı gül.', 1, '/Images/gallery/img7.jpg', 3),
(3, 'Balikligol', 'Balıklıgöl, Eyyübiye/Şanlıurfa', 0, '/Images/gallery/Balıklıgöl.jpg', 3),
(6, 'Camlica camii', 'The largest mosque in Turkey', 1, '/Images/gallery/Çamlıca Camii.jpg', 3),
(10, 'Kizilay', 'Çankaya, Ankara', 1, '/Images/gallery/Kızılay.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `content`, `status`, `created_at`) VALUES
(1, 'ahmed', 'ahmed@ahmed.com', 'Merhaba', 'eightth test', 1, '2021-11-29 15:42:06'),
(2, 'ahmed', 'user1@culture.com', 'Merhabalar', 'tenth test', 1, '2021-11-29 15:43:49'),
(4, 'Omar', 'omar@blog.com', 'Test The Messages', 'Hi, this is me.', 1, '2022-01-11 12:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `header_photo` text NOT NULL,
  `view_count` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `UserID` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `status`, `header_photo`, `view_count`, `user_id`, `created_at`) VALUES
(1, '5 Habits that can improve your life', '<p><strong>1. Wake Up At a Reasonable Time</strong><br />Getting up early can make a significant impact on how your day is going to shape out. Of course, this isn&rsquo;t to say that you have to get up at five am each day. However, training your body to wake up earlier is an excellent habit that will provide a big reward.</p>\r\n<p>Getting up early gives you the time to complete your morning to-do list and be able to craft the best routine to tackle the day. Even getting up 15-20 minutes earlier than you usually do can be a great habit to develop. It might not seem like much, but it&rsquo;s a start and will add more time back into your day, so you&rsquo;re not overwhelmed with your schedule.</p>\r\n<p>Waking up earlier doesn&rsquo;t have to mean you&rsquo;re getting less sleep either. In 2019, Sleep Cycle, a free app to track sleeping routines, released a study of their three million active monthly users. They concluded the average person sleeps 7 hours and 18 minutes each night. In addition, the average bedtime was 11:39 pm, and wake-up time was 7:09 am. So Americans are getting sleep, but also not oversleeping.</p>\r\n<p>Getting enough sleep but still being able to wake up early is key to starting your day on the right track. Not everybody needs an alarm to wake up, though, and that&rsquo;s okay. Waking up around 7:00 am is actually something that leaders like Elon Musk and Mark Zuckerberg practice each day. Waking up early will set you in a nice daily routine that can help you be productive.</p>\r\n<p><strong>2. Schedule Out Your Day</strong><br />Scheduling out your day is another vital addition to this list of habits that can change your life. It&rsquo;s important to know what you&rsquo;re doing for the day to avoid getting distracted and losing focus. In addition, scheduling out your day can give you an idea of your priorities so you can accomplish what&rsquo;s most important to you.</p>\r\n<p>With a clear schedule, you can be productive and not overwhelmed and bogged down by all your responsibilities. But, of course, there are some things that just won&rsquo;t make it into your schedule, and that&rsquo;s okay. We want to have a plan but also don&rsquo;t want to work ourselves to the point of exhaustion.</p>\r\n<p>If your current schedule isn&rsquo;t working, that&rsquo;s okay; there are ways to fix it. We&rsquo;ve highlighted a few tips on how you can get your schedule catered to you. Of course, some things are more important to schedule into your day than others. We&rsquo;ve mentioned seven crucial components that should be included in your daily routine.</p>\r\n<p>Expressing gratitude and scheduling downtime are just a few of the habits that can be added to your day. Sure, you can prioritize productivity, but you also need to be kind to yourself in mind as well. Time is our most valuable resource, and something we can&rsquo;t get back once it&rsquo;s gone. Having a schedule will help you successfully use those minutes and hours and help establish a good routine instead of wasting away time.</p>\r\n<p><strong>3. Give Yourself Deadlines</strong><br />Giving yourself deadlines to achieve each day is one of the best habits you can develop. Most people don&rsquo;t like deadlines or the pressure that comes with them, but this can actually be helpful when you change your perspective.</p>\r\n<p>Having a goal in mind when a task should be completed can greatly impact your day. Instead of never having a time in mind when something should be done, give yourself that timeline with a deadline. Deadlines have helped me so much in the past because I often procrastinate. There are some things I probably never would have gotten done if I didn&rsquo;t have a specific deadline.</p>\r\n<p>There are a few key benefits you can gain working under a deadline. Accountability is a big one. Hold yourself accountable if your deadline comes and goes and you still don&rsquo;t have the task completed. Do you have someone you can count on to be your accountability partner? If not, consider asking a trusted friend or family member to help you.</p>\r\n<p>Having that accountability allows us to access why the task wasn&rsquo;t finished and how we will improve by hitting a deadline in the future. Having a deadline in place can also help you build momentum. Knowing you have that completion time in mind can help you stay motivated and limit distractions.</p>\r\n<p><strong>4. Make Time For Movement</strong><br />Establishing a habit of moving your body throughout the day can change your life. It&rsquo;s not good for us to be sitting all day without getting up and moving. According to a Mayo Clinic 2019 study, people who sit for eight hours a day with no physical activity have the same risk of dying similar to someone who smokes or is obese. This is bad news for many Americans because sedentary jobs in America have increased more than 83% since 1953, according to the American Heart Association. According to the same survey, only 20% of Americans have physically active jobs. The average office worker actually sits 15 hours a day.</p>\r\n<p>That number is even higher for people who are still commuting to the office every day. Sitting without exercise can raise our chances of many different health risks, including high blood pressure, stroke. Heart disease, obesity, high cholesterol, high blood pressure, and more. What can we do to offset these health risks and work from our seat lifestyle?</p>\r\n<p>Well, we need physical activity in our lives. Something as simple as using a treadmill or walking around the block can make a significant impact on your health. Make sure to take breaks and get up from your chair. Standing up as often as every 30 minutes can be huge for you. If you can even stand while doing phone calls, this can be an excellent way to move around and get your legs moving while also getting working done as well.</p>\r\n<p><strong>5. Prioritize Practicing Self Care</strong><br />Believe it or not, you are your most important asset. We need to take care of ourselves above all else. Make sure you are making time daily to address your self-care. It could be something as simple as meditation, prayer, reading, journaling, or even just focusing on a non-work-related goal you have in mind. Prioritize passion projects that you have as well.</p>\r\n<p>Self-care focuses on both your mental and physical health. We need to keep our health in mind and shouldn&rsquo;t overwork ourselves. If your time allows scheduling a course can be good for you. It can be job-related or just in a passion that you&rsquo;ve had. It&rsquo;s essential to prioritize ourselves and our well-being.</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -49px; top: 1482.17px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 1, '/Images/blank-post.jpg', 22, 3, '2021-11-13 14:53:23'),
(2, 'Second post on LifeBlog', '<p>This is the body of the second post on this site</p>', 1, '/Images/blank-post.jpg', 19, 3, '2021-11-13 14:53:51'),
(9, 'sdcvsdv', '<p>dsvsdvsv</p>', 0, '/Images/blank-post.jpg', 0, 3, '2022-01-07 17:24:46'),
(11, '10 Little Positive Habits That Will Improve Your Day in Big Ways', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QUPaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0NSA3OS4xNjM0OTksIDIwMTgvMDgvMTMtMTY6NDA6MjIgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcFJpZ2h0cz0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3JpZ2h0cy8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wUmlnaHRzOldlYlN0YXRlbWVudD0iaHR0cHM6Ly93d3cuZ2V0dHlpbWFnZXMuY29tL2V1bGE/dXRtX21lZGl1bT1vcmdhbmljJmFtcDt1dG1fc291cmNlPWdvb2dsZSZhbXA7dXRtX2NhbXBhaWduPWlwdGN1cmwiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTI4NDQxNEQ2NTgyMTFFQTk5MkI4QkIxQjhGMzlGRjQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTI4NDQxNEM2NTgyMTFFQTk5MkI4QkIxQjhGMzlGRjQiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSAoQWRvYmUgUGhvdG9zaG9wIENDIiBwaG90b3Nob3A6QXV0aG9yc1Bvc2l0aW9uPSJDb250cmlidXRvciI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSI4MDc1MkQyQTFFMjFGQTJGNkQzN0Q2REMyNkY0REFEOCIgc3RSZWY6ZG9jdW1lbnRJRD0iODA3NTJEMkExRTIxRkEyRjZEMzdENkRDMjZGNERBRDgiLz4gPGRjOmNyZWF0b3I+IDxyZGY6U2VxPiA8cmRmOmxpPnJmcmFuY2E8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2RjOmNyZWF0b3I+IDxkYzp0aXRsZT4gPHJkZjpBbHQ+IDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+MTA4OTczOTkyNDwvcmRmOmxpPiA8L3JkZjpBbHQ+IDwvZGM6dGl0bGU+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+0ASFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAAPHAFaAAMbJUccAgAAAgACADhCSU0EJQAAAAAAEPzhH4nIt8l4LzRiNAdYd+v/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAGGAkkDAREAAhEBAxEB/8QAsQABAQEAAgMBAAAAAAAAAAAAAAECAwQFBgcIAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAUQAAIBAwIEAwQEBgwICwkBAAABAhEDBCEFMRITBkFRB2EiFAhxgTIVkaGxUoIjwdFCYnKy0jOzJCUWQ1OT01SEVXXhksJzgzREdJS0F6Jjo8M1RSY2NxgRAQACAgEEAQQDAQEBAQAAAAABEQISAyExURMEcSIyBUFhgRRSQiP/2gAMAwEAAhEDEQA/AP1KaYAAAAAAEUABQFgAABQIBQAAAAAAAAEAAAIAABEKgBAAAAAAgAoACCFAABAgACgACAUCAAKAAAQCgAgAAAAAAABAoAAAAgAAAAOcigAAAAAABACgUCAUAAAAFAAAAAAAYEAAAIACIVAABAAAABABQAEEKAACAAAEAAAAAAAAAAAAAAAoAAEAoAAgAIAAoACAAAAA5yKAAAAAAAACKAAoAAAAAFAAAAAABAAACMAEAICAogQAAAAEKAAggAoARgQAAAAAAQAAAAUAAAAQCgAAAAAAAAAACAAAAAAQCgc5FAAAAAAAAAAigAKAAAAAAAAUABAAAABGACBRCKFRAgAAAQoACCACgBAAEABAAAAAQCgAAAAAAAAAAKAAAAAACAAAAAAQAAAVA5yKAAAACgABACgAAFAAAAAAAAAAAAAAAIACAECjKkoEAAEAFAgAQoEEKIAAAAIAAAAAAAAAAAgFUAAABAAACgAAEAAAABAFQAACAdgigAAAAAAQpGgAAAAAAAAAAAAAAAAAAQAEAAVCiBAIAQAUCCACgQRgQoAAIAABAABAAAABQAAKAAAFABAAAAAAAAABAFQAACAAAHORQAAAoAAQApUKAKgUAAAAAAAAAAAAAEAAAgFQCBAqAEAFAggAABAIUAAEABEAAAIBagKgAAAABQAAAACgACgAgFAIEAAUCAACAAAADnIoAAAAAFAgFIoFAAACgQCgAAAAAAgAAAAAQCBAqAEAAAIAAARgQoASoAIgAABAAAAAAAAKAAAAAACgAAUAAAAAAACAACAAAAABzkUAAAKAAAQCgAAUIAAKAAAAAAqAAAAgFAIBCoBACAAAEAFAggEKAACAQIAAIAAAAAAAAAAAAACgAAACgAAAAAAAAIBQIAAAAAHORQAAAAAAAABQIBQAAigAAACgQAAAAVAAECBUAIAAAQAUCCAQoEACFECAEAAAAACAAAFAAAAAAAAoAAAAAAAAAAAAAAAAAAAKgc5FAAAAAAAAAAAAABVIoAAAAAACAAFQARASFRAAAABAAEqAAhQIAEKIEKgQAAAgAAAAAAAACgAAAAAAAUCAAAABUAAAAAKBAAAAAA7BFKgKgKgKgKgKgKgKgSoACgSoFqRbKgKgAFQALQAUsIWAsKgBAAACAAAEAhQAEEqAKIEKgQABAAAAAAgFAAAAACgAAAAAAAAAAAAAAAAAAAAAAAADnIoAAAAAAAAAAAAA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\" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong>1. Start the day with a positive mind-set.</strong>&nbsp;Upon awakening make the commitment to face the day and whatever it brings with a positive frame of mind. Prepare yourself for the fact that everything will probably not go smoothly, or as planned, and be willing to handle any challenges that confront you (we know there will be some).</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. Practice Gratitude.</strong>&nbsp;Be grateful for and focus on the good things you have in your life. Many of us get in the habit of sweating the \'small stuff\' and let it get in the way of appreciating the important things such as family, friends, good health, freedom, and the many opportunities we enjoy. When we get caught up in the small stuff, it downplays the fact that we really do have much for which to be grateful.</p>\r\n<p><strong>3. Learn something new.</strong>&nbsp;Make a conscious effort to keep your brain active and functioning at optimum levels. Learn a new vocabulary word or a new piece of information as often as you can. It will keep you sharp and alert.</p>\r\n<p><strong>4. Have a good laugh.</strong>&nbsp;Read the comics or tell a joke just to loosen things up. Laughter and a jovial attitude help relieve stress, keep things light, and change your perspective from a gloomy to a cheerful one.</p>\r\n<p><strong>5. Smile at someone.</strong>&nbsp;When you walk through the office, down the street, or are in a store, make it a point to smile at someone to acknowledge them. It will make you both feel good. We\'re usually so preoccupied and caught up in activity that we don\'t take time to notice those around us.</p>\r\n<p><strong>6. Give a heartfelt compliment.</strong>&nbsp;If you notice that someone at school/work has a new hairdo or outfit and looks especially good, or has just given a good presentation, don\'t hold back, give them a compliment. Everyone enjoys positive feedback.</p>\r\n<p><strong>7. Tell your spouse, family member or friend how much you appreciate them.</strong>&nbsp;Just as we enjoy a nice compliment now and then, it improves our mood to know a loved one appreciates us. Quite often we take those we are closest to for granted.</p>\r\n<p><strong>8. Perform an act of kindness.&nbsp;</strong>Do something nice just for the sake of doing it. Help an elderly person lift or carry a parcel. Clear the table after a meal if it\'s not your normal routine. Offer to take your neighbor\'s kids to the park, or the show, along with yours. It generates and promotes good will.</p>\r\n<p><strong>9. Be a better listener.</strong>&nbsp;Take the time to listen to another\'s point of view. Even if you don\'t agree with what he/she is saying, try to put yourself in their place and understand where they\'re coming from.</p>\r\n<p><strong>10. Take 10-15 minutes quiet time.</strong>&nbsp;Give yourself a break. You deserve time to reflect and regroup too. Even a little 15-minute catnap can be surprisingly refreshing and rejuvenating. You\'ll wake up feeling like you can take on anything!</p>\r\n<p>These 10 little positive habits can be incorporated into your routine at whatever intervals are comfortable for you.</p>', 1, '/Images/blank-post.jpg', 34, 3, '2022-01-07 17:33:15'),
(12, 'PHP preg match Function', '<h2>Definition and Usage</h2>\r\n<p>The&nbsp;<code class=\"w3-codespan\">preg_match()</code>&nbsp;function returns whether a match was found in a string.</p>\r\n<h2>Syntax</h2>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 100%;\">preg_match(<em>pattern, input, matches, flags, offset</em>)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Parameter Values</h2>\r\n<table style=\"border-collapse: collapse; width: 100%; height: 435.125px;\" border=\"1\">\r\n<thead>\r\n<tr style=\"height: 22.3958px;\">\r\n<td style=\"width: 33.0612%; height: 22.3958px;\"><strong>Parameter</strong></td>\r\n<td style=\"width: 66.9388%; height: 22.3958px;\"><strong>Description</strong></td>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr style=\"height: 44.7917px;\">\r\n<td style=\"width: 33.0612%; height: 44.7917px;\"><em>pattern</em></td>\r\n<td style=\"width: 66.9388%; height: 44.7917px;\">Required. Contains a regular expression indicating what to search for.</td>\r\n</tr>\r\n<tr style=\"height: 22.3958px;\">\r\n<td style=\"width: 33.0612%; height: 22.3958px;\"><em>input</em></td>\r\n<td style=\"width: 66.9388%; height: 22.3958px;\">Required. The string in which the search will be performed</td>\r\n</tr>\r\n<tr style=\"height: 44.7917px;\">\r\n<td style=\"width: 33.0612%; height: 44.7917px;\"><em>matches</em></td>\r\n<td style=\"width: 66.9388%; height: 44.7917px;\">Optional. The variable used in this parameter will be populated with an array containing all of the matches that were found</td>\r\n</tr>\r\n<tr style=\"height: 255.958px;\">\r\n<td style=\"width: 33.0612%; height: 255.958px;\"><em>flags</em></td>\r\n<td style=\"width: 66.9388%; height: 255.958px;\">Optional. A set of options that change how the matches array is structured:\r\n<ul>\r\n<li><code class=\"w3-codespan\">PREG_OFFSET_CAPTURE</code>&nbsp;- When this option is enabled, each match, instead of being a string, will be an array where the first element is a substring containing the match and the second element is the position of the first character of the substring in the input.</li>\r\n<li><code class=\"w3-codespan\">PREG_UNMATCHED_AS_NULL</code>&nbsp;- When this option is enabled, unmatched subpatterns will be returned as NULL instead of as an empty string.</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 22.3958px;\">\r\n<td style=\"width: 33.0612%; height: 22.3958px;\"><em>offset</em></td>\r\n<td style=\"width: 66.9388%; height: 22.3958px;\">Optional. Defaults to 0. Indicates how far into the string to begin searching. The preg_match() function will not find matches that occur before the position given in this parameter</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 1, '/Images/blank-post.jpg', 78, 3, '2022-01-08 05:52:43'),
(15, 'test with tags', '<p>select two tags.</p>', 0, '/Images/blank-post.jpg', 1, 3, '2022-01-10 08:32:38'),
(17, 'Kizilay Ankara', '<p>Kızılay is a neighbourhood in &Ccedil;ankaya, Ankara, Turkey.&nbsp;<br />It is named after the Kızılay Derneği whose headquarters used to be located at the Kızılay Square, its centre.<br />G&uuml;venpark in Kızılay has many trees and benches,&nbsp;<br />while a metro station and a bus terminal nearby provide easy access to other parts of the city.</p>', 1, '/Images/blank-post.jpg', 151, 3, '2022-01-13 10:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_ibfk_1` (`post_id`),
  KEY `post_tag_ibfk_2` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(14, 2, 1),
(15, 1, 1),
(16, 1, 4),
(17, 1, 5),
(18, 11, 1),
(19, 11, 4),
(20, 12, 6),
(21, 12, 7),
(22, 12, 8),
(23, 1, 10),
(24, 1, 11),
(25, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `description`) VALUES
(1, 'habits', 'every day activities'),
(4, 'productivity', 'The efficiency of production of goods or services expressed by some measure'),
(5, 'schedule', 'Giving lists of intended events and times.'),
(6, 'PHP', 'PHP'),
(7, 'function', 'A programming paradigm where programs are constructed by applying and composing functions.'),
(8, 'programming', 'The process of creating a set of instructions that tell a computer how to perform a task.'),
(9, 'Turkey', 'The Republic of Turkey'),
(10, 'culture', 'The social behavior and norms found in human societies, as well as the knowledge, beliefs, arts, laws, customs, capabilities, and habits of the individuals.'),
(11, 'tourism', 'Traveling for pleasure or business.');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

DROP TABLE IF EXISTS `userlogs`;
CREATE TABLE IF NOT EXISTS `userlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_ip` varbinary(16) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`id`, `user_id`, `user_ip`, `login_date`) VALUES
(7, 3, 0x6d79626c6f67, '2022-05-12 09:28:43'),
(8, 8, 0x6d79626c6f67, '2022-05-12 09:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roll` enum('user','manager') NOT NULL DEFAULT 'user',
  `photo_path` text NOT NULL,
  `sub_agreement` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `birthDate`, `gender`, `phone`, `email`, `password`, `roll`, `photo_path`, `sub_agreement`, `created_at`) VALUES
(3, 'Omar', 'Kadish', '1996-05-31', 0, NULL, 'omar@blog.com', 'ab9dc21ec0350c74943a7bb1b2bbfdb1', 'manager', '/Images/My-photolinked.jpg', 1, '2021-11-30 11:06:56'),
(8, 'Ahmad', 'Ahmad', '1998-02-01', NULL, NULL, 'ahmad@ahmad.com', '7df640aae8dfd8030b3e52478615109e', 'user', '/Images/blank-profile.png', 1, '2022-01-11 14:29:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_comments` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `image_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD CONSTRAINT `userlogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
