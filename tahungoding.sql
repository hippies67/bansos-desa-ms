-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 04:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tahungoding`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `slug`, `thumbnail`, `konten`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'GitHub Moves to Guard Open Source Against Supply Chain Attacks', 'github-moves-to-guard-open-source-against-supply-chain-attacks', '1663396413_Github-Moves-to-Guard-Open-Source-Against-Supply-Chain-Attacks-Security-GettyImages-967228260.jpg', '<p><strong>FOLLOWING THE 2020</strong> <a href=\"https://www.wired.com/story/russia-solarwinds-hack-targets-fallout/\">SolarWinds cyberespionage campaign</a>, in which Russian hackers slipped tainted updates into a widely used IT management platform, a series of further software <a href=\"https://www.wired.com/story/hacker-lexicon-what-is-a-supply-chain-attack/\">supply chain attacks</a> continues to highlight the urgent need to lock down software chains of custody. And the issue is <a href=\"https://www.wired.com/story/open-source-sabotage-protestware/\">particularly pressing</a> in open source, where projects are inherently decentralized and often ad hoc endeavors. After a <a href=\"https://www.mend.io/resources/blog/npm-package-javascript-library-compromised-via-account-takeover/\">series</a> of <a href=\"https://github.blog/2022-04-15-security-alert-stolen-oauth-user-tokens/\">worrying</a> <a href=\"https://github.blog/2022-05-26-npm-security-update-oauth-tokens/\">compromises</a> to widely downloaded JavaScript software packages from the prominent “npm” registry, which is owned by GitHub, the company laid out a plan this week to offer expanded defenses for open source security.</p><p>GitHub, which itself is owned by Microsoft, <a href=\"https://github.blog/2022-08-08-new-request-for-comments-on-improving-npm-security-with-sigstore-is-now-open/\">announced</a> on Monday that it plans to support code signing, a sort of digital wax seal, for npm software packages using the <a href=\"https://www.wired.com/story/sigstore-open-source-supply-chain-code-signing/\">code-signing platform Sigstore</a>. The tool grew out of cross-industry collaboration to make it much easier for open source maintainers to verify that the code they create is the same code that ends up in the software packages actually being downloaded by people worldwide.</p><p>“While most npm packages are open source, there’s currently no guarantee that a package on npm is built from the same source code that’s published,” says Justin Hutchings, GitHub\'s director of product management. “Supply chain attacks are on the rise, and adding signed build information to open source packages that validates where the software came from and how it was built is a great way to reduce the attack surface.”</p><p>In other words, it\'s all about creating a cryptographically verified and transparent game of telephone.&nbsp;</p><p>Dan Lorenc, CEO of Chainguard, which co-develops Sigstore, emphasizes that while GitHub isn\'t the only component of the open source ecosystem, it\'s an absolutely crucial town square for the community because it\'s where the vast majority of projects store and publish their source code. When developers actually want to download open source applications or tools, though, they typically go to a package manager&nbsp;</p><p>&nbsp;</p><p>“You don’t install source code directly, you usually install some compiled form of it, so something has happened in between the source code and the creation of the package. And up until now, that whole step has just been a black box in open source,” Lorenc explains. “You see the code and then go and download the package, but there’s nothing that proves that the package came from that code or the same person was involved, so that’s what GitHub is fixing.\"</p><p>&nbsp;</p><p>By offering Sigstore to package managers, there\'s much more transparency at every stage of the software\'s journey, and the Sigstore tools help developers manage cryptographic checks and requirements as software moves through the supply chain. Lorenc says that many people are shocked to hear that these integrity checks aren\'t already in place and that so much of the open source ecosystem has been relying on blind trust for so long. In May 2021, the Biden White House <a href=\"https://www.whitehouse.gov/briefing-room/presidential-actions/2021/05/12/executive-order-on-improving-the-nations-cybersecurity/\">issued an executive order</a> that specifically addressed software supply chain security.&nbsp;</p>', 'published', 1, '2022-09-11 17:34:44', '2022-09-17 02:24:07'),
(2, 'It’s Like GPT-3 but for Code—Fun, Fast, and Full of Flaws', 'its-like-gpt-3-but-for-code-fun-fast-and-full-of-flaws', '1663396536_AI-Coder-SA_3D-WIRED-CODE-OPENER-Backchannel.jpg', '<p>As a devotee of the <a href=\"https://www.wired.com/story/open-source-coders-few-tired/\">open source software movement</a>, he has written immensely popular web apps, peer-to-peer file exchanges, and more than 100 other pieces of code that he has given away, all in the 10 years since he graduated from college. Lately, though, Aboukhadijeh has entered a new kind of flow state, helped along by a tool called Copilot. It’s a piece of <a href=\"https://www.wired.com/tag/artificial-intelligence\">artificially intelligent software</a> that does some of the typing, and the thinking, for him.</p><p><img src=\"https://media.wired.com/photos/62421058022170b3101f082e/master/w_1600%2Cc_limit/WIRED_3004_cover.jpg\" alt=\"WIRED 30.04   How one man came to rule politics on Facebook\" srcset=\"https://media.wired.com/photos/62421058022170b3101f082e/master/w_120,c_limit/WIRED_3004_cover.jpg 120w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_240,c_limit/WIRED_3004_cover.jpg 240w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_320,c_limit/WIRED_3004_cover.jpg 320w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_640,c_limit/WIRED_3004_cover.jpg 640w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_960,c_limit/WIRED_3004_cover.jpg 960w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_1280,c_limit/WIRED_3004_cover.jpg 1280w, https://media.wired.com/photos/62421058022170b3101f082e/master/w_1600,c_limit/WIRED_3004_cover.jpg 1600w\" sizes=\"100vw\"></p><p>This article appears in the April 2022 issue. <a href=\"https://subscribe.wired.com/subscribe/splits/wired/WIR_Edit_Hardcoded?source=HCL_WIR_COVER_INSET_0\">Subscribe to WIRED</a>.ILLUSTRATION: JULES JULIEN</p><p>Built by <a href=\"https://www.wired.com/tag/openai\">OpenAI</a>, the private research lab, and <a href=\"https://www.wired.com/tag/github\">GitHub</a>, the Microsoft-­owned website where programmers share code, the tool is essentially autocomplete for software development. Much as Gmail tries to finish a sentence as you write it, Copilot offers to complete a chunk of your program. The tool was released last summer to a select group of coders.</p><p>Aboukhadijeh quickly discovered that Copilot was good, almost unsettlingly so. He would begin typing a line of code, and within a few seconds the AI would figure out where he was headed—then, boom, the next four or five full lines would show up as light gray text, which he could accept by hitting Tab. When he saw it produce clean code that did exactly what he was intending, he found it a bit uncanny. “How is it getting these predictions?” he recalls wondering. “Some of them are really eerie.”</p><p>For weeks, Aboukhadijeh kept Copilot turned on while he worked. He discovered that it had other impressive tricks; it could even understand commands he wrote in basic English. If he simply typed into his code editor “Write a function that capitalizes every word in a document,” Copilot would assemble that code all by itself.&nbsp;He’d check to make sure it didn’t have errors; sometimes it did.</p><p>What’s more, the tool was <i>improving</i> his code. At one point, for example, Aboukhadijeh needed his software to recognize several different formats of text documents, so he ponderously listed all the formats, one by one, in his code. Copilot instead recommended a single, pithy command that elegantly swept them all together.</p><p>&nbsp;</p><p>“I was like, how did it even … ?” he says, trailing off in stupefaction. He doesn’t think he’ll ever turn Copilot off.</p><p>Nor is he alone: Nine months after Copilot’s launch, tens of thousands of programmers have tried out the software. I spoke to 15 coders who’ve used it, and most, like Aboukhadijeh, found that it dramatically accelerates their pace—even as they were sometimes freaked out by how good it is. (“Just mind-blowing,” as Mike Krieger, who coded the original Insta­gram, put it.) Granted, they also noticed it making errors, ranging from boneheaded to distressingly subtle. GitHub and OpenAI have been tracking Copilot’s performance through anonymized data on how many suggested lines coders accept and how much they then store on GitHub. They’ve found that the AI writes a remarkable 35 percent of its users’ newly posted code.</p><p>Silicon Valley was abuzz with predictions that someone would suddenly unveil an AI that could outthink humans.</p><p>Ever since computers came to be, people have hunted for ways to make them easier to program. The very first American programmers, the women who created instructions for the ENIAC machine in 1945, had an almost laughably difficult job: They had to build logic <i>with wires</i>. In the ’50s, tapes and punch cards made the work slightly easier. Then came programming languages with English-like syntax, some of which—such as Basic or Cobol—were explicitly designed to encourage neophytes. By the ’90s, languages such as Python automated some of the most gnarly, frustrating parts of coding, like memory management. In the 2000s, the open source movement created a generation of programmers who rarely write things from scratch.</p>', 'published', 1, '2022-09-16 23:35:36', '2022-09-17 02:24:21'),
(3, 'AI Can Write Code Like Humans—Bugs and All', 'ai-can-write-code-like-humans-bugs-and-all', '1663396711_copilot-bugs.jpg', '<p><strong>SOME SOFTWARE DEVELOPERS</strong> are now letting <a href=\"https://www.wired.com/tag/artificial-intelligence/\">artificial intelligence</a> help write their code. They’re finding that AI is just as flawed as humans.</p><p>Last June, <a href=\"https://www.wired.com/tag/github/\">GitHub</a>, a subsidiary of <a href=\"https://www.wired.com/tag/microsoft/\">Microsoft</a> that provides tools for hosting and collaborating on code, <a href=\"https://github.blog/2021-06-29-introducing-github-copilot-ai-pair-programmer/\">released</a> a beta version of a program that uses AI to assist programmers. Start typing a command, a database query, or a request to an API, and the program, called <a href=\"https://copilot.github.com/\">Copilot</a>, will guess your intent and write the rest.</p><p><a href=\"https://twitter.com/gottapatchemall?lang=en\">Alex Naka</a>, a data scientist at a biotech firm who signed up to test Copilot, says the program can be very helpful, and it has changed the way he works. “It lets me spend less time jumping to the browser to look up API docs or examples on Stack Overflow,” he says. “It does feel a little like my work has shifted from being a generator of code to being a discriminator of it.”</p><p>But Naka has found that errors can creep into his code in different ways. “There have been times where I\'ve missed some kind of subtle error when I accept one of its proposals,” he says. “And it can be really hard to track this down, perhaps because it seems like it makes errors that have a different flavor than the kind I would make.”</p><p>The risks of AI generating faulty code may be surprisingly high. Researchers at NYU recently <a href=\"https://arxiv.org/pdf/2108.09293.pdf\">analyzed code generated by Copilot</a> and found that, for certain tasks where security is crucial, the code contains security flaws around 40 percent of the time.</p><p>The figure “is a little bit higher than I would have expected,” says <a href=\"https://moyix.net/\">Brendan Dolan-Gavitt</a>, a professor at NYU involved with the analysis. “But the way Copilot was trained wasn’t actually to write good code—it was just to produce the kind of text that would follow a given prompt.”</p><p>&nbsp;</p><p>Despite such flaws, Copilot and similar AI-powered tools may herald a sea change in the way software developers write code. There’s growing interest in using AI to help automate more mundane work. But Copilot also highlights some of the pitfalls of today’s AI techniques.</p>', 'published', 1, '2022-09-16 23:38:31', '2022-09-17 02:24:32'),
(4, 'You\'re Probably Not Using the Web\'s Best Browser', 'youre-probably-not-using-the-webs-best-browser', '1663396861_Gear-Vivaldi-Review-top.jpg', '<p><strong>REMEMBER WHEN WEB</strong> browsers were useful tools? Remember when you could follow sites you liked, check your email, and see your calendar, all without leaving the browser? Or, I should say, remember when you could do all that <i>without</i> Big Tech feeding your personal data into the yawning maw of surveillance capitalism?&nbsp;</p><p>I remember those days because I am still living in them, thanks to a web browser you might not have heard of: <a href=\"https://vivaldi.com/\">Vivaldi</a>.&nbsp;</p><p>This week, the team behind the Vivaldi web browser <a href=\"https://vivaldi.com/blog/vivaldi-4-0/\">released version 4.0</a>, which seems like an appropriate time for me to tell you that you need to try it out. <a href=\"https://cna.st/affiliate-link/WHvUKwsUQ5mLUgg9Dx5exJcYhUjX5QkSepptvNSYDncLedDnRuyit7gx8Db44iTjEYQKXys8gEQSxEjhpoHhWditKbvM9jk3UJaQDUxXCoA5P42MKhAJ4gJzuMpryhgAiEYWJ6pbcKwSeUweiqeVxc?cid=60c21c7515905be3a3bdcd46&amp;xid=fr1663396846914ccb\">To riff off Neil Stephenson</a>, Vivaldi outshines all other web browsers \"in approximately the same way that the noonday sun does the stars ... it is not just bigger and brighter; it simply makes everything else vanish.\"</p><p><strong>Customization Is Key</strong></p><p>Stephenson was actually <a href=\"https://www.emacswiki.org/emacs/NealStephenson\">talking about the text editor Emacs</a>, whose never-ending recursiveness makes it the programmer\'s <a href=\"https://www.wired.com/2015/06/github-atoms-code-editor-nerds-take-universe/\">Holy Grail of text editors</a>. But I think the metaphor applies just as well to Vivaldi, compared to other web browsers. I don\'t think it\'s a stretch to say that Vivaldi <i>is</i> the Emacs of web browsers.</p><p>Vivaldi CEO Jon von Tetzchner was also the cofounder of <a href=\"https://www.opera.com/\">Opera</a>, one of the earliest web browsers to have features like pop-up blocking and tabbed browsing. The level of customization and power-user features that set Opera apart are present today in Vivaldi as well, along with plenty more.</p><p>At first glance, Vivaldi looks like a slightly more colorful version of your average web browser—mirroring the colors of the webpage is a notable Vivaldi feature that Apple shamelessly copied in Safari. It\'s not until you dig into Vivaldi\'s settings that you discover its true power: The ability to tailor your browsing experience exactly the way you want it.</p><p>&nbsp;</p><p>Like Emacs, everyone\'s Vivaldi setup and experience may be different, and that\'s the point. Vivaldi\'s tag line is “A web browser for our friends.” By “our friends,” Vivaldi means <i>people like you and me</i>—assuming, of course, that you\'re someone who is on the web to do work and stay in touch with your friends, rather than consume the whims and algorithms of Big Tech.</p><p>For example, I like keyboard shortcuts and have never used a mouse gesture in my life. Vivaldi supports both. I take advantage of the customizable keyboard shortcuts and ignore the mouse gestures, and everyone wins. Vivaldi 4.0 acknowledges this with a new dialog offering some feature presets: Essentials, Classic, or my favorite, Fully Loaded.</p>', 'published', 1, '2022-09-16 23:41:01', '2022-09-17 02:24:42'),
(5, 'AI Could Soon Write Code Based on Ordinary Language', 'ai-could-soon-write-code-based-on-ordinary-language', '1663397057_business_microsoft-build.jpg', '<p><strong>IN RECENT YEARS,</strong> researchers have used <a href=\"https://www.wired.com/tag/artificial-intelligence/\">artificial intelligence</a> to <a href=\"https://arxiv.org/abs/2006.03511\">improve translation</a> between programming languages or automatically <a href=\"https://arxiv.org/abs/2005.10636\">fix problems</a>. The AI system DrRepair, for example, has been shown to solve most issues that spawn error messages. But some researchers dream of the day when AI can write programs based on simple descriptions from non-experts.</p><p>On Tuesday, <a href=\"https://www.wired.com/tag/microsoft/\">Microsoft</a> and <a href=\"https://www.wired.com/tag/openai/\">OpenAI</a> shared plans to bring GPT-3, one of the world’s most advanced models for generating text, to programming based on natural language descriptions. This is the first commercial application of GPT-3 undertaken since Microsoft invested $1 billion in OpenAI last year and gained exclusive licensing rights to GPT-3.</p><p>“If you can describe what you want to do in natural language, GPT-3 will generate a list of the most relevant formulas for you to choose from,” said Microsoft CEO Satya Nadella in a keynote address at the company’s Build developer conference. “The code writes itself.”</p><p><strong>PLAY/PAUSE BUTTON</strong></p><p>&nbsp;</p><p>COURTESY OF MICROSOFT</p><p>Microsoft VP Charles Lamanna told WIRED the sophistication offered by GPT-3 can help people tackle complex challenges and empower people with little coding experience. GPT-3 will translate natural language into PowerFx, a fairly simple programming language similar to Excel commands that Microsoft introduced in March.</p><p>This is the latest demonstration of applying AI to coding. Last year at Microsoft’s Build, OpenAI CEO Sam Altman <a href=\"https://www.pscp.tv/Microsoft/1yNxaQNZRVvxj\">demoed</a> a language model fine-tuned with code from GitHub that automatically generates lines of Python code. As WIRED detailed last month, startups like SourceAI are also using <a href=\"https://www.wired.com/story/ai-latest-trick-writing-computer-code/\">GPT-3 to generate code</a>. IBM last month showed how its Project CodeNet, with 14 million code samples from more than 50 programming languages, could reduce the time needed to update a program with millions of lines of Java code for an automotive company from one year to one month.</p><p>Microsoft\'s new feature is based on a <a href=\"https://www.wired.com/tag/neural-networks/\">neural network</a> architecture known as Transformer, used by big tech companies including <a href=\"https://www.wired.com/tag/baidu/\">Baidu</a>, <a href=\"https://www.wired.com/tag/google/\">Google</a>, Microsoft, <a href=\"https://www.wired.com/tag/nvidia/\">Nvidia</a>, and Salesforce to create large language models using text training data scraped from the web. These language models continually grow larger. The largest version of Google’s BERT, a language model released in 2018, had 340 million parameters, a building block of neural networks. GPT-3, which was released one year ago, has 175 billion parameters.</p>', 'published', 1, '2022-09-16 23:44:17', '2022-09-17 02:24:51'),
(6, 'The New Startup: No Code, No Problem', 'the-new-startup-no-code-no-problem', '1663397274_copilot-bugs.jpg', '<p><strong>DANI BELL WAS</strong> a British copywriter who hankered for her own marketing <a href=\"https://www.wired.com/tag/startups/\">startup</a>. Like many founders today, though, she faced a roadblock. She couldn\'t <a href=\"https://www.wired.com/tag/coding/\">code</a>.</p><p>Normally, an entrepreneur in that situation would need to spend money, and maybe even raise it, to hire developers. But Bell did something different: She bolted together software from <a href=\"https://www.wired.com/story/how-use-airtable-trello-other-apps-fix-your-life/\">various online services</a>.</p><p>Bell used a point-and-click tool called Webflow to build her site and a client-management tool to let customers order services. Airtable, an online spreadsheet, let her store details about each job. And she glued many of these pieces together by cleverly using Zapier, a service that uses if-then logic to let one online app trigger another. (Whenever Bell creates a new task for one of her contractors, for example, Zapier automatically generates a Google doc for it, then pings her on <a href=\"https://www.wired.com/tag/slack/\">Slack</a> when the work is done.) Nineteen months later, her company—Scribly.io—had around 23 clients and was doing $25,000 a month in recurring business.</p><p>&nbsp;</p><p>the rallying cry “Learn to code” emerged. The key to tech-fueled entrepreneurship—and its promise of independence and possible riches—was in learning to sling <a href=\"https://www.wired.com/tag/javascript/\">JavaScript</a> or <a href=\"https://www.wired.com/tag/python/\">Python</a>. <a href=\"https://www.wired.com/2016/01/in-2016-the-coding-bootcamp-bubble-is-bound-to-burst/\">Boot camps</a> bloomed.</p><p>&nbsp;</p><p>Nuts to that, say the proponents of no-code. “Coding sucks,” laughs Emmanuel Straschnov, cofounder of Bubble, a service that offers a suite of tools for nontechies to build apps. “I mean, I code. But it\'s tedious. I feel like it\'s not reasonable to expect, you know, the vast majority of the population to be careful with their commas.” Indeed, one measure of social progress is how well we automate complex skills for normies, he argues. We became competent photographers not by honing our skills at hand-developing film but by using iPhones with filters.</p><p>The emergence of no-code is, in a sense, the ur-pattern of software. We\'ve been drifting this way for years. Websites at first were laboriously hand-coded, until blogging CMSs automated it—and blogging exploded. Putting video online was a gnarly affair until YouTube rendered it frictionless—and vlogging exploded. As no-code advances, “the amount of products is just going to skyrocket,” argues Nate Washington, an Atlanta entrepreneur who used the Bubble tool to help create the first version of Qoins, an app that helps people pay off debt by automatically rounding up on purchases and sending the money to creditors. Four years later, Qoins has helped users pay off $11 million in debt.</p>', 'published', 1, '2022-09-16 23:47:54', '2022-09-17 02:24:59'),
(7, 'The JavaScript Framework That Puts Web Pages on a Diet', 'the-javascript-framework-that-puts-web-pages-on-a-diet', '1663397396_svelte-javascript-508482075.jpg', '<p>The average web page is about 2 megabytes, according to <a href=\"https://www.httparchive.org/reports/state-of-the-web?start=latest\">HTTP Archive</a>, a site that tracks the performance of websites and the technologies they use. Sure you can download 2 megabytes in less than a second on a good 4G mobile connection. But today’s web pages are problematic for people on slow connections or with small bandwidth caps. Not all that long ago, a <a href=\"https://www.wired.com/2016/04/average-webpage-now-size-original-doom/\">complex game</a> or software program fit on a 1.4-megabyte floppy disk.</p><p>There are many reasons today’s web is so bloated, including the ads and tracking scripts that saddle so many pages. Another reason is that websites do much more than just display text and images. Many sites now look and feel like full-blown desktop applications.</p><p>To build these interactive sites, many web developers turn to open source packages that handle common tasks. These tools liberate programmers from a lot of grunt work, but they can add heft to a project. Facebook\'s popular open source React library for building user interfaces, for example, weighs in at 100 kilobytes. Throw in some other tools and graphics, and soon you’re talking many megabytes.</p><p>The up and coming JavaScript framework <a href=\"https://svelte.dev/\">Svelte</a>, created by visual journalist and software developer Rich Harris, aims to make it easier to write faster, smaller interactive websites and applications. Web developer Shawn Wang says he cut the size of his <a href=\"https://www.swyx.io/\">personal website</a> from 187 kilobytes to 9 kilobytes by switching from React to Svelte.</p><p>\"It was a big \'wow\' moment,\" Wang says. “I wasn\'t even trying to optimize for size and it just dropped.”</p><p>Harris, a graphics editor for <i>The New York Times</i>, created and released the first version of Svelte in 2016 while working for <i>The Guardian</i>. Many of his projects involved interactive graphics and animations, but he worried that the graphics could take too long to load or would chew through users’ data limits.</p><p>Frameworks add heft to websites because they traditionally serve as a middle layer between an app\'s code and the user\'s browser. That means developers need to bundle the entire framework, in addition to their own code, with an app, even if they don\'t use all of the framework\'s features. Wang compares this to a rocket ship that needs massive fuel tanks to launch into space.</p><p>Harris took a different approach. Svelte performs its middle-layer work before a developer uploads code to a web server, well before a user ever downloads it. This makes it possible to remove unnecessary features, shrinking the resulting app. It also reduces the number of moving parts when a user runs the app, which can make Svelte apps faster and more efficient. “Svelte is like a space elevator,” Wang says. The framework was tricky to create, but advocates say it makes it easier for developers to build efficient apps.</p>', 'published', 1, '2022-09-16 23:49:56', '2022-09-17 02:25:08'),
(8, 'Python Is More Popular Than Ever', 'python-is-more-popular-than-ever', '1663397521_python-popularity.jpg', '<p><strong>PYTHON IS ONE</strong> of the world’s most popular programming languages. In fact, it’s more so than ever. Python climbed from third place to tie for second in the <a href=\"https://redmonk.com/sogrady/2020/02/28/language-rankings-1-20/\">latest ranking of programming language popularity</a> published by the analyst firm RedMonk. It’s the first time that a language other than JavaScript, which remains number one in the firm’s ratings, or Java, the other runner-up, has entered the top two since RedMonk started compiling its rankings in 2012.</p><p>That milestone is all the more significant given a <a href=\"https://www.wired.com/story/think-app-updates-suck-try-upgrading-programming-language/\">sometimes rocky transition</a> from the second version of Python, which the language\'s developers stopped supporting this year, to the third version.</p><p>RedMonk usually doesn\'t make much of small rankings changes, cofounder Stephen O\'Grady writes in the report, but it\'s rare to see any sort of movement in the top tier of programming languages, which consists of well-established languages. JavaScript is the primary way developers run code inside web browsers and is also increasingly used for other purposes, ranging from mobile and desktop app development to programming drones. Java, meanwhile, is the standard language for writing Android apps and is a corporate software development mainstay.</p><p>Python\'s continued success wasn\'t a given. The long transition from Python 2 to Python 3 in particular could have shunted developers elsewhere. Python 3 was first released in 2008, and the team initially planned to stop supporting Python 2 in 2015, meaning there would be no further bug fixes and security updates from the official project. But they extended that deadline to 2020 when it became clear that many developers would need more time to update their code to the newer version.</p><p>During that time, developers could have opted to switch to a newer programming language, like Mozilla\'s Rust, Google\'s <a href=\"https://www.wired.com/2013/07/gopher/\">Go</a>, or JetBrains\' <a href=\"https://www.wired.com/story/kotlin-the-upstart-coding-language-conquering-silicon-valley/\">Kotlin</a>. Meanwhile, newer programmers could have opted to learn the more widely used JavaScript, or been turned off by confusion over what tutorials, code samples, and open source code libraries would work with each version of Python. But if Python lost any developers due to the transition, it appears to have more than made up for them in new converts.</p><p>&nbsp;</p><p>O\'Grady cites Python\'s versatility as one reason for its ongoing popularity. Companies like Google, Dropbox, and Instagram all rely heavily on Python, as do countless smaller ventures. It also has a home in academia as the preferred data-crunching language of many scientists and mathematicians.</p><p>RedMonk ranks programming languages based on two criteria: the number of questions asked about each language on the question-and-answer site StackOverflow, and the number of projects based on each language hosted on the Microsoft-owned service GitHub. The idea is to spot trends in the software development profession.</p><p>RedMonk\'s assessment, at least as it relates to Python, is consistent with other measures. According to a <a href=\"https://insights.stackoverflow.com/survey/2019\">survey by StackOverflow</a>, Python is the third most widely used programming language, not counting HTML, behind only JavaScript and the database query language SQL. The survey found Python was the respondents\' second-favorite language, after Rust. Meanwhile, the <a href=\"https://www.tiobe.com/tiobe-index/\">Tiobe index</a>, which measures the number of search engine results for particular languages, shows Python has grown in popularity in recent years and now ranks third in the index, after Java and C.</p><p>There was little movement in the top 20 languages in RedMonk\'s latest report. But O\'Grady did flag one rising star further down in the ranks: Dart, a language developed by Google, jumped nine places, from 33rd to 24th in the past 18 months.</p><p>Dart is a language for writing software that runs inside web browsers. Dart code is translated into JavaScript, which is supported by practically all modern browsers. O\'Grady writes that its surge in popularity is probably due to its use in Google\'s open source programming framework Flutter, which was released in December, 2018.</p>', 'published', 1, '2022-09-16 23:52:01', '2022-09-17 02:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ikbal Malik Ramadhan', 'Lets Collaborate Mate', 'ikbal.malik26@gmail.com', 'Hai Im Ikbal From NOIU we looking for opportunities to collaborate with you guys in making some website.', '2022-09-17 01:55:33', '2022-09-17 01:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_09_080802_create_artikel_table', 1),
(6, '2022_09_11_142917_create_web_profile_table', 2),
(7, '2022_09_12_004442_create_projects_table', 3),
(8, '2022_09_12_004503_create_team_table', 3),
(9, '2022_09_17_083219_create_contact_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(3, 'Tahungoding Membership', 'Tahungoding Membership is an application for the management of the Tahungoding member organization to make it easier for both administrators and members to monitor activities that have been or are being carried out.', 'public/input/projects/w3vZrS5XJrtKotZvcHADQjS25QxH3dLx6ss2v4Aq.jpg', 'lebaran.sumedangkab.go.id', '2022-09-15 02:52:51', '2022-09-16 18:48:00'),
(4, 'Pemilu Raya Sema STMIK 2021', 'Pemilu Raya Sema STMIK 2021 is a website for STMIK Sumedang which was created to fulfill the general election of the Student Senate.', 'public/input/projects/4XXXth0T5v70tVQFMpE7mW1Hz6hwPVwWHhzLy6Hn.jpg', 'https://pemiluraya.tahungoding.my.id/', '2022-09-16 18:50:19', '2022-09-16 18:50:19'),
(5, 'Rumah Creativepreneur Indonesia', 'Rumah Creativepreneur Indonesia is a web company profile created to provide information about the company, Rumah Creativepreneur Indonesia also has a focus on empowering MSMEs and youth with the principle of \"Building Indonesia through the creative economy\".', 'public/input/projects/eSvnrusFP55P9rx4K9mWy6LqtmlvwRqKySaiu6q0.jpg', 'rumahcreativepreneur.or.id', '2022-09-16 19:03:56', '2022-09-16 19:03:56'),
(6, 'Tracer Study', 'Tracer Study is an application for managing the alumni database of STMIK Sumedang.', 'public/input/projects/UuUWfhEkrfxevkV20SJfx9RbifKeOAxFAqV6TeT8.jpg', 'tracer.stmik-sumedang.ac.id', '2022-09-16 19:05:40', '2022-09-16 19:05:40'),
(7, 'Pusat karir STMIK Sumedang', 'Pusat karir STMIK Sumedang  is a service application that will help students or alumni in exploring, choose, and make appropriate career decisions.', 'public/input/projects/azp1yyZldcaUWQRcNh4e5ROzqO3FgrTHF4FI2oLB.jpg', 'cdc.stmik-sumedang.ac.id', '2022-09-16 19:07:41', '2022-09-16 19:07:41'),
(8, 'TahuAbsen', 'Tahuabsen is an attendance system using an RFID card that is made for the attendance of yeargoding members.', 'public/input/projects/vtV34nQLvpCFdltDcaFw7Os5vZgloo6PGaF10Fc5.jpg', NULL, '2022-09-16 19:10:04', '2022-09-16 19:10:04'),
(9, 'Tahudoorlock', 'Tahudoorlock is a smart lock using an RFID card that is made for the security of tahungoding headquarters.', 'public/input/projects/Xs0PPXryLkIx76A0PYIOGgXKB3xbCHuIeOrblhpt.jpg', NULL, '2022-09-16 19:13:01', '2022-09-16 19:13:01'),
(10, 'Inimahsumedang', 'Inimahsumedang is a news portal application created to provide daily information and news about Sumedang, in which we can read articles or news.', 'public/input/projects/nBA06VasXPxBFQBXoQX4dlP16wssBSIVCtOoadnq.jpg', 'inimahsumedang.com', '2022-09-16 19:14:46', '2022-09-16 19:14:46'),
(11, 'Jaya Dwara', 'Jayadwara Percussion is a traditional music and dance community from West Java - Indonesia. Initiated by two graduates of the arts college in Bandung, namely Wendi Kardiana S.Sn and Taufik Candiansyah S.Sn, both of them are committed to exploring other possibilities in the process of exploring the rich and flexible Sundanese musical idioms.', 'public/input/projects/0WuA92KKT9dUCXufEPPa9kQlhOY6NBFPGe7bXE4T.jpg', 'https://jayadwara.id/', '2022-09-16 19:16:13', '2022-09-16 19:16:13'),
(12, 'Pemilu Umum Raya Sebelas April', 'Pemilu Umum Raya Sebelas April was made to fulfill the election activities of BEM and BPM as a form of democracy at Sebelas April University.', 'public/input/projects/sVjp522wfVeFRzsc5FoeFxHeGNmppkd9TGzaGBnQ.jpg', 'http://pemira.unsap.ac.id/', '2022-09-16 19:17:33', '2022-09-16 19:17:33'),
(13, 'Sumedang Lebaran Real Time', 'Sumedang Lebaran Realtime was created to provide information on needs about Ramadan for travelers who will come or pass through Sumedang Regency.', 'public/input/projects/KzOI7K2BuZKIOn9GLRJP9GgAnbfqQMsPDk7edeKh.jpg', 'https://lebaran.sumedangkab.go.id/', '2022-09-16 19:19:57', '2022-09-16 19:19:57'),
(14, 'SIPANDU', 'SIPANDU or Sistem Informasi Data Kwarcab Terpadu is an application for an integrated Sumedang branch quarterly data management system, this system manages the data of students, coaches, trainers, civil servants and branch administrators. This system can perform data management, data presentation and information delivery.', 'public/input/projects/n0K96TNawFohGVB6qPj5CYtDnvKLyIhVIhcfiaVm.jpg', 'https://www.pramukasumedang.com/', '2022-09-16 19:24:20', '2022-09-16 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `fullname`, `photo`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Ikbal Malik Ramadhan', 'public/input/teams/9L1jal5hzGe6tRz3hizhBxrFcwmFL6thTvP9OFX8.jpg', 'Head OF Diklatbang', '2022-09-15 03:07:14', '2022-09-16 20:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `email`, `email_verified_at`, `password`, `alamat`, `photo`, `tgl_lahir`, `no_telp`, `jenis_kelamin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$qOK.VKEx9q4O3TOZZhRrd./F.ptvj6aVvOx/dvz0lAnQxy3ANSBMy', NULL, '', NULL, NULL, NULL, NULL, '2022-09-11 01:51:28', '2022-09-11 01:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

