-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 02:41 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `padi_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id_assessment` int(11) NOT NULL AUTO_INCREMENT,
  `id_domain` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_assessment`),
  KEY `id_domain` (`id_domain`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id_assessment`, `id_domain`, `date`) VALUES
(1, 1, '2016-04-11 02:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_detail`
--

CREATE TABLE IF NOT EXISTS `assessment_detail` (
  `id_assessment_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_assessment` int(11) NOT NULL,
  `id_point` int(11) NOT NULL,
  `id_result` int(11) NOT NULL,
  `status` bit(1) NOT NULL,
  PRIMARY KEY (`id_assessment_detail`),
  KEY `id_assessment` (`id_assessment`),
  KEY `id_point` (`id_point`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assessment_detail`
--

INSERT INTO `assessment_detail` (`id_assessment_detail`, `id_assessment`, `id_point`, `id_result`, `status`) VALUES
(1, 1, 1, 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE IF NOT EXISTS `domain` (
  `id_domain` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(64) NOT NULL,
  PRIMARY KEY (`id_domain`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id_domain`, `url`) VALUES
(1, 'google.com'),
(2, 'yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `point_check`
--

CREATE TABLE IF NOT EXISTS `point_check` (
  `id_point` int(11) NOT NULL AUTO_INCREMENT,
  `id_source` int(11) NOT NULL,
  `id_section` int(11) DEFAULT NULL,
  `point_name` varchar(100) NOT NULL,
  `point_desc` text NOT NULL,
  `point_what_need_fixing` text NOT NULL,
  `point_who_can_fix` varchar(128) NOT NULL,
  `point_how_to_fix` text NOT NULL,
  PRIMARY KEY (`id_point`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `point_check`
--

INSERT INTO `point_check` (`id_point`, `id_source`, `id_section`, `point_name`, `point_desc`, `point_what_need_fixing`, `point_who_can_fix`, `point_how_to_fix`) VALUES
(1, 0, 2, 'Cross browser compatibility', 'no issues viewing the website across multiple browsers.', 'the website displays differently on different browsers.', 'Webmaster', 'You need to ensure that your website looks the same regardless of which browser is opening thewebsite. Your webmaster should be able to add code that will prevent cross browser errors.'),
(2, 0, 2, 'Mobile friendly site', 'allows mobile users to access information clearly and provides a quality user experience.', 'the website does not have a mobile responsive version. When users look at the site from a smart phone or tablet they still see the standard website layout which makes it hard to use for them.', 'Webmaster', 'Mobile users need to see a website layout that is easy for them to use on their device. Create a mobile friendly version of your website that allows users to see the mobile version easily.'),
(3, 0, 2, 'The Footer', 'provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company.', 'the footer section of the website is the perfect place to have your contact details which sends quality signals to Google about your company.', 'Webmaster', 'Place your name, address and telephone number in the footer of your website, on every page. This is a good signal for Google and will help in local search results.'),
(4, 0, 2, 'Visual Layout and Clarity', 'modern, good looking website that is clear and easy to use.', 'the site is very out dated compared to modern web site design and as such does not represent your band well, or come across as user friendly.', 'Webmaster', 'Consider looking into a new fresher design that represents your company more favorably. Your website is the first thing that clients see about your company and so creating a website that looks professional and up to date sends a very strong message about your company. If you use a quality CMS such as WordPress it is much easier to update your theme periodically so that you continue to keep your company image fresh and up to date.'),
(5, 0, 2, 'Quantity of Images', 'lots of quality images illustrate the company and services well.', 'we would expect to see a lot more images across the site to clearly show what your company is all about.', 'Webmaster', 'There are many opportunities to add more images throughout the site. Consider that the user experience is increased when a user can gain an emotional experience with the website. Images allow users to experience the service and as such are vital to the site, as are videos.'),
(6, 0, 3, 'Top level Menu', 'is clear and easy to use.', 'is confusing and hard for users to find their way around the website.', 'Webmaster', 'We would suggest that you keep the header menu simple and easy to use. Drop down menus are very useful if there are not too many, and easy to work with.'),
(7, 0, 3, 'Home page Navigation', 'is clear and easy to use.', 'Aside from the top menu it is confusing how the site link structure fits together. Users should be able to travel through a website with ease, understanding how they move forward or backwards on the site.', 'Webmaster', 'We would suggest that add quality text links within the site to help direct people to the pages that you want them to visit.'),
(8, 0, 3, 'Breadcrumbs', 'is present on the site allowing people to find their way back through the site.', 'When we visit any page on the site we have no idea how we got to that page. Breadcrumbs allow us to follow the route back through the site.', 'Webmaster', 'Ensure that every page has a list of pages to show people how they got there. If using a CMS then there are many plugins that will do this for you. If not, your webmaster will be able to add them.'),
(9, 0, 3, 'Back to top', 'is present on long pages within the site.', 'When you have long pages we suggest that you have a link going back to the top of the page.', 'Webmaster', 'Adding “named anchors” to the page is a simple task for webmasters.'),
(10, 0, 4, 'Sitemaps', 'xml sitemaps are in place and structured correctly.', 'are not installed on the site.', 'Webmaster', 'Ensure that you have an XML sitemap which should be submitted to Google Webmaster tools which allows Google to index all of your pages, posts and images.'),
(11, 0, 4, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.'),
(12, 0, 4, 'Google Analytics', 'is installed on the site.', 'is not installed and thus you won’t be receiving analytical data about your website traffic and performance.', 'Webmaster', 'Setup Google Analytics using your company Gmail account and then install the tracking code on every page of your website to start getting data.'),
(13, 0, 5, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.'),
(14, 0, 5, 'Internal page errors', 'are kept to a minimum.', 'There are broken links of your internal pages that can’t be accessed.', 'Webmaster', 'Fix the broken link and remove unnecessary pages that you don’t need anymore.'),
(15, 0, 5, 'Link types and anchor text , placement and density', 'work well throughout the site.', 'internal text links are almost nonexistent on the site. Internal links allow people to move more effectively around the site. Link density is also too high / low across the site.', 'Webmaster', 'Create relevant links in the body of text on each page to help users direct themselves through the site. Make sure that you use LSI keywords in your links and that they are relevant to the page that is being linked to.'),
(16, 0, 5, 'URL structure', 'is well thought out and consistent with Google’s best SEO guidelines.', '# Tags in the URLS – causes Google to see the site as a single page website and thus they will never rank any of your internal pages, limiting your chances of ranking well in the search engines.', 'Webmaster', 'using # tags in URL’s is problematic unless you are going to use AJAX crawling protocols which have not been established on this site. We have encountered clients who have built websites like this before and tried to source solutions that did not involve making the site again; we are still to find a solution that does not involve doing just that.'),
(17, 0, 6, 'Mobile version page speed', '', '', '', ''),
(18, 0, 6, 'Desktop version page speed', '', '', '', ''),
(19, 0, 7, 'Page Titles', 'are generally unique across the pages.', 'all of your page titles are either duplicated, too long, too short or missing.', 'Webmaster', 'Ensure that on every page there is a unique page title for that page that gives the search engine a good indication what that page is about.'),
(20, 0, 7, 'Meta description', 'are generally uniquely descriptive for each page.', 'multiple examples of duplicate meta descriptions on the site will be causing issues for your rankings.', 'Webmaster', 'Meta Descriptions must be unique for every page. Ask your webmaster to ensure that every page is edited to be different and relevant to the page in question.'),
(21, 0, 7, 'H1 and H2 tags', 'are present, unique and different to page titles.', 'For all the pages on the website every page has some issue with its H tags.', 'Webmaster', 'Content on every page should be structures so that users can easily follow the content. Using H tags allows users to do just that and so each page must have a unique H1 tag and then unique H2 tags also.'),
(22, 0, 8, 'Visually appealing images', 'The site is full of visually appealing images that represent the location and diving very well.', 'Image Quality – there are many images that appear blurry on the site.', 'Webmaster', 'Every image should be optimized so that it is the right size and displays clearly. Blurriness normally occurs when you try to make an image larger than it actually is.'),
(23, 0, 8, 'Image tags', 'are generally fine on the site and well optimized.', 'there are many images on the site that do not have prominent alt tags.', 'Webmaster', 'Every image should have an alt tag that describes the actual image. This is done by editing the code for every image on the site.'),
(24, 0, 8, 'Image Size', 'is ok with most not being too large.', 'the images require optimizing as many of them are too large causing page load speeds to be slow.', 'Webmaster', 'Resize images to ensure they are the exact size that you need on the website.'),
(25, 0, 9, 'Duplicate content warnings', '', '', '', ''),
(26, 0, 9, 'Keyword density', '', '', '', ''),
(27, 0, 9, 'Every product pages', '', '', '', ''),
(28, 0, 10, 'Outbound link profile', '', '', '', ''),
(29, 0, 10, 'Inbound link profile', '', '', '', ''),
(30, 0, 11, 'Hosting quality', '', '', '', ''),
(31, 0, 11, 'Domain registration length', '', '', '', ''),
(32, 0, 12, 'Branded search rankings', '', '', '', ''),
(33, 0, 12, 'Local search rankings', '', '', '', ''),
(34, 0, 12, 'Paid advertising', '', '', '', ''),
(35, 0, 13, 'Text', 'is brand- or product-relevant and have enough words.', 'At least one paragraph with appropriate keywords – the text on the homepage is too small and need expanding so that search engines and users can benefit from the content.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.'),
(36, 0, 13, 'Product pages', 'are appropriately descriptive and have enough text.', 'Text quantity is low – many internal pages do not have enough text.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.'),
(37, 0, 14, 'Product pages', '', '', '', ''),
(38, 0, 15, 'Blog section', 'has lots of updates with good images', 'Consistency and quality – there are only 1 to 3 blog posts per month and so this could be done more regularly.', 'Webmaster', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.'),
(39, 0, 15, 'News section', 'has lots of updates about the company.', 'No news section seems to exist – we have been unable to find a section that includes the latest updates from the company.', 'Basic user', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.'),
(40, 0, 16, 'Special offers page', '', '', '', ''),
(41, 0, 16, 'Special offer information', '', '', '', ''),
(42, 0, 17, 'CMS', 'Built on an easy-to-update CMS', 'We would look to have some form of CMS in place for future website builds that will allow you to easily update and control information on your website.', 'Basic user', 'One for the future – choosing something like WordPress or Drupal for future website installations will help with content management and also google rankings as these platforms are very SEO friendly.'),
(43, 0, 17, 'RSS feed', 'is present', 'No RSS feed is present on the site – when you have new content then having an RSS feed will allow other people to pick up your content.', 'Basic user', 'Installing an RSS feed is simple for a webmaster to do for this site.'),
(44, 0, 17, 'Regular updates', 'is maintained well in the blog section.', 'We would suggest building the news section and then posting more quality content that is pointing to your website.', 'Basic user', 'Establish a content production schedule for your staff to write content which will then be posted on your site. A new section can contain so much information about what is going on at your dive center, the local region and in the dive industry in general.'),
(45, 0, 18, 'Indexed on Google', '', '', '', ''),
(46, 0, 18, 'Indexed on Bing', '', '', '', ''),
(47, 0, 19, 'Social media icons', 'available to identify company', 'there does not appear to be any links to social media sites on the website. There is a small area on the specials page but outside of this it is non-existent.', 'Webmaster', 'ocial media is a huge part of customer acquisition these days as divers want to see what is going on with the dive center. Social Media is a great way to get your news content out across a network of people and also to communicate with your customers. Consider it vital to become active on Social Media and have social media linked into your web property.'),
(48, 0, 19, 'Facebook social', 'plugin used', 'vital to improve social shares and thus rankings.', 'Webmaster', 'Establish a Facebook business page and begin posting to it with all of your company happenings. Ensure you post quality content that links back to your website. Also put the Facebook icon and link next to the social icons on your website.'),
(49, 0, 19, 'Twitter social', 'plugin used', 'helps to get the message out to your clients.', 'Webmaster', 'Establish a Twitter page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Twitter icon and link next to the social icons on your website.'),
(50, 0, 19, 'Google+', 'social plugin used', 'vital to improve rankings in Google.', 'Webmaster', 'Establish a Google+ business page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Google+ icon and link next to the social icons on your website.'),
(51, 0, 19, 'Pinterest/Instagram', 'social plugin used', 'With so many great images I would use another social media platform such as Pinterest or Instagram, or both, to start showing more people about the incredible marine life you have in the area.', 'Webmaster', 'Sign up for an account online and organize your staff to post daily images. You can also encourage your day guests to post their best images and share them with you.'),
(52, 0, 20, 'Share buttons', 'available', 'will help user to share your content easily through their personal social media account. This is really beneficial for your marketing effort.', 'Webmaster', 'Install the share button for Facebook, Twitter, Google+, and Instagram/Pinterest in the internal product pages and in the blog section.'),
(53, 0, 20, 'Facebook', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(54, 0, 20, 'Twitter', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(55, 0, 20, 'Pinterest', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(56, 0, 20, 'Google+', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.'),
(57, 0, 21, 'Graphics & Images', 'show us the quality of the location and resort.', '', '', ''),
(58, 0, 21, 'Branding', 'company logo appears consistently on the site.', 'A company logo does not appear consistently and prominently on the site which is an important point for people to recognise your company and brand.', 'Webmaster', 'Place you company logo prominently in the header of the image in your website.'),
(59, 0, 21, 'NAP', 'Strong site-wide is present on the footer.', 'Legitimate businesses feature their names, addresses and phone numbers prominently.', 'Webmaster', 'Put the NAP into your footer on every page as well as on your contact page.'),
(60, 0, 21, 'Tripadvisor / testimonials', 'is present on the site with a good management towards any negative comments.', 'You do not display TripAdvisor reviews on your website which are a great tool for clients to hear independent information about your company.', 'Webmaster', 'You can Add Tripadvisor widgets to the website which can show the latest reviews. Also consider getting management to respond to negative reviews on Tripadvisor as this sends a quality signal about your company.'),
(61, 0, 21, 'PADI branding', 'appears prominently on the site.', 'The PADI logo does not appear prominently on the website. The PADI logo is known worldwide as is very useful to help increase the quality of your brand.', 'Webmaster', 'Place the PADI logo in the header of your website, along with your own company logo.'),
(62, 0, 22, 'About us', 'page provides good information about the general area, company profile, conservation and the diving team.', 'You could consider increasing the content to include information about the team at the dive resort. Divers like to see who they will be diving with and have a chance to get to know the dive staff.', 'Webmaster', 'You can add additional content and pages to the site to enhance the experience for the end user, showing them more about your company, team, location and more. Adding more content will also help rankings in the search engines.'),
(63, 0, 23, 'Minimized “dead zones”', 'pages are filled nicely, especially with images.', 'pages have lots of blank spaces.', 'Webmaster', 'Minimizing dead zones by filling them with images, testimonials, videos, trip advisor widgets, social media icons and text.'),
(64, 0, 23, 'What’s next” feature', 'is present on the site.', 'is missing on all pages which stops people from moving through the site easily. Moreover, users who are confused about their next action at the bottom of a page may simply opt to exit.', 'Webmaster', 'Add simple links at the bottom of each page showing users where to head next, or how to get back to the top of the page. For example, you may have a link at the bottom of the open water course page that points to the advanced open water course page.'),
(65, 0, 23, 'End of pages feature back to top', 'appears in every pages.', 'doesn’t appear anywhere on the site.', 'Webmaster', 'Add a “back to top” link at the bottom of pages to encourage users to access your site’s main navigation again. This, coupled with the “what’s next” feature is a great way to keep users on the website.'),
(66, 0, 24, 'Book online / Sign up forms', 'present in the contact menu and it’s linked to each internal product pages', 'not present anywhere on the site.', 'Webmaster', 'You can allow users to inquire about specific programs and offers through specialized sign up forms that you include on the product pages. Consider adding a sign up form for a newsletter as well. Place the sign up forms on your product pages making it easy for them.'),
(67, 0, 24, 'Contact Page', 'is clear and simple to use.', 'We would suggest you expand the contact pages to include your Name, Address and telephone number, social icons and even a Google map. The current page is very empty.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer.'),
(68, 0, 24, 'Contact Page uses forms', 'which allow customers to provide useful data.', 'We would suggest you expand the contact page to include a contact form so that people can add information and make it easy to send to you.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer. Consider adding a Google map to your contact page so people know how to find you.');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id_result` int(11) NOT NULL AUTO_INCREMENT,
  `id_source` int(11) NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`id_result`),
  KEY `id_source` (`id_source`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(50) NOT NULL,
  `section_slug` varchar(50) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  `section_cat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_section`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `section_name`, `section_slug`, `section_desc`, `section_cat`) VALUES
(2, 'User Experience', 'user-experience', 'The user experience is the general impression a user has when interacting with your website.', 'site structure'),
(3, 'Navigation', 'navigation', 'The method(s) of accessing content contained in the website.', 'site structure'),
(4, 'Search Engine Accessibility', 'search-engine-accessibility', 'How easy is it for the search engines to find your online content, index it and display it to potential consumers?', 'seo'),
(5, 'Internal Link Structure', 'internal-link-structure', 'Describes how the website is seen by Google, kind of like a family tree.', 'seo'),
(6, 'Page Speed', 'page-speed', 'A relative assessment of how quickly your website loads.', 'seo'),
(7, 'Meta Tags & Headings', 'meta-tag-and-heading', 'Meta tags are pieces of code that tell the search engine (and users) information about your web pages.', 'seo'),
(8, 'Images', 'image', 'The images on your site not only affect the appearance of the site, but also its speed and search relevance', 'seo'),
(9, 'Text', 'text', 'The words on your website are the easiest way for a search engine to understand what you are talking about.', 'seo'),
(10, 'Link Profile', 'link-profile', 'Your link profile is an overview of the number and quality of other websites that are linking to you', 'seo'),
(11, 'Hosting & Registration', 'hosting-and-registration', 'The host is the physical machine that holds the data for your website and “serves” it to users', 'seo'),
(12, 'Search Rankings', 'search-ranking', 'A search for your website or brand should help your customers find you easily.', 'ranking'),
(13, 'Homepage Content', 'homepage-content', 'A quick look at the content of the main page on your website', 'content management'),
(14, 'Internal Page Content', 'internal-page-content', 'A look at the structure of product / service pages', 'content management'),
(15, 'Blog / News Section', 'blog-news-section', 'An assessment of “recency” on your website.', 'content management'),
(16, 'Special Offers', 'special-offer', 'Websites with occasional special offers tell users that the business is active and that content is being updated regularly', 'content management'),
(17, 'Content Management', 'content-management', 'A Content Management System is a system to publish and administer the content of a website.', 'content management'),
(18, 'Indexed Pages', 'indexed-page', 'This is the total number of files found in Google’s index for your website.', 'content management'),
(19, 'Homepage', 'homepage', 'This checks how integrated your home/main pages are with your social media efforts.', 'social integration'),
(20, 'Products Pages & Blog Pages', 'product-and-blog', 'An assessment of your site’s integration of social media shares.', 'social integration'),
(21, 'Quality Signals', 'quality-signal', 'Signals regarding the legitimacy, accountability and capability of your company.', 'quality/retention/convertion'),
(22, 'Strong Company / ', 'strong-company-about-us-quality', 'Website users want to identify with brands and the individuals behind them', 'quality/retention/convertion'),
(23, 'Retention', 'retention', 'Retention deals with your site’s ability to keep users engaged and consuming more content.', 'quality/retention/convertion'),
(24, 'Conversion', 'conversion', 'Conversion relates to the actions that lead to inquiries, customer interaction, and bookings.', 'quality/retention/convertion');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `id_source` int(11) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id_source`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`id_domain`) REFERENCES `domain` (`id_domain`);

--
-- Constraints for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  ADD CONSTRAINT `assessment_detail_ibfk_1` FOREIGN KEY (`id_assessment`) REFERENCES `assessment` (`id_assessment`),
  ADD CONSTRAINT `assessment_detail_ibfk_2` FOREIGN KEY (`id_point`) REFERENCES `point_check` (`id_point`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_source`) REFERENCES `source` (`id_source`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
