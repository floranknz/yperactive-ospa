=== Better Youtube Embed Block ===
Contributors:      mr2p
Tags:              block, Gutenberg, youtube, embed, video
Requires PHP:      7.0.0
Requires at least: 5.8.0
Tested up to:      6.5
Stable tag:        1.0.4
License:           GPL-3.0
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

Embed YouTube videos without slowing down your site.

== Description ==

The default embed block for Youtube videos sucks. It slows down your site. The more videos on the page the more it slow. This single-block plugin fixes that.

Why this block is better than the default one:

* Instead of loading the entire iframe, only the video thumbnail is loaded, resulting in significant performance improvements
* Automatically load the video title as the caption
* The same UI as the default core/embed, and you can use the video title as the caption of the block with one click
* It can be transformed from/to the core embed block.

This plugin also provides a PHP API for developers to render a YouTube video URL as this block; or to automatically transform core/embed YouTube videos into this block.

The simplest example is:

        better_youtube_embed_block_render_block( ['url' => 'https://youtu.be/paSXmpHU9K4'] );

The example with all the parameters is:

        better_youtube_embed_block_render_block(
          [
            'url'               => 'https://youtu.be/paSXmpHU9K4',
            'aspectRatio'       => '16/9',
            'isMaxResThumbnail' => false,
            'caption'           => 'My awesome video',
            'echo'              => false,
          ]
        );

To automatically transform all core/embed YouTube videos on your site to this block, you need to put the following code into your wp-config.php or in your theme, plugin:

        define('BYEB_SPEED_UP_YOUTUBE_VIDEOS', true);

or

        add_filter( 'byeb_speed_up_youtube_videos', '__return_true' );


Please check out this [page](https://contentblocksbuilder.com/video-tutorials/?utm_source=wp.org&utm_campaign=readme&utm_medium=link&utm_content=BYEB) to see how fast it helps. The page contains around 30 embedded Youtube videos but they don't slow down the page.

If this plugin is useful for you, please do a quick review and [rate it](https://wordpress.org/support/plugin/better-youtube-embed-block/reviews/#new-post) on WordPress.org to help us spread the word. I would very much appreciate it.

Please check out my other plugins if you're interested:

* [Content Blocks Builder](https://wordpress.org/plugins/content-blocks-builder) - A tool to create blocks, patterns or variations easily for your site directly on the Block Editor.
* [Meta Field Block](https://wordpress.org/plugins/display-a-meta-field-as-block) - A block to display a meta field or an ACF field as a block. It can also be used in the Query Loop block.
* [Block Enhancements](https://wordpress.org/plugins/block-enhancements) - A plugin to add more useful features to blocks like icons, box-shadow, transform, hover style etc.
* [Icon Separator](https://wordpress.org/plugins/icon-separator) - A tiny block just like the core/separator block but with the ability to add an icon to it.
* [SVG Block](https://wordpress.org/plugins/svg-block) - A block to insert inline SVG images easily and safely. It also bundles with more than 3000 icons and some common non-rectangular dividers.
* [Counting Number Block](https://wordpress.org/plugins/counting-number-block) - A block to display a number that has the number-counting effect.
* [Breadcrumb Block](https://wordpress.org/plugins/breadcrumb-block) - A simple breadcrumb trail block that supports JSON-LD structured data.

The plugin is developed using @wordpress/create-block.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/better-youtube-embed-block` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress


== Frequently Asked Questions ==

= What problem does this plugin solve? =

It provides a better solution to embed YouTube videos than the default one.

= Who needs this plugin? =

Anyone can use this plugin.

== Screenshots ==

== Changelog ==

= 1.0.4 =
*Release Date 23 February 2024*

* Added - Add a PHP API for developers to render a YouTube video URL as this block
* Added - A new option to load high-resolution image
* Added - Add the ability to render all core/embed for YouTube videos as this block

= 1.0.3 =
*Release Date 05 January 2024*

* Added - Custom aspect ratio
* Added - Margin support feature

= 1.0.2 =
*Release Date 11 August 2023*

* DEV - Update to apiVersion 3
* DEV - Change i18 texts for translation

= 1.0.1 =
*Release Date 21 April 2023*

* DEV - Add keywords to the block

= 1.0.0 =
* Release Date 23 November 2022*


