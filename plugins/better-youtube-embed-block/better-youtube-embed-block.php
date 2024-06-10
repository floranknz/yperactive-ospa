<?php
/**
 * Plugin Name:       Better Youtube Embed Block
 * Description:       Embed Youtube videos without slowing down your site.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.4
 * Author:            Phi Phan
 * Author URI:        https://boldblocks.net
 *
 * @package BoldBlocks
 * @copyright Copyright(c) 2022, Phi Phan
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function better_youtube_embed_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'better_youtube_embed_block_init' );

/**
 * The API to render a YouTube video URL as a better youtube embed block
 *
 * @param array   $args {
 *   @param string  $url: YouTube video URL
 *   @param string  $caption: The video caption
 *   @param boolean $isMaxResThumbnail: Load high-resolution image or not
 *   @param string  $aspectRatio: 1, 2, 4/3, 9/16, etc.
 *   @param boolean $echo
 * }
 * @return string
 */
function better_youtube_embed_block_render_block( $args ) {
	$output = '';
	$args   = wp_parse_args(
		$args,
		[
			'url'               => '',
			'caption'           => '',
			'isMaxResThumbnail' => false,
			'aspectRatio'       => '',
			'echo'              => false,
		]
	);

	$url      = $args['url'] ?? '';
	$video_id = '';
	if ( $url ) {
		$regex = '/(youtu.*be.*)\/(watch\?v=|embed\/|v|shorts|)(.*?((?=[&#?])|$))/';
		if ( preg_match( $regex, $url, $matches ) ) {
			$video_id = $matches[3];
		}
	}

	if ( $video_id ) {
		$image_name   = $args['isMaxResThumbnail'] ? 'maxresdefault' : 'hqdefault';
		$caption      = $args['caption'] ? '<figcaption class="yb-caption">' . $args['caption'] . '</figcaption>' : '';
		$aspect_ratio = $args['aspectRatio'];
		$style        = '';
		if ( $aspect_ratio ) {
			if ( preg_match( '/(\d+)(\/(\d+))*/', $aspect_ratio, $aspect_ratio_matches ) ) {
				$w = absint( $aspect_ratio_matches[1] );
				if ( $w ) {
					if ( absint( $aspect_ratio_matches[3] ?? 0 ) ) {
						$h          = absint( $aspect_ratio_matches[3] );
						$percentage = round( ( 1 / ( $w / $h ) ) * 100, 2 );
					} else {
						$percentage = round( ( 1 / $w ) * 100, 2 );
					}

					if ( $percentage ) {
						$style = ' style="--byeb--aspect-ratio:' . $percentage . '%;"';
					}
				}
			}
		}
		$output = '<figure class="wp-block-boldblocks-youtube-block"' . $style . '><div id="yb-video-' . $video_id . '" class="yb-player" data-video-id="' . $video_id . '" data-title="Play" style="background-image:url(https://img.youtube.com/vi/' . $video_id . '/' . $image_name . '.jpg)"><button type="button" class="yb-btn-play"><span class="visually-hidden">Play</span></button></div>' . $caption . '</figure>';

		$block_instance = [
			'blockName'    => 'boldblocks/youtube-block',
			'attrs'        => [
				'url'               => $url,
				'isMaxResThumbnail' => intval( $args['isMaxResThumbnail'] ),
			],
			'innerHTML'    => $output,
			'innerContent' => [ $output ],
		];

		$output = ( new WP_Block( $block_instance ) )->render();
	}

	if ( $args['echo'] ) {
		echo $output;
	} else {
		return $output;
	}
}

/**
 * Force render the core/embed block as a better youtube embed block
 */
add_filter(
	'render_block_core/embed',
	function( $block_content, $block ) {
		if ( 'youtube' !== ( $block['attrs']['providerNameSlug'] ?? '' ) ) {
			return $block_content;
		}

		if ( ! apply_filters( 'byeb_speed_up_youtube_videos', defined( 'BYEB_SPEED_UP_YOUTUBE_VIDEOS' ) && BYEB_SPEED_UP_YOUTUBE_VIDEOS ) ) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];
		return better_youtube_embed_block_render_block(
			[
				'url'     => $attrs['url'] ?? '',
				'caption' => $attrs['caption'] ?? '',
			]
		);
	},
	10,
	2
);
