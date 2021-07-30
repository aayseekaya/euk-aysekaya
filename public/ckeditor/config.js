/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

    config.filebrowserBrowseUrl = '/public/ckfinder/ckfinder.html',
        config.filebrowserImageBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images',
        config.filebrowserFlashBrowseUrl = '/public/ckfinder/ckfinder.html?type=Flash',
        config.filebrowserUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        config.filebrowserFlashUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

	// The toolbar groups arrangement, optimized for two toolbar rows.
	
	config.toolbar = [
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Scayt' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
		{ name: 'tools', items: [ 'Maximize' ] },
		{ name: 'document', items: [ 'Source' ] },
		'/',
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
		{ name: 'styles', items: [ 'Styles', 'Format' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'about', items: [ 'About' ] }
	];
	

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
	config.extraPlugins = 'colorbutton';
};