CREATE TABLE `web_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark_primary_color` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `light_primary_color` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updator` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_profile`
--

INSERT INTO `web_profile` (`id`, `logo`, `primary_color`, `dark_primary_color`, `light_primary_color`, `name`, `description`, `tagline`, `address`, `phone`, `email`, `facebook`, `instagram`, `youtube`, `twitter`, `whatsapp`, `updator`, `created_at`, `updated_at`) VALUES
(1, 'public/input/profile_web/tqTPTpj2sIz63P6Oc3XxkL8GWev1KV3nlchFFGdn.png', '#f4cf00', '#d6b600', '#fff9d8', 'Tahungoding', '<p>14214211</p>', '423432', 'LINK.ANGKREK RT/RW:001/014 ,Kel Situ,Belakang Kosan Tampomas', '4443234', 'ikbal.malik26@gmail.com', '12412441', '1412412', '412412', '4214214', '21421412', 1, '2022-09-11 07:49:39', '2022-09-11 17:29:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_profile`
--
ALTER TABLE `web_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web_profile_updator_foreign` (`updator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_profile`
--
ALTER TABLE `web_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `web_profile`
--
ALTER TABLE `web_profile`
  ADD CONSTRAINT `web_profile_updator_foreign` FOREIGN KEY (`updator`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
