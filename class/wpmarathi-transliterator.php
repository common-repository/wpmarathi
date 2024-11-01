<?php
class WPMarathi_Transliterator{

	function __construct($hook){
		
		if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
			$this->enqueue_style();
			$this->enqueue_API_scripts();
			$this->setup_classic_editor();
			$this->setup_block_editor();
			
		}

	}

	private function setup_classic_editor(){

		wp_enqueue_script(
			'transliterateZozuk',
			plugin_dir_url(__DIR__).'assets/js/transliterate.js',
			'googleTransliterateAPI',
			WPMARATHI_VERSION,
			true
		);
		wp_enqueue_script(
			'transliterateClassicEditor',
			plugin_dir_url(__DIR__).'assets/js/classic-editor.js',
			'googleTransliterateAPI',
			WPMARATHI_VERSION,
			true
		);

		// Add toggle button
		add_action('media_buttons',function(){
			echo '
			<button class="button active enabled" id="toggle-transliterator">
			<span class="wpmarathi-logo"></span>
			<span class="text">Disable WPMarathi</span>
			</button>';
		});

	}
	private function setup_block_editor(){
		
		wp_enqueue_script(
			'transliterateZozukBlock',
			plugin_dir_url(__DIR__).'assets/js/block.js',
			['googleTransliterateAPI','transliterateZozuk','wp-blocks','wp-element','wp-editor'],
			WPMARATHI_VERSION,
			true
		);
		

	}

	private function enqueue_API_scripts(){

		wp_enqueue_script(
			'googleTransliterateAPI',
			plugin_dir_url(__DIR__).'assets/js/api.js',
			null,
			WPMARATHI_VERSION,
			true
		);

	}
	
	private function enqueue_style(){
		wp_enqueue_style(
			'transliterateCSS',
			plugin_dir_url(__DIR__).'assets/css/transliteration.css',
			null,
			WPMARATHI_VERSION
		);
		
        wp_enqueue_style(
			'WPMarathi',
			plugin_dir_url(__DIR__).'/assets/css/wpmarathi-admin.css',
			null,
			WPMARATHI_VERSION
		);

	}
}