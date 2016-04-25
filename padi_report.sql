-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 04:34 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padi_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id_assessment` int(11) NOT NULL,
  `id_domain` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_detail`
--

CREATE TABLE `assessment_detail` (
  `id_assessment_detail` int(11) NOT NULL,
  `id_assessment` int(11) NOT NULL,
  `id_point` int(11) NOT NULL,
  `id_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id_domain` int(11) NOT NULL,
  `url` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id_domain`, `url`) VALUES
(1, 'google.com'),
(2, 'yahoo.com'),
(3, 'facebook.com'),
(4, 'facebook2.com'),
(5, 'twitter.com'),
(6, ''),
(7, 'google3.com'),
(8, 'google4.com'),
(9, 'google2.com');

-- --------------------------------------------------------

--
-- Table structure for table `point_check`
--

CREATE TABLE `point_check` (
  `id_point` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `id_section` int(11) DEFAULT NULL,
  `point_name` varchar(100) NOT NULL,
  `point_desc` text NOT NULL,
  `point_what_need_fixing` text NOT NULL,
  `point_who_can_fix` varchar(128) NOT NULL,
  `point_how_to_fix` text NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_check`
--

INSERT INTO `point_check` (`id_point`, `id_source`, `id_section`, `point_name`, `point_desc`, `point_what_need_fixing`, `point_who_can_fix`, `point_how_to_fix`, `status`) VALUES
(1, 1, 2, 'Cross browser compatibility', 'no issues viewing the website across multiple browsers.', 'the website displays differently on different browsers.', 'Webmaster', 'You need to ensure that your website looks the same regardless of which browser is opening thewebsite. Your webmaster should be able to add code that will prevent cross browser errors.', b'0'),
(2, 1, 2, 'Mobile friendly site', 'allows mobile users to access information clearly and provides a quality user experience.', 'the website does not have a mobile responsive version. When users look at the site from a smart phone or tablet they still see the standard website layout which makes it hard to use for them.', 'Webmaster', 'Mobile users need to see a website layout that is easy for them to use on their device. Create a mobile friendly version of your website that allows users to see the mobile version easily.', b'0'),
(3, 1, 2, 'The Footer', 'provides full Name, Address and Phone number (NAP) which Google uses as a quality signal about the company.', 'the footer section of the website is the perfect place to have your contact details which sends quality signals to Google about your company.', 'Webmaster', 'Place your name, address and telephone number in the footer of your website, on every page. This is a good signal for Google and will help in local search results.', b'0'),
(4, 1, 2, 'Visual Layout and Clarity', 'modern, good looking website that is clear and easy to use.', 'the site is very out dated compared to modern web site design and as such does not represent your band well, or come across as user friendly.', 'Webmaster', 'Consider looking into a new fresher design that represents your company more favorably. Your website is the first thing that clients see about your company and so creating a website that looks professional and up to date sends a very strong message about your company. If you use a quality CMS such as WordPress it is much easier to update your theme periodically so that you continue to keep your company image fresh and up to date.', b'0'),
(5, 1, 2, 'Quantity of Images', 'lots of quality images illustrate the company and services well.', 'we would expect to see a lot more images across the site to clearly show what your company is all about.', 'Webmaster', 'There are many opportunities to add more images throughout the site. Consider that the user experience is increased when a user can gain an emotional experience with the website. Images allow users to experience the service and as such are vital to the site, as are videos.', b'0'),
(6, 1, 3, 'Top level Menu', 'is clear and easy to use.', 'is confusing and hard for users to find their way around the website.', 'Webmaster', 'We would suggest that you keep the header menu simple and easy to use. Drop down menus are very useful if there are not too many, and easy to work with.', b'0'),
(7, 1, 3, 'Home page Navigation', 'is clear and easy to use.', 'Aside from the top menu it is confusing how the site link structure fits together. Users should be able to travel through a website with ease, understanding how they move forward or backwards on the site.', 'Webmaster', 'We would suggest that add quality text links within the site to help direct people to the pages that you want them to visit.', b'0'),
(8, 1, 3, 'Breadcrumbs', 'is present on the site allowing people to find their way back through the site.', 'When we visit any page on the site we have no idea how we got to that page. Breadcrumbs allow us to follow the route back through the site.', 'Webmaster', 'Ensure that every page has a list of pages to show people how they got there. If using a CMS then there are many plugins that will do this for you. If not, your webmaster will be able to add them.', b'0'),
(9, 1, 3, 'Back to top', 'is present on long pages within the site.', 'When you have long pages we suggest that you have a link going back to the top of the page.', 'Webmaster', 'Adding “named anchors” to the page is a simple task for webmasters.', b'0'),
(10, 1, 4, 'Sitemaps', 'xml sitemaps are in place and structured correctly.', 'are not installed on the site.', 'Webmaster', 'Ensure that you have an XML sitemap which should be submitted to Google Webmaster tools which allows Google to index all of your pages, posts and images.', b'0'),
(11, 1, 4, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.', b'0'),
(12, 1, 4, 'Google Analytics', 'is installed on the site.', 'is not installed and thus you won’t be receiving analytical data about your website traffic and performance.', 'Webmaster', 'Setup Google Analytics using your company Gmail account and then install the tracking code on every page of your website to start getting data.', b'0'),
(13, 1, 5, 'Robots.txt', 'file is present and not causing any issues', 'is not installed on the site.', 'Webmaster', 'Add a robots.txt file into the root of your domain to tell search engines which files to crawl and which not to crawl.', b'0'),
(14, 1, 5, 'Internal page errors', 'are kept to a minimum.', 'There are broken links of your internal pages that can’t be accessed.', 'Webmaster', 'Fix the broken link and remove unnecessary pages that you don’t need anymore.', b'0'),
(15, 1, 5, 'Link types and anchor text , placement and density', 'work well throughout the site.', 'internal text links are almost nonexistent on the site. Internal links allow people to move more effectively around the site. Link density is also too high / low across the site.', 'Webmaster', 'Create relevant links in the body of text on each page to help users direct themselves through the site. Make sure that you use LSI keywords in your links and that they are relevant to the page that is being linked to.', b'0'),
(16, 1, 5, 'URL structure', 'is well thought out and consistent with Google’s best SEO guidelines.', '# Tags in the URLS – causes Google to see the site as a single page website and thus they will never rank any of your internal pages, limiting your chances of ranking well in the search engines.', 'Webmaster', 'using # tags in URL’s is problematic unless you are going to use AJAX crawling protocols which have not been established on this site. We have encountered clients who have built websites like this before and tried to source solutions that did not involve making the site again; we are still to find a solution that does not involve doing just that.', b'0'),
(17, 1, 6, 'Mobile version page speed', '', '', '', '', b'0'),
(18, 1, 6, 'Desktop version page speed', '', '', '', '', b'0'),
(19, 1, 7, 'Page Titles', 'are generally unique across the pages.', 'all of your page titles are either duplicated, too long, too short or missing.', 'Webmaster', 'Ensure that on every page there is a unique page title for that page that gives the search engine a good indication what that page is about.', b'0'),
(20, 1, 7, 'Meta description', 'are generally uniquely descriptive for each page.', 'multiple examples of duplicate meta descriptions on the site will be causing issues for your rankings.', 'Webmaster', 'Meta Descriptions must be unique for every page. Ask your webmaster to ensure that every page is edited to be different and relevant to the page in question.', b'0'),
(21, 1, 7, 'H1 and H2 tags', 'are present, unique and different to page titles.', 'For all the pages on the website every page has some issue with its H tags.', 'Webmaster', 'Content on every page should be structures so that users can easily follow the content. Using H tags allows users to do just that and so each page must have a unique H1 tag and then unique H2 tags also.', b'0'),
(22, 1, 8, 'Visually appealing images', 'The site is full of visually appealing images that represent the location and diving very well.', 'Image Quality – there are many images that appear blurry on the site.', 'Webmaster', 'Every image should be optimized so that it is the right size and displays clearly. Blurriness normally occurs when you try to make an image larger than it actually is.', b'0'),
(23, 1, 8, 'Image tags', 'are generally fine on the site and well optimized.', 'there are many images on the site that do not have prominent alt tags.', 'Webmaster', 'Every image should have an alt tag that describes the actual image. This is done by editing the code for every image on the site.', b'0'),
(24, 1, 8, 'Image Size', 'is ok with most not being too large.', 'the images require optimizing as many of them are too large causing page load speeds to be slow.', 'Webmaster', 'Resize images to ensure they are the exact size that you need on the website.', b'0'),
(25, 1, 9, 'Duplicate content warnings', '', '', '', '', b'0'),
(26, 1, 9, 'Keyword density', '', '', '', '', b'0'),
(27, 1, 9, 'Every product pages', '', '', '', '', b'0'),
(28, 1, 10, 'Outbound link profile', '', '', '', '', b'0'),
(29, 1, 10, 'Inbound link profile', '', '', '', '', b'0'),
(30, 1, 11, 'Hosting quality', '', '', '', '', b'0'),
(31, 1, 11, 'Domain registration length', '', '', '', '', b'0'),
(32, 1, 12, 'Branded search rankings', '', '', '', '', b'0'),
(33, 1, 12, 'Local search rankings', '', '', '', '', b'0'),
(34, 1, 12, 'Paid advertising', '', '', '', '', b'0'),
(35, 1, 13, 'Text', 'is brand- or product-relevant and have enough words.', 'At least one paragraph with appropriate keywords – the text on the homepage is too small and need expanding so that search engines and users can benefit from the content.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.', b'0'),
(36, 1, 13, 'Product pages', 'are appropriately descriptive and have enough text.', 'Text quantity is low – many internal pages do not have enough text.', 'Webmaster', 'Work towards having at least 300 words on the home page that is relevant about your product and brand.', b'0'),
(37, 1, 14, 'Product pages', '', '', '', '', b'0'),
(38, 1, 15, 'Blog section', 'has lots of updates with good images', 'Consistency and quality – there are only 1 to 3 blog posts per month and so this could be done more regularly.', 'Webmaster', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.', b'0'),
(39, 1, 15, 'News section', 'has lots of updates about the company.', 'No news section seems to exist – we have been unable to find a section that includes the latest updates from the company.', 'Basic user', 'We would suggest developing a content strategy so that you can post our news and blog posts every week that can then also be used as part of your social media campaign.', b'0'),
(40, 1, 16, 'Special offers page', '', '', '', '', b'0'),
(41, 1, 16, 'Special offer information', '', '', '', '', b'0'),
(42, 1, 17, 'CMS', 'Built on an easy-to-update CMS', 'We would look to have some form of CMS in place for future website builds that will allow you to easily update and control information on your website.', 'Basic user', 'One for the future – choosing something like WordPress or Drupal for future website installations will help with content management and also google rankings as these platforms are very SEO friendly.', b'0'),
(43, 1, 17, 'RSS feed', 'is present', 'No RSS feed is present on the site – when you have new content then having an RSS feed will allow other people to pick up your content.', 'Basic user', 'Installing an RSS feed is simple for a webmaster to do for this site.', b'0'),
(44, 1, 17, 'Regular updates', 'is maintained well in the blog section.', 'We would suggest building the news section and then posting more quality content that is pointing to your website.', 'Basic user', 'Establish a content production schedule for your staff to write content which will then be posted on your site. A new section can contain so much information about what is going on at your dive center, the local region and in the dive industry in general.', b'0'),
(45, 1, 18, 'Indexed on Google', '', '', '', '', b'0'),
(46, 1, 18, 'Indexed on Bing', '', '', '', '', b'0'),
(47, 1, 19, 'Social media icons', 'available to identify company', 'there does not appear to be any links to social media sites on the website. There is a small area on the specials page but outside of this it is non-existent.', 'Webmaster', 'ocial media is a huge part of customer acquisition these days as divers want to see what is going on with the dive center. Social Media is a great way to get your news content out across a network of people and also to communicate with your customers. Consider it vital to become active on Social Media and have social media linked into your web property.', b'0'),
(48, 1, 19, 'Facebook social', 'plugin used', 'vital to improve social shares and thus rankings.', 'Webmaster', 'Establish a Facebook business page and begin posting to it with all of your company happenings. Ensure you post quality content that links back to your website. Also put the Facebook icon and link next to the social icons on your website.', b'0'),
(49, 1, 19, 'Twitter social', 'plugin used', 'helps to get the message out to your clients.', 'Webmaster', 'Establish a Twitter page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Twitter icon and link next to the social icons on your website.', b'0'),
(50, 1, 19, 'Google+', 'social plugin used', 'vital to improve rankings in Google.', 'Webmaster', 'Establish a Google+ business page and begin posting to it like you would to a Facebook business page. Ensure you post quality content that links back to your website. Also put the Google+ icon and link next to the social icons on your website.', b'0'),
(51, 1, 19, 'Pinterest/Instagram', 'social plugin used', 'With so many great images I would use another social media platform such as Pinterest or Instagram, or both, to start showing more people about the incredible marine life you have in the area.', 'Webmaster', 'Sign up for an account online and organize your staff to post daily images. You can also encourage your day guests to post their best images and share them with you.', b'0'),
(52, 1, 20, 'Share buttons', 'available', 'will help user to share your content easily through their personal social media account. This is really beneficial for your marketing effort.', 'Webmaster', 'Install the share button for Facebook, Twitter, Google+, and Instagram/Pinterest in the internal product pages and in the blog section.', b'0'),
(53, 1, 20, 'Facebook', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', b'0'),
(54, 1, 20, 'Twitter', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', b'0'),
(55, 1, 20, 'Pinterest', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', b'0'),
(56, 1, 20, 'Google+', 'social plugin used', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', 'Webmaster', 'Same suggestions as for the home page section – consider Google+, Facebook, Twitter, Pinterest and/or Instagram.', b'0'),
(57, 1, 21, 'Graphics & Images', 'show us the quality of the location and resort.', '', '', '', b'0'),
(58, 1, 21, 'Branding', 'company logo appears consistently on the site.', 'A company logo does not appear consistently and prominently on the site which is an important point for people to recognise your company and brand.', 'Webmaster', 'Place you company logo prominently in the header of the image in your website.', b'0'),
(59, 1, 21, 'NAP', 'Strong site-wide is present on the footer.', 'Legitimate businesses feature their names, addresses and phone numbers prominently.', 'Webmaster', 'Put the NAP into your footer on every page as well as on your contact page.', b'0'),
(60, 1, 21, 'Tripadvisor / testimonials', 'is present on the site with a good management towards any negative comments.', 'You do not display TripAdvisor reviews on your website which are a great tool for clients to hear independent information about your company.', 'Webmaster', 'You can Add Tripadvisor widgets to the website which can show the latest reviews. Also consider getting management to respond to negative reviews on Tripadvisor as this sends a quality signal about your company.', b'0'),
(61, 1, 21, 'PADI branding', 'appears prominently on the site.', 'The PADI logo does not appear prominently on the website. The PADI logo is known worldwide as is very useful to help increase the quality of your brand.', 'Webmaster', 'Place the PADI logo in the header of your website, along with your own company logo.', b'0'),
(62, 1, 22, 'About us', 'page provides good information about the general area, company profile, conservation and the diving team.', 'You could consider increasing the content to include information about the team at the dive resort. Divers like to see who they will be diving with and have a chance to get to know the dive staff.', 'Webmaster', 'You can add additional content and pages to the site to enhance the experience for the end user, showing them more about your company, team, location and more. Adding more content will also help rankings in the search engines.', b'0'),
(63, 1, 23, 'Minimized “dead zones”', 'pages are filled nicely, especially with images.', 'pages have lots of blank spaces.', 'Webmaster', 'Minimizing dead zones by filling them with images, testimonials, videos, trip advisor widgets, social media icons and text.', b'0'),
(64, 1, 23, 'What’s next” feature', 'is present on the site.', 'is missing on all pages which stops people from moving through the site easily. Moreover, users who are confused about their next action at the bottom of a page may simply opt to exit.', 'Webmaster', 'Add simple links at the bottom of each page showing users where to head next, or how to get back to the top of the page. For example, you may have a link at the bottom of the open water course page that points to the advanced open water course page.', b'0'),
(65, 1, 23, 'End of pages feature back to top', 'appears in every pages.', 'doesn’t appear anywhere on the site.', 'Webmaster', 'Add a “back to top” link at the bottom of pages to encourage users to access your site’s main navigation again. This, coupled with the “what’s next” feature is a great way to keep users on the website.', b'0'),
(66, 1, 24, 'Book online / Sign up forms', 'present in the contact menu and it’s linked to each internal product pages', 'not present anywhere on the site.', 'Webmaster', 'You can allow users to inquire about specific programs and offers through specialized sign up forms that you include on the product pages. Consider adding a sign up form for a newsletter as well. Place the sign up forms on your product pages making it easy for them.', b'0'),
(67, 1, 24, 'Contact Page', 'is clear and simple to use.', 'We would suggest you expand the contact pages to include your Name, Address and telephone number, social icons and even a Google map. The current page is very empty.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer.', b'0'),
(68, 1, 24, 'Contact Page uses forms', 'which allow customers to provide useful data.', 'We would suggest you expand the contact page to include a contact form so that people can add information and make it easy to send to you.', 'Webmaster', 'You must expand on your contact page for the site as soon as possible so that people can get in touch more easily. The more information you can collect from the customer helps you to provide a better service for that customer. Consider adding a Google map to your contact page so people know how to find you.', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id_result` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `section_slug` varchar(50) NOT NULL,
  `section_desc` varchar(200) NOT NULL,
  `section_why` text NOT NULL,
  `section_importance` int(11) NOT NULL,
  `section_difficulty` int(11) NOT NULL,
  `section_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `section_name`, `section_slug`, `section_desc`, `section_why`, `section_importance`, `section_difficulty`, `section_cat`) VALUES
(2, 'User Experience', 'user-experience', 'The user experience is the general impression a user has when interacting with your website.', 'In 2016, Internet users only have prolonged interactions with websites that are easy to use.', 8, 5, 'site structure'),
(3, 'Navigation', 'navigation', 'The method(s) of accessing content contained in the website.', 'A clear, intuitive navigation system increases ease of access and reduces user frustration, leading to higher retention and conversion.', 6, 6, 'site structure'),
(4, 'Search Engine Accessibility', 'search-engine-accessibility', 'How easy is it for the search engines to find your online content, index it and display it to potential consumers?', 'Search engines will be the primary source of online traffic to your website, far larger than any other source of traffic.', 9, 1, 'seo'),
(5, 'Internal Link Structure', 'internal-link-structure', 'Describes how the website is seen by Google, kind of like a family tree.', 'Google naturally places an emphasis on the pages that your site implicitly tells it are most important. Your link structure is a big signal in this hierarchy of content.', 6, 5, 'seo'),
(6, 'Page Speed', 'page-speed', 'A relative assessment of how quickly your website loads.', 'Having a quick website is not only great for user satisfaction; it is also now a ranking factor used to determine your position in the search results.', 5, 5, 'seo'),
(7, 'Meta Tags & Headings', 'meta-tag-and-heading', 'Meta tags are pieces of code that tell the search engine (and users) information about your web pages.', 'These tags (particularly the “Title” and “h1” tags) are generally accepted as being the biggest factors in determining what Google thinks a certain page is about.', 8, 3, 'seo'),
(8, 'Images', 'image', 'The images on your site not only affect the appearance of the site, but also its speed and search relevance', 'Images need to be size-optimized and have appropriate alt-tags to indicate the content of the image and how it is related to the page. Alt-tags can give the search engines even more information about a page, helping it rank better in results pages.', 4, 5, 'seo'),
(9, 'Text', 'text', 'The words on your website are the easiest way for a search engine to understand what you are talking about.', 'Textual content is still the top factor in rankings. Having unique, fresh text on your website is an absolute requirement to achieving top search rankings.', 8, 6, 'seo'),
(10, 'Link Profile', 'link-profile', 'Your link profile is an overview of the number and quality of other websites that are linking to you', 'Sites with large numbers of quality websites linking to them rank higher.', 10, 7, 'seo'),
(11, 'Hosting & Registration', 'hosting-and-registration', 'The host is the physical machine that holds the data for your website and “serves” it to users', 'Having a good host with a good reputation sends good quality signals about your business. Similarly, having a host located in your country helps for local search results.', 4, 1, 'seo'),
(12, 'Search Rankings', 'search-ranking', 'A search for your website or brand should help your customers find you easily.', 'This is how people find your products which then leads to conversions.', 10, 8, 'ranking'),
(13, 'Homepage Content', 'homepage-content', 'A quick look at the content of the main page on your website', 'Users should quickly and easily understand your business and its main product offerings. This content also tells the search engines a lot about your focus.', 8, 1, 'content management'),
(14, 'Internal Page Content', 'internal-page-content', 'A look at the structure of product / service pages', 'The content on these pages helps determine how successfully you will rank for relevant searches, but should also be easy to consume for the human user.', 9, 2, 'content management'),
(15, 'Blog / News Section', 'blog-news-section', 'An assessment of “recency” on your website.', 'A blog/news section is a great way to keep new content coming to the website. It engages human users and also sends strong “freshness” signals to the search engines.', 5, 5, 'content management'),
(16, 'Special Offers', 'special-offer', 'Websites with occasional special offers tell users that the business is active and that content is being updated regularly', 'Content freshness is a strong quality indicator for search engines. Having current special offers enables search engines to see that you are constantly updating the site.', 3, 2, 'content management'),
(17, 'Content Management', 'content-management', 'A Content Management System is a system to publish and administer the content of a website.', 'Ease of updating and search engine friendliness. Modern CMS systems enable non-technical staff to play a bigger role in the updating and management of websites.', 7, 5, 'content management'),
(18, 'Indexed Pages', 'indexed-page', 'This is the total number of files found in Google’s index for your website.', 'Strong websites nearly always feature more than just a handful of pages. On the other hand, an inappropriately high number may indicate problems with the structure of the website.', 8, 2, 'content management'),
(19, 'Homepage', 'homepage', 'This checks how integrated your home/main pages are with your social media efforts.', 'Sends verifiable signals to both human users and search engines that your company is active in engaging its audience. This affects your rankings.', 7, 4, 'social integration'),
(20, 'Products Pages & Blog Pages', 'product-and-blog', 'An assessment of your site’s integration of social media shares.', 'It is good to encourage social sharing by featuring “share this” and/or “pin it” type functionality on your product, news, special offer and blog pages.', 7, 4, 'social integration'),
(21, 'Quality Signals', 'quality-signal', 'Signals regarding the legitimacy, accountability and capability of your company.', 'Anyone can put up a website, so it is important to let users (and search engines) know that there is a strong organization behind the site.', 9, 4, 'quality/retention/convertion'),
(22, 'Strong Company / ', 'strong-company-about-us-quality', 'Website users want to identify with brands and the individuals behind them', 'Sends users a good quality signal that there are real people driving the business and to offer customer support. Search engines can now recognize this and many count it in their ranking algorithms.', 5, 4, 'quality/retention/convertion'),
(23, 'Retention', 'retention', 'Retention deals with your site’s ability to keep users engaged and consuming more content.', 'Users who stay on a website longer are more likely to participate in a conversion-oriented behavior (like subscribing to a newsletter, inquiring via contact form, or submitting a booking!)', 8, 3, 'quality/retention/convertion'),
(24, 'Conversion', 'conversion', 'Conversion relates to the actions that lead to inquiries, customer interaction, and bookings.', 'Meeting these goals leads to increased revenue.', 10, 2, 'quality/retention/convertion');

-- --------------------------------------------------------

--
-- Table structure for table `section_result`
--

CREATE TABLE `section_result` (
  `id_section_result` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_assessment` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id_source` int(11) NOT NULL,
  `source_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id_source`, `source_name`) VALUES
(1, 'manual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id_assessment`),
  ADD KEY `id_domain` (`id_domain`);

--
-- Indexes for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  ADD PRIMARY KEY (`id_assessment_detail`),
  ADD KEY `id_assessment` (`id_assessment`),
  ADD KEY `id_point` (`id_point`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id_domain`);

--
-- Indexes for table `point_check`
--
ALTER TABLE `point_check`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `id_source` (`id_source`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `section_result`
--
ALTER TABLE `section_result`
  ADD PRIMARY KEY (`id_section_result`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id_source`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id_assessment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `assessment_detail`
--
ALTER TABLE `assessment_detail`
  MODIFY `id_assessment_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1524;
--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `point_check`
--
ALTER TABLE `point_check`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1647;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `section_result`
--
ALTER TABLE `section_result`
  MODIFY `id_section_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id_source` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
