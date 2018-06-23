<?php

namespace MediaWiki\Extension\MW_EXT_Grid;

use OutputPage, Parser, PPFrame, Skin;
use MediaWiki\Extension\MW_EXT_Core\MW_EXT_Core;

/**
 * Class MW_EXT_Grid
 * ------------------------------------------------------------------------------------------------------------------ */
class MW_EXT_Grid {

	/**
	 * Register tag function.
	 *
	 * @param Parser $parser
	 *
	 * @return bool
	 * @throws \MWException
	 * -------------------------------------------------------------------------------------------------------------- */

	public static function onParserFirstCallInit( Parser $parser ) {
		$parser->setHook( 'grid', __CLASS__ . '::onRenderGrid' );
		$parser->setHook( 'row', __CLASS__ . '::onRenderRow' );
		$parser->setHook( 'column', __CLASS__ . '::onRenderColumn' );

		return true;
	}

	/**
	 * Render grid function.
	 *
	 * @param $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 *
	 * @return string
	 * -------------------------------------------------------------------------------------------------------------- */

	public static function onRenderGrid( $input, $args = [], Parser $parser, PPFrame $frame ) {
		// Argument: style.
		$getStyle = MW_EXT_Core::outClear( $args['style'] ?? '' ?: '' );
		$outStyle = empty( $getStyle ) ? '' : ' style="' . $getStyle . '"';

		// Argument: class.
		$getClass = MW_EXT_Core::outClear( $args['class'] ?? '' ?: '' );
		$outClass = empty( $getClass ) ? '' : ' ' . $getClass;

		// Get content.
		$getContent = trim( $input );
		$outContent = $parser->recursiveTagParse( $getContent, $frame );

		// Out HTML.
		$outHTML = '<div' . $outStyle . ' class="mw-ext-grid' . $outClass . '">' . $outContent . '</div>';

		// Out parser.
		$outParser = $outHTML;

		return $outParser;
	}

	/**
	 * Render row function.
	 *
	 * @param $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 *
	 * @return string
	 * -------------------------------------------------------------------------------------------------------------- */

	public static function onRenderRow( $input, $args = [], Parser $parser, PPFrame $frame ) {
		// Argument: style.
		$getStyle = MW_EXT_Core::outClear( $args['style'] ?? '' ?: '' );
		$outStyle = empty( $getStyle ) ? '' : ' style="' . $getStyle . '"';

		// Argument: class.
		$getClass = MW_EXT_Core::outClear( $args['class'] ?? '' ?: '' );
		$outClass = empty( $getClass ) ? '' : ' ' . $getClass;

		// Get content.
		$getContent = trim( $input );
		$outContent = $parser->recursiveTagParse( $getContent, $frame );

		// Out HTML.
		$outHTML = '<div' . $outStyle . ' class="mw-ext-grid-row' . $outClass . '">' . $outContent . '</div>';

		// Out parser.
		$outParser = $outHTML;

		return $outParser;
	}

	/**
	 * Render column function.
	 *
	 * @param $input
	 * @param array $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 *
	 * @return string
	 * -------------------------------------------------------------------------------------------------------------- */

	public static function onRenderColumn( $input, $args = [], Parser $parser, PPFrame $frame ) {
		// Argument: style.
		$getStyle = MW_EXT_Core::outClear( $args['style'] ?? '' ?: '' );
		$outStyle = empty( $getStyle ) ? '' : ' style="' . $getStyle . '"';

		// Argument: class.
		$getClass = MW_EXT_Core::outClear( $args['class'] ?? '' ?: '' );
		$outClass = empty( $getClass ) ? '' : ' ' . $getClass;

		// Get content.
		$getContent = trim( $input );
		$outContent = $parser->recursiveTagParse( $getContent, $frame );

		// Out HTML.
		$outHTML = '<div' . $outStyle . ' class="mw-ext-grid-column' . $outClass . '">' . $outContent . '</div>';

		// Out parser.
		$outParser = $outHTML;

		return $outParser;
	}

	/**
	 * Load resource function.
	 *
	 * @param OutputPage $out
	 * @param Skin $skin
	 *
	 * @return bool
	 * -------------------------------------------------------------------------------------------------------------- */

	public static function onBeforePageDisplay( OutputPage $out, Skin $skin ) {
		$out->addModuleStyles( [ 'ext.mw.grid.styles' ] );

		return true;
	}
}
