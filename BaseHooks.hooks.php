<?php

class BaseHooksHooks {
	/**
	 * @param Skin $skin
	 * @param string &$text
	 * @return bool
	 */
	public static function onSkinAfterBottomScripts( Skin $skin, &$text = '' ) {
		global $wgBaseHooksAfterBottomScriptsNamespaceStrings, $wgBaseHooksAfterBottomScriptsStrings,
				$wgBaseHooksAfterBottomScriptsNamespaceFiles, $wgBaseHooksAfterBottomScriptsFiles;

		$currentNamespace = $skin->getTitle()->getNamespace();

		if ( isset( $wgBaseHooksAfterBottomScriptsNamespaceStrings ) &&
			in_array( $currentNamespace, $wgBaseHooksAfterBottomScriptsNamespaceStrings )
		) {
			foreach ( $wgBaseHooksAfterBottomScriptsNamespaceStrings[$currentNamespace] as $string ) {
				$text .= $string;
			}
		} elseif ( isset( $wgBaseHooksAfterBottomScriptsStrings ) ) {
			foreach ( $wgBaseHooksAfterBottomScriptsStrings as $string ) {
				$text .= $string;
			}
		}

		if ( isset( $wgBaseHooksAfterBottomScriptsNamespaceFiles ) &&
			in_array( $currentNamespace, $wgBaseHooksAfterBottomScriptsNamespaceFiles )
		) {
			foreach ( $wgBaseHooksAfterBottomScriptsNamespaceFiles[$currentNamespace] as $fileName ) {
				$text .= file_get_contents( $fileName );
			}
		} elseif ( isset( $wgBaseHooksAfterBottomScriptsFiles ) ) {
			foreach ( $wgBaseHooksAfterBottomScriptsFiles as $fileName ) {
				$text .= file_get_contents( $fileName );
			}
		}

		return true;
	}

	public static function onUnitTestsList( array &$files ) {
		// @codeCoverageIgnoreStart
		$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/' );

		/**
		 * @var SplFileInfo $fileInfo
		 */
		$ourFiles = [];
		foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
			if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
				$ourFiles[] = $fileInfo->getPathname();
			}
		}

		$files = array_merge( $files, $ourFiles );
		return true;
		// @codeCoverageIgnoreEnd
	}
}
